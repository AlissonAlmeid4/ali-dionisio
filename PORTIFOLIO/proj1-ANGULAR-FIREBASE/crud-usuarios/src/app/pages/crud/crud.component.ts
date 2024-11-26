import { Component, ViewChild } from '@angular/core';
import { UsersService } from '../../services/users.service';

import { MatPaginator } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { User } from '../../interface/user';
import {MatTableDataSource} from '@angular/material/table';

import { MatDialog } from '@angular/material/dialog';
import { ModalViewUserComponent } from './modal-view-user/modal-view-user.component';
import { ModalFormUserComponent } from './modal-form-user/modal-form-user.component';



@Component({
  selector: 'app-crud',
  templateUrl: './crud.component.html',
  styleUrl: './crud.component.scss'
})
export class CrudComponent {
  displayedColumns: string[] = ['id','name','email','role','benefits','action'];
  dataSource: any
  listusers: User[] = [];

  @ViewChild(MatPaginator) paginator: MatPaginator;
  @ViewChild(MatSort) sort: MatSort;

  constructor(
      private usersService: UsersService,
      public dialog: MatDialog,
    ) {
    this.dataSource = new MatTableDataSource<any>(this.listusers)
  }

  ngOnInit(){
    this.getListUsers()
  }

  ngAfterViewinit(){
    this.dataSource.paginator = this.paginator;
    this.dataSource.sort = this.sort;
  }

  getListUsers(){
    this.usersService.getAllUsers().subscribe({
      next: (response: any) => {
        this.listusers = response;

        this.dataSource = new MatTableDataSource<any>(this.listusers);
        this.dataSource.paginator = this.paginator;
        this.dataSource.sort = this.sort;
        this.paginator._intl.itemsPerPageLabel="Itens por página";
      },
      error: (err) => {
        console.error(err)
      }
    });
  }

  applyFilter(event: Event) {
    const filterValue = (event.target as HTMLInputElement).value;
    this.dataSource.filter = filterValue.trim().toLowerCase();


    if (this.dataSource.paginator){
      this.dataSource.paginator.firstPage();
    }
  }

  //Logica do Modal
  openModalViewUser(user: User){
    this.dialog.open(ModalViewUserComponent, {
      width: '700px',
      height: '330px',
      data: user
    })
  }

  openModalAddUser(){
    this.dialog.open(ModalFormUserComponent, {
      width: '700px',
      height: '400px'
    }).afterClosed().subscribe(() => this.getListUsers);
  }
}
