import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { TaskItemComponent } from './Components/task-item/task-item.component';
import { TaskItemListComponent } from './Components/task-item-list/task-item-list.component';
import { TaskItemFormComponent } from './Components/task-item-form/task-item-form.component';
import { CategoryListPipe } from './Pipes/category/category-list.pipe';
import { lookupListToken, lookupLists } from './providers';
import { HttpClientModule } from '@angular/common/http';
import { HomeComponent } from './Components/home/home.component';
import { NavComponent } from './Components/nav/nav.component';
import { LinkComponent } from './Components/link/link.component';
import { LinkListComponent } from './Components/link-list/link-list.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { CarouselComponent } from './Components/carousel/carousel.component';
import { LinkFormComponent } from './Components/link-form/link-form.component';

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
    CarouselComponent,
    LinkFormComponent
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
