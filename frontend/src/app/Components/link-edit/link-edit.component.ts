import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Link, LinkService } from 'src/app/Services/link/link.service';

@Component({
  selector: 'app-link-edit',
  templateUrl: './link-edit.component.html',
  styleUrls: ['./link-edit.component.css']
})
export class LinkEditComponent implements OnInit {

  links: Link[] = [];

  linkID: number = -1;
  linkTitle: string = "NULL";
  linkLocation: string = "NULL";
  linkNew_Window: number = -1;

  form: FormGroup;


  constructor(  private formBuilder: FormBuilder, 
                private linkService: LinkService,
                private router: Router ) {
                  this.form = this.formBuilder.group({
                    id: this.formBuilder.control(0),
                    title: this.formBuilder.control('', Validators.compose([
                      Validators.required,
                      Validators.pattern('[a-zA-Z0-9]+')
                    ])),
                    location: this.formBuilder.control('', Validators.required),
                    new_window: this.formBuilder.control('', Validators.required),
                  });
                 }

  ngOnInit(): void {
    this.getLinks();
  }

  getLinks() {
    this.linkService.get().subscribe(links => {

      this.links = links.data;

    });
  }

  change(id: any){
    var found: Link;
    this.links.forEach(link => {

      if(link.id == id){
        this.linkID = link.id;
        this.linkTitle = link.title;
        this.linkLocation = link.location;
        this.linkNew_Window = link.new_window;
      }
    });

    this.form.controls['id'].setValue(this.linkID);
    this.form.controls['title'].setValue(this.linkTitle);
    this.form.controls['location'].setValue(this.linkLocation);
    this.form.controls['new_window'].setValue(this.linkNew_Window);
  }

  onSubmit(linkItem: any){
    this.linkService.edit(linkItem).subscribe(() => {
      this.router.navigate(['/links']);
    });
  }

  onDelete(linkItem: any) { 
    this.linkService.delete(linkItem).subscribe(() => {
      this.getLinks();
    });
  }

  get id(){
    return this.linkID;
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
