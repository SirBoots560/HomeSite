import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { TaskItemComponent } from './task-item/task-item.component';
import { TaskItemListComponent } from './task-item-list/task-item-list.component';
import { TaskItemFormComponent } from './task-item-form/task-item-form.component';
import { CategoryListPipe } from './category-list.pipe';
import { lookupListToken, lookupLists } from './providers';

@NgModule({
  declarations: [
    AppComponent,
    TaskItemComponent,
    TaskItemListComponent,
    TaskItemFormComponent,
    CategoryListPipe
  ],
  imports: [
    BrowserModule,
    ReactiveFormsModule,
    AppRoutingModule
  ],
  providers: [{
    provide: lookupListToken, useValue: lookupLists
  }],
  bootstrap: [AppComponent]
})
export class AppModule { }
