import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TaskItemFormComponent } from './Components/task-item-form/task-item-form.component';
import { TaskItemListComponent } from './Components/task-item-list/task-item-list.component';
import { HomeComponent } from './Components/home/home.component';
import { LinkListComponent } from './Components/link-list/link-list.component';

const routes: Routes = [  
{ path: 'add', component: TaskItemFormComponent },
{ path: 'home', component: HomeComponent },
{ path: 'links', component: LinkListComponent },
{ path: ':category', component: TaskItemListComponent },
{ path: '', pathMatch: 'full', redirectTo: 'home' }];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
