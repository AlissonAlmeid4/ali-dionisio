import { Component, inject, signal } from '@angular/core';

//interface
import { IProjects } from '../../enum/interface/IProjects';

//Material site
import {MatDialog, MatDialogModule} from '@angular/material/dialog';

//Enum
import { EDialogPanelClass } from '../../enum/EDialogPanelClass.enum';

//Dialog
import { DialogProjectsComponent } from '../dialog/dialog-projects/dialog-projects.component';

@Component({
  selector: 'app-projects',
  standalone: true,
  imports: [MatDialogModule],
  templateUrl: './projects.component.html',
  styleUrl: './projects.component.scss'
})
export class ProjectsComponent {
  #dialog = inject(MatDialog);

  public arrayProjects = signal<IProjects[]>([
    {
      src: 'assets/img/vfull.png',
      alt: "Projeto vida Fullstak",
      title: "Vida Fullstack",
      with: '100px',
      height: '51px',
      description: '<p>Explore o fascinante mundo do desenvolvimento web no blog Vida Full Stack</p>',
      links: [
        {
          name: 'Conheça o Blog',
          href: 'https://vidafullstack.com.br'
        }
      ]
    },
    {
      src: 'assets/img/vfull.png',
      alt: "Projeto vida Fullstak",
      title: "Vida Fullstack",
      with: '100px',
      height: '51px',
      description: '<p>Explore o fascinante mundo do desenvolvimento web no blog Vida Full Stack</p>',
      links: [
        {
          name: 'Conheça o Blog',
          href: 'https://vidafullstack.com.br'
        }
      ]
    },
  ])

  public openDialog(data: IProjects){
    this.#dialog.open(DialogProjectsComponent,{
      data,
      panelClass: EDialogPanelClass.PROJECTS
    })
  }
}
