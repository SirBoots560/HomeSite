import { Injectable, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TaskItemService implements OnInit{

  taskItems:any = [];
  url = 'http://localhost:90';

  constructor(private http: HttpClient) { }

  ngOnInit(){
    
  }

  get(category:any): Observable<TaskItemsResponse> {
    const url = this.url + '/get';
    const getOptions = {
      params: { category }
    };
    return this.http.get<TaskItemsResponse>(url, getOptions);
  }
    

  add(taskItem: any){
    const url = this.url + '/add';
    console.log("SENT!");
    return this.http.post(url, taskItem);
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
