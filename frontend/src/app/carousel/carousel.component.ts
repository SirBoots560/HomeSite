import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-carousel',
  templateUrl: './carousel.component.html',
  styleUrls: ['./carousel.component.css']
})
export class CarouselComponent implements OnInit {

  images = [  'http://localhost:90/carousel-images/IMG_5597.jpg',
              'http://localhost:90/carousel-images/IMG_7649.JPG',
              'http://localhost:90/carousel-images/IMG_9256.jpg',
              'http://localhost:90/carousel-images/IMG_3832.jpg',
              'http://localhost:90/carousel-images/IMG_5430.jpg',
              'http://localhost:90/carousel-images/IMG_6538.jpg',
              'http://localhost:90/carousel-images/IMG_7720.jpg',
              'http://localhost:90/carousel-images/IMG_8648.jpg',
            ];
  
  constructor() { }

  ngOnInit(): void {
    console.log(this.images);
  }

}
