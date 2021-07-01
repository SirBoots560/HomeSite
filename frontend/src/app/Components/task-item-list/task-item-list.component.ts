import { Component, Inject, OnInit } from '@angular/core';
import { TaskItemService } from '../../Services/task/task-item.service';
import { lookupListToken } from '../../providers';

@Component({
  selector: 'hs-task-item-list',
  templateUrl: './task-item-list.component.html',
  styleUrls: ['./task-item-list.component.css']
})
export class TaskItemListComponent implements OnInit {

  taskItems: any;
  category = 'All';
  isChecked = false;

  constructor( private taskItemService: TaskItemService,
              @Inject(lookupListToken) public lookupLists: any) {
               }

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
    this.taskItemService.get(category, this.isChecked).subscribe(tasks => {
      
      this.taskItems = tasks.data;

    });
  }

  toggleVal(category: string){
    this.isChecked = !this.isChecked;
    this.getTaskItems(category);
  }
}
