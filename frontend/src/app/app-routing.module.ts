import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { HomeComponent } from './Components/home/home.component';

import { LinkListComponent } from './Components/link-list/link-list.component';
import { LinkFormComponent } from './Components/link-form/link-form.component';

import { TaskItemFormComponent } from './Components/task-item-form/task-item-form.component';
import { TaskItemListComponent } from './Components/task-item-list/task-item-list.component';

const routes: Routes = [  

{ path: 'home', component: HomeComponent },

{ path: 'add-link', component: LinkFormComponent },
{ path: 'links', component: LinkListComponent },

{ path: 'add-task', component: TaskItemFormComponent },
{ path: ':category', component: TaskItemListComponent },

{ path: '', pathMatch: 'full', redirectTo: 'home' }];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
