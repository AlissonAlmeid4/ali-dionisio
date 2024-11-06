import { AsyncPipe, CurrencyPipe, DatePipe, DecimalPipe, PercentPipe, UpperCasePipe, registerLocaleData } from '@angular/common';
import { Component, LOCALE_ID, signal } from '@angular/core';
import { Observable, delay, of } from 'rxjs';

import localPt from '@angular/common/locales/pt';
registerLocaleData(localPt);

@Component({
  selector: 'app-angular-pipes',
  standalone: true,
  imports: [DatePipe, UpperCasePipe, AsyncPipe, CurrencyPipe, PercentPipe, DecimalPipe],
  templateUrl: './angular-pipes.component.html',
  styleUrl: './angular-pipes.component.scss',
  providers: [{ provide: LOCALE_ID, useValue: 'pt-BR'}],
})
export class AngularPipesComponent {
  public date = signal( new Date());

  public loadingData$: Observable<string[]> = of([
    'item 1',
    'item 2',
    'item 3',
  ]).pipe(delay(2000));
}
