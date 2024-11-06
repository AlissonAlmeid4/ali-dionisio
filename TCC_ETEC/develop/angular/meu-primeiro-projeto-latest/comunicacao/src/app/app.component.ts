import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { PaiOuMaeComponent } from './components/comunicacao-entre-components/pai-ou-mae/pai-ou-mae.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, 
            RouterOutlet,
            PaiOuMaeComponent
          ],
  template:`
  

    <H1>Curso de Angular</H1>
    <app-pai-ou-mae>
    `,
})
export class AppComponent {
  title = 'comunicacao';
}
