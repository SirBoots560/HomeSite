import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'hs-task-item-form',
  templateUrl: './task-item-form.component.html',
  styleUrls: ['./task-item-form.component.css']
})
export class TaskItemFormComponent implements OnInit {

  form: FormGroup;

  constructor() { 
    this.form = new FormGroup({
      title: new FormControl('', Validators.compose([
        Validators.required,
        Validators.pattern('[\\w\\-\\s\\/]+')
      ])),
      category: new FormControl('Cats'),
    });
  }

  ngOnInit(){}
  
  onSubmit(taskItem: any){
    console.log(taskItem);
  }

}
