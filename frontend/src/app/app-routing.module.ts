import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TaskItemFormComponent } from './task-item-form/task-item-form.component';
import { TaskItemListComponent } from './task-item-list/task-item-list.component';

const routes: Routes = [  
{ path: 'add', component: TaskItemFormComponent },
{ path: ':category', component: TaskItemListComponent },
{ path: '', pathMatch: 'full', redirectTo: 'all' }];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
