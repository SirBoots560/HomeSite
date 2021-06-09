import { Component } from '@angular/core';

@Component({
  selector: 'hs-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'hs-frontend';

  firstTaskItem = {
    id: 1,
    title: 'Wash Dishes',
    category: 'Cleaning',
    complete: false
  };

  onTaskItemDelete(taskItem: any){

  }
}
