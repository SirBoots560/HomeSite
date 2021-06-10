import { Component, OnInit } from '@angular/core';
import {TaskItemService } from '../task-item.service';

@Component({
  selector: 'hs-task-item-list',
  templateUrl: './task-item-list.component.html',
  styleUrls: ['./task-item-list.component.css']
})
export class TaskItemListComponent implements OnInit {
  taskItems: any;
  category = '';

  constructor(private taskItemService: TaskItemService) { }

  ngOnInit(): void {
    this.getTaskItems(this.category);
  }

  

  onTaskItemDelete(taskItem: any) { 
    this.taskItemService.delete(taskItem);
  }
  
  getTaskItems(category: string){
    this.category = category;
    this.taskItemService.get().subscribe(tasks => {
      this.taskItems = tasks;
    });
  }
}
