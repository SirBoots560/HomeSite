import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TaskItemFormComponent } from './task-item-form/task-item-form.component';
import { TaskItemListComponent } from './task-item-list/task-item-list.component';
import { HomeComponent } from './home/home.component';

const routes: Routes = [  
{ path: 'add', component: TaskItemFormComponent },
{ path: 'home', component: HomeComponent },
{ path: ':category', component: TaskItemListComponent },
{ path: '', pathMatch: 'full', redirectTo: 'home' }];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
