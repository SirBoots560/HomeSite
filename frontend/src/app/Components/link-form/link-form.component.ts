import { Component, OnInit } from '@angular/core';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';
import { Router } from '@angular/router';
import { LinkService } from 'src/app/Services/link/link.service';

@Component({
  selector: 'app-link-form',
  templateUrl: './link-form.component.html',
  styleUrls: ['./link-form.component.css']
})
export class LinkFormComponent implements OnInit {

  form: FormGroup;

  constructor(private formBuilder: FormBuilder, 
              private linkService: LinkService,
              private router: Router) { 
    this.form = this.formBuilder.group({
      title: this.formBuilder.control('', Validators.compose([
        Validators.required,
        Validators.pattern('[a-zA-Z0-9]+')
      ])),
      location: this.formBuilder.control('', Validators.required),
      new_window: this.formBuilder.control('', Validators.required),
    });
  }

  ngOnInit(){}

  onSubmit(linkItem: any){
    this.linkService.add(linkItem).subscribe(() => {
      this.router.navigate(['/links']);
    });
  }

  get title(){
    return this.form.controls['title'];
  }

  get location(){
    return this.form.controls['location'];
  }
  get new_window(){
    return this.form.controls['new_window'];
  }

}
