import { CommonModule } from '@angular/common';
import { Component, input, signal } from '@angular/core';

function toUpperCase(value: string){
  return value.toUpperCase();
}

@Component({
  selector: 'app-input',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './input.component.html',
  styleUrl: './input.component.scss'
})
export class InputComponent {
  public name = signal("Sem dados")

  @input({ 
    required: true,
    transform: toUpperCase
  }) set inputName(value: string){
    this.name.set(value);
  } 
}
