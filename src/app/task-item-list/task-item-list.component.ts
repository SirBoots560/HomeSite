import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'hs-task-item-list',
  templateUrl: './task-item-list.component.html',
  styleUrls: ['./task-item-list.component.css']
})
export class TaskItemListComponent implements OnInit {
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

  ngOnInit(): void {
  }

  onTaskItemDelete(taskItem: any) { 
    console.log("Deleted Item");
  }
}
