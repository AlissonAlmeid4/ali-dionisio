import { Component, signal } from '@angular/core';
import { IExperiences } from '../../enum/interface/IExperiences';

@Component({
  selector: 'app-experiences',
  standalone: true,
  imports: [],
  templateUrl: './experiences.component.html',
  styleUrl: './experiences.component.scss'
})
export class ExperiencesComponent {
  public arrayExperiences = signal<IExperiences[]>([
    {
      summary:{
        strong: 'Analista de Sistemas Junior',
        p: 'Rosset - 2018 - Presente',
      },
      text: 'Durante esse periodo utilizei ferramentas como PLSQL, Power BI', 
    },
    {
      summary:{
        strong: 'Analista de Suporte',
        p: 'Rosset - 2018 - Presente',
      },
      text: 'Abrir e acompnhar chamados na ERP, projetar relatórios', 
    },
  ])
}
