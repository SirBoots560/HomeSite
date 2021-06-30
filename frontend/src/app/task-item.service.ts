import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { throwError, Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';
//import * as internal from 'stream';

@Injectable({
  providedIn: 'root'
})
export class TaskItemService {

  taskItems:any = [];
  url = 'http://localhost:90/tasks';

  constructor(private http: HttpClient) { }

  get(category:any, complete: boolean): Observable<TaskItemsResponse> {
    const url = this.url + '/' + category + '/' + complete;
    return this.http.get<TaskItemsResponse>(url).pipe( catchError(this.handleError) );
  }

  add(taskItem: any){
    const url = this.url + '/add';
    const param = JSON.stringify(taskItem);
    return this.http.post(url, param).pipe( catchError(this.handleError) );
  }

  complete(taskItem: any){
    const url = this.url + `/` + taskItem.id;
    return this.http.put(url, null).pipe( catchError(this.handleError) );
  }

  delete(taskItem: any){
    const url = this.url + `/` + taskItem.id;
    return this.http.delete(url).pipe( catchError(this.handleError) );
  }

  private handleError(error: HttpErrorResponse) {
    console.error(error.message);
    return throwError('A data error occurred, please try again.');
  }
}

export interface TaskItemsResponse {
  statusCode: number,
  data: TaskItem[]
}

export interface TaskItem {
  id: number,
  title: string,
  category: string,
  complete: boolean
}
