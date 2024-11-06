import { CommonModule } from '@angular/common';
import { Component, signal } from '@angular/core';
import { FormsModule, NgForm } from '@angular/forms';

@Component({
  selector: 'app-template-drive-forms',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './template-drive-forms.component.html',
  styleUrl: './template-drive-forms.component.scss'
})
export class TemplateDriveFormsComponent {
  public listComidas = signal<Array<{comida: string, preco: string}>>([
    {
      comida: 'X-Salada', preco: 'R$ 10'
    },
    {
      comida: 'X-Bacon', preco: 'R$ 10'
    },
    {
      comida: 'X-Tudo', preco: 'R$ 10'
    },
    {
      comida: 'X-Mac', preco: 'R$ 10'
    },
  ]);

  public submitForm(form: NgForm){
    console.log(form.valid)
    if(form.valid){
      console.log(form.value)
    }

  }
}
