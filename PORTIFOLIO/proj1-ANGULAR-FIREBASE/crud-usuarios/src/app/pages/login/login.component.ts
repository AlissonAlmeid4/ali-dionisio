import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrl: './login.component.scss'
})
export class LoginComponent {

  userName: String;

  constructor(private rota: Router) {

  }

  login(){
    sessionStorage.setItem("user", "this.userName");

    this.rota.navigate(["home"]);
  }

}
