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
import { HttpClientModule } from '@angular/common/http';
import { HomeComponent } from './home/home.component';
import { NavComponent } from './nav/nav.component';
import { LinkComponent } from './link/link.component';
import { LinkListComponent } from './link-list/link-list.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { CarouselComponent } from './carousel/carousel.component';

@NgModule({
  declarations: [
    AppComponent,
    TaskItemComponent,
    TaskItemListComponent,
    TaskItemFormComponent,
    CategoryListPipe,
    HomeComponent,
    NavComponent,
    LinkComponent,
    LinkListComponent,
    CarouselComponent
  ],
  imports: [
    BrowserModule,
    ReactiveFormsModule,
    AppRoutingModule,
    HttpClientModule,
    NgbModule
  ],
  providers: [{
    provide: lookupListToken, useValue: lookupLists
  }],
  bootstrap: [AppComponent]
})
export class AppModule { }
