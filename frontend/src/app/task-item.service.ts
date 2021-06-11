import { Injectable, OnInit } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { throwError, Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';

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
    return this.http.get<TaskItemsResponse>(url, getOptions).pipe( catchError(this.handleError) );
  }

  add(taskItem: any){
    const url = this.url + '/add';
    const param = JSON.stringify(taskItem);
    return this.http.post(url, param).pipe( catchError(this.handleError) );
  }

  delete(id: any){
    const param = JSON.stringify(id);
    const url = this.url + `/delete`
    return this.http.post(url, id).pipe( catchError(this.handleError) );
  }

  private handleError(error: HttpErrorResponse) {
    console.error(error.message);
    return throwError('A data error occurred, please try again.');
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
