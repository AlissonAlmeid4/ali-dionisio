import { Component, signal } from '@angular/core';

//interface
import { IKnowleadge } from '../../enum/interface/knowlead.interface';

@Component({
  selector: 'app-knowleadge',
  standalone: true,
  imports: [],
  templateUrl: './knowleadge.component.html',
  styleUrl: './knowleadge.component.scss'
})
export class KnowleadgeComponent {
  public arrayKnowledge = signal<IKnowleadge[]>([
    {
      src: '../assets/icon/knowleade/html5.svg',
      alt: 'Ícone de Conhecimento de HTML5',
    },
    {
      src: '../assets/icon/knowleade/css3.svg',
      alt: 'Ícone de Conhecimento de CSS3',
    },
    {
      src: '../assets/icon/knowleade/javascript.svg',
      alt: 'Ícone de Conhecimento de Javascript',
    },
    {
      src: 'assets/icon/knowleade/angular.svg',
      alt: 'Ícone de Conhecimento de Angular',
    },
    {
      src: 'assets/icon/knowleade/nodejs.svg',
      alt: 'Ícone de Conhecimento de Node',
    }
  ])
}
