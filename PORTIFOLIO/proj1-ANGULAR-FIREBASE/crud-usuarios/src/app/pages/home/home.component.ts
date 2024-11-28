import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrl: './home.component.scss'
})
export class HomeComponent {

  userName: string | null;
  totalUsuario: number | null;

  ngOnInit(){
    this.userName = sessionStorage.getItem('user');
  }
}
