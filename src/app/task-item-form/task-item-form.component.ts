import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';

@Component({
  selector: 'hs-task-item-form',
  templateUrl: './task-item-form.component.html',
  styleUrls: ['./task-item-form.component.css']
})
export class TaskItemFormComponent implements OnInit {

  form: FormGroup;

  constructor() { 
    this.form = new FormGroup({
      title: new FormControl(''),
      category: new FormControl('Cats'),
    });
  }

  ngOnInit(): void {
    this.form = new FormGroup({
      title: new FormControl(''),
      category: new FormControl('Cats'),
    });
  }

  onSubmit(taskItem: any){
    console.log(taskItem);
  }

}
