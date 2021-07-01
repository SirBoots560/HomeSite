import { Component, OnInit } from '@angular/core';
import { FilesService } from '../../Services/file/files.service';

@Component({
  selector: 'app-carousel',
  templateUrl: './carousel.component.html',
  styleUrls: ['./carousel.component.css']
})
export class CarouselComponent implements OnInit {

  images: any;
  
  constructor( private filesService: FilesService  ) { }

  ngOnInit(): void {
    this.getimages();
  }

  getimages(){
    this.filesService.get('Carousel').subscribe(images => {
      this.images = images.data;
    });
  }

}
