import { Component } from '@angular/core';
import { InputComponent } from '../input/input.component';
import { OutputComponent } from "../output/output.component";

@Component({
    selector: 'app-pai-ou-mae',
    standalone: true,
    templateUrl: './pai-ou-mae.component.html',
    styleUrl: './pai-ou-mae.component.scss',
    imports: [InputComponent, OutputComponent]
})
export class PaiOuMaeComponent {

}
