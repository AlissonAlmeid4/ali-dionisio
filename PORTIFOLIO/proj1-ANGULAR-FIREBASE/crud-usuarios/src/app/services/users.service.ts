import { Injectable } from '@angular/core';

import { AngularFirestore } from '@angular/fire/compat/firestore';
import { Observable } from 'rxjs';
import { User } from '../interface/user';

@Injectable({
  providedIn: 'root'
})
export class UsersService {

  nome: string = 'Alisson Almeida'

  /*
  user: User = {
    name: 'Alisson Almeida',
    email: 'alisson@email.com.br',
    sector: 'Tecnologia',
    role: 'Desenvolvedor Front End'
  }
*/
  constructor(private dataBaseStore: AngularFirestore) {}

    getAllUsers(){
      return this.dataBaseStore.collection('users', 
        user => user.orderBy('name')).valueChanges({idField: 'firebaseId'}) as Observable<any[]>;
    }

    addUser(user: User){
      return this.dataBaseStore.collection('users').add(user);
    }

    update(userId: string | undefined, user: User){
      return this.dataBaseStore.collection('users').doc(userId).update(user);
    }

    deleteUser(userId : string){
      return this.dataBaseStore.collection('users').doc(userId).delete();
    }
}

