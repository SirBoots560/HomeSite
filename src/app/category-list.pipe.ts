import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'categoryList'
})
export class CategoryListPipe implements PipeTransform {

  transform(taskItems: any) {
    const categories: any = [];
    taskItems.forEach((taskItem: any) => {
      if (categories.indexOf(taskItem.category) <= -1) {
        categories.push(taskItem.category);
      }
    });
    return categories.join(', ');
  }
}
