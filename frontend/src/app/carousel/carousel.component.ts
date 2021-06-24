import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-carousel',
  templateUrl: './carousel.component.html',
  styleUrls: ['./carousel.component.css']
})
export class CarouselComponent implements OnInit {

  images = [  '../../assets/carousel-images/IMG_5597.jpg',
              '../../assets/carousel-images/IMG_7649.JPG',
              '../../assets/carousel-images/IMG_9256.jpg',
              '../../assets/carousel-images/IMG_3832.jpg',
              '../../assets/carousel-images/IMG_5430.jpg',
              '../../assets/carousel-images/IMG_6538.jpg',
              '../../assets/carousel-images/IMG_7720.jpg',
              '../../assets/carousel-images/IMG_8648.jpg',
            ];
  
  constructor() { }

  ngOnInit(): void {
    console.log(this.images);
  }

}
