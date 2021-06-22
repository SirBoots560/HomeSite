import { Component, Inject, OnInit } from '@angular/core';
import {TaskItem, TaskItemService } from '../task-item.service';
import { lookupListToken } from '../providers';

@Component({
  selector: 'hs-task-item-list',
  templateUrl: './task-item-list.component.html',
  styleUrls: ['./task-item-list.component.css']
})
export class TaskItemListComponent implements OnInit {
  taskItems: any;
  category = 'All';

  constructor(private taskItemService: TaskItemService,
              @Inject(lookupListToken) public lookupLists: any) { }

  ngOnInit(): void {
    this.getTaskItems(this.category);
  }

  onTaskItemDelete(taskItem: any) { 
    this.taskItemService.delete(taskItem).subscribe(() => {
      this.getTaskItems(this.category);
    });
  }

  onTaskItemComplete(taskItem: any){
    this.taskItemService.complete(taskItem).subscribe(() => {
      this.getTaskItems(this.category);
    });
  }
  
  getTaskItems(category: string){
    this.category = category;
    this.taskItemService.get(category).subscribe(tasks => {
      this.taskItems = tasks;
    });
  }
}
