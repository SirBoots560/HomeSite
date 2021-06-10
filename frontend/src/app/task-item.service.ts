import { Injectable, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TaskItemService implements OnInit{

  taskItems:any = [];

  constructor(private http: HttpClient) { }

  ngOnInit(){
    
  }

  get(): Observable<TaskItemsResponse> {
    const url = 'http://localhost:90/get';

    return this.http.get<TaskItemsResponse>(url);
    
  }
    

  add(taskItem: any){
    this.taskItems.push(taskItem);
  }

  delete(taskItem: any){
    const index = this.taskItems.indexOf(taskItem);
    if (index >= 0) {
      this.taskItems.splice(index, 1);
    }
  }
}

export interface TaskItemsResponse {
  taskItems: TaskItem[];
}

export interface TaskItem {
  id: number,
  title: string,
  category: string,
  complete: boolean
}
