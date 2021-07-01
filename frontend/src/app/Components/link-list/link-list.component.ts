import { Component, OnInit } from '@angular/core';
import { LinkService } from '../../Services/link/link.service';

@Component({
  selector: 'app-link-list',
  templateUrl: './link-list.component.html',
  styleUrls: ['./link-list.component.css']
})
export class LinkListComponent implements OnInit {

  links: any;

  constructor( private linkService: LinkService ) { }

  ngOnInit(): void {
    this.getLinks();
  }

  getLinks(){
    this.linkService.get().subscribe(links => {

      this.links = links.data;

    });
  }

}
