import { Component } from '@angular/core';
import { HeaderComponent } from '../../components/header/header.component';
import { KnowleadgeComponent } from "../../components/knowleadge/knowleadge.component";
import { ExperiencesComponent } from '../../components/experiences/experiences.component';
import { ProjectsComponent } from '../../components/projects/projects.component';

@Component({
    selector: 'app-home',
    standalone: true,
    templateUrl: './home.component.html',
    styleUrl: './home.component.scss',
    imports: [HeaderComponent, KnowleadgeComponent,ExperiencesComponent,ProjectsComponent]
})
export class HomeComponent {

}
