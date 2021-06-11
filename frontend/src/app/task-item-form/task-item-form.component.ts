import { Component, Inject, OnInit } from '@angular/core';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';
import { TaskItemService } from '../task-item.service';
import { lookupListToken } from '../providers';

@Component({
  selector: 'hs-task-item-form',
  templateUrl: './task-item-form.component.html',
  styleUrls: ['./task-item-form.component.css']
})
export class TaskItemFormComponent implements OnInit {

  form: FormGroup;

  constructor(private formBuilder: FormBuilder, 
              private taskItemService: TaskItemService,
              @Inject(lookupListToken) public lookupLists: any) { 
    this.form = this.formBuilder.group({
      title: this.formBuilder.control('', Validators.compose([
        Validators.required,
        Validators.pattern('[\\w\\-\\s\\/]+')
      ])),
      category: this.formBuilder.control('', Validators.required),
    });
  }

  ngOnInit(){}

  onSubmit(taskItem: any){
    this.taskItemService.add(taskItem).subscribe();
  }


  get title(){
    return this.form.controls['title'];
  }

  get category(){
    return this.form.controls['category'];
  }
}
