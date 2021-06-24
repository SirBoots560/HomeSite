import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { throwError, Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class TaskItemService {

  taskItems:any = [];
  url = 'http://localhost:90';

  constructor(private http: HttpClient) { }

  get(category:any, complete: boolean): Observable<TaskItemsResponse> {
    const url = this.url + '/tasks';
    const getOptions = {
      params: { category, complete }
    };
    return this.http.get<TaskItemsResponse>(url, getOptions).pipe( catchError(this.handleError) );
  }

  add(taskItem: any){
    const url = this.url + '/add';
    const param = JSON.stringify(taskItem);
    return this.http.post(url, param).pipe( catchError(this.handleError) );
  }

  complete(taskItem: any){
    const url = this.url + `/complete`
    return this.http.post(url, taskItem.id).pipe( catchError(this.handleError) );
  }

  delete(taskItem: any){
    const url = this.url + `/delete`
    return this.http.post(url, taskItem.id).pipe( catchError(this.handleError) );
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
