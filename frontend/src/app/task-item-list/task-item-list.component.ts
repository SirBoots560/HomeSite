import { Component, Inject, OnInit, ViewChild } from '@angular/core';
import { TaskItemService } from '../task-item.service';
import { lookupListToken } from '../providers';
import { FormBuilder, FormGroup, NgForm } from '@angular/forms';

@Component({
  selector: 'hs-task-item-list',
  templateUrl: './task-item-list.component.html',
  styleUrls: ['./task-item-list.component.css']
})
export class TaskItemListComponent implements OnInit {

  taskItems: any;
  category = 'All';

  constructor(private formBuilder: FormBuilder, 
              private taskItemService: TaskItemService,
              @Inject(lookupListToken) public lookupLists: any) {
               }

  ngOnInit(): void {
    this.getTaskItems(this.category, false);
  }

  onTaskItemDelete(taskItem: any) { 
    this.taskItemService.delete(taskItem).subscribe(() => {
      this.getTaskItems(this.category, false);
    });
  }

  onTaskItemComplete(taskItem: any){
    this.taskItemService.complete(taskItem).subscribe(() => {
      this.getTaskItems(this.category, false);
    });
  }
  
  getTaskItems(category: string, complete: boolean){
    this.category = category;
    this.taskItemService.get(category, complete).subscribe(tasks => {
      this.taskItems = tasks;
    });
  }

  getComVal(event: any){
    console.log(event.explicitOriginalTarget.checked);
    this.getTaskItems(this.category, event.explicitOriginalTarget.checked);
  }
}
