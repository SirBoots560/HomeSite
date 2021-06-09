import { Component, OnInit } from '@angular/core';
import {TaskItemService } from '../task-item.service';

@Component({
  selector: 'hs-task-item-list',
  templateUrl: './task-item-list.component.html',
  styleUrls: ['./task-item-list.component.css']
})
export class TaskItemListComponent implements OnInit {
  taskItems: any;

  constructor(private taskItemService: TaskItemService) { }

  ngOnInit(): void {
    this.taskItems = this.taskItemService.get();
  }

  onTaskItemDelete(taskItem: any) { 
    this.taskItemService.delete(taskItem);
  }
}
