import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'hs-task-item',
  templateUrl: './task-item.component.html',
  styleUrls: ['./task-item.component.css']
})
export class TaskItemComponent implements OnInit {

  @Input() taskItem: any;
  @Output() delete = new EventEmitter();
  @Output() complete = new EventEmitter();

  constructor() { }

  ngOnInit(): void {
  }

  wasComplete(){
    return this.taskItem.complete;
  }

  onDelete(){
    this.delete.emit(this.taskItem);
  }

  onComplete(){
    this.complete.emit(this.taskItem);
  }

}
