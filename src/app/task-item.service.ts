import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class TaskItemService {

  taskItems = [
    {
      id: 1,
      title: 'Wash Dishes',
      category: 'Cleaning',
      complete: false
    },
    {
      id: 2,
      title: 'Big Kids Litter',
      category: 'Cats',
      complete: false
    },
    {
      id: 3,
      title: 'Little Kids Litter',
      category: 'Cats',
      complete: false
    }
  ];

  constructor() { }

  get(){
    return this.taskItems;
  }

  add(taskItem: any){
    this.taskItems.push(taskItem);
  }

  delete(taskItem: any){
    const index = this.taskItems.indexOf(taskItem);
    if (index >= 0) {
      this.taskItems.splice(index, 1);
    }
  }
}
