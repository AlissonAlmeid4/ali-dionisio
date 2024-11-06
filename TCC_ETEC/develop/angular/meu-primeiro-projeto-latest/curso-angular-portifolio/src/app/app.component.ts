import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { AngularPipesComponent } from './components/pipes/angular-pipes/angular-pipes.component';
import { ReactiveFormsComponent } from './components/forms/reactive-forms/reactive-forms.component';
import { TemplateDriveFormsComponent } from './components/forms/template-drive-forms/template-drive-forms.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule,
            RouterOutlet,
            AngularPipesComponent,
            ReactiveFormsComponent,
            TemplateDriveFormsComponent
          ],
  template: `
            <!-- <router-outlet></router-outlet> -->
            <!-- <app-angular-pipes/> -->
            <!-- <app-reactive-forms/> -->
            <!-- <app-template-drive-forms/> -->
            `,
            
})
export class AppComponent {
  title = 'curso-angular-portifolio';
}
