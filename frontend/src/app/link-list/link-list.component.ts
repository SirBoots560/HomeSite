import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-link-list',
  templateUrl: './link-list.component.html',
  styleUrls: ['./link-list.component.css']
})
export class LinkListComponent implements OnInit {

  links = [
    {
      id: 1,
      title: "PiHole",
      location: "http://pihole.admin",
      sameWindow: 0
    },
    {
      id: 2,
      title: "Router",
      location: "http://router.admin",
      sameWindow: 0
    }
  ];

  constructor() { }

  ngOnInit(): void {
  }

}
