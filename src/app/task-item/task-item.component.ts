import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'hs-task-item',
  templateUrl: './task-item.component.html',
  styleUrls: ['./task-item.component.css']
})
export class TaskItemComponent implements OnInit {

  @Input() taskItem: any;

  constructor() { }

  ngOnInit(): void {
  }

  wasComplete(){
    return this.taskItem.complete;
  }

  onDelete(){
    console.log("Delete");
  }

}
