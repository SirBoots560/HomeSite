import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'hs-task-item',
  templateUrl: './task-item.component.html',
  styleUrls: ['./task-item.component.css']
})
export class TaskItemComponent implements OnInit {

  title = 'Wash Dishes';
  category = 'Cleaning';

  constructor() { }

  ngOnInit(): void {
  }

  wasComplete(){
    return false;
  }

  onDelete(){
    console.log("Delete");
  }

}
