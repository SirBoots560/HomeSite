import { Component, Inject, OnInit } from '@angular/core';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';
import { TaskItemService } from '../../Services/task/task-item.service';
import { lookupListToken } from '../../providers';
import { Router } from '@angular/router';

@Component({
  selector: 'hs-task-item-form',
  templateUrl: './task-item-form.component.html',
  styleUrls: ['./task-item-form.component.css']
})
export class TaskItemFormComponent implements OnInit {

  form: FormGroup;

  constructor(private formBuilder: FormBuilder, 
              private taskItemService: TaskItemService,
              @Inject(lookupListToken) public lookupLists: any,
              private router: Router) { 
    this.form = this.formBuilder.group({
      title: this.formBuilder.control('', Validators.compose([
        Validators.required,
        Validators.pattern('[\\w\\-\\s\\/]+')
      ])),
      category: this.formBuilder.control('', Validators.required),
      complete: this.formBuilder.control('0', Validators.required),
    });
  }

  ngOnInit(){}

  onSubmit(taskItem: any){
    this.taskItemService.add(taskItem).subscribe(() => {
      this.router.navigate(['/', taskItem.category]);
    });
  }


  get title(){
    return this.form.controls['title'];
  }

  get category(){
    return this.form.controls['category'];
  }
}
