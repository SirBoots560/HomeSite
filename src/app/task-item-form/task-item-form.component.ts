import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import {TaskItemService } from '../task-item.service';

@Component({
  selector: 'hs-task-item-form',
  templateUrl: './task-item-form.component.html',
  styleUrls: ['./task-item-form.component.css']
})
export class TaskItemFormComponent implements OnInit {

  form: FormGroup;

  constructor(private formBuilder: FormBuilder, private taskItemService: TaskItemService) { 
    this.form = this.formBuilder.group({
      title: this.formBuilder.control('', Validators.compose([
        Validators.required,
        Validators.pattern('[\\w\\-\\s\\/]+')
      ])),
      category: this.formBuilder.control('Cleaning'),
    });
  }

  ngOnInit(){}

  onSubmit(taskItem: any){
    this.taskItemService.add(taskItem);
  }


  get title(){
    return this.form.controls['title'];
  }
}
