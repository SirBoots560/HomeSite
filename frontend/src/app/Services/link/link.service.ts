import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { throwError, Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class LinkService {

  links:any = [];
  url = 'http://localhost:90/links';

  constructor( private http: HttpClient ) { }

  get(): Observable<LinksResponse> {
    const url = this.url + '';
    return this.http.get<LinksResponse>(url).pipe( catchError(this.handleError) );
  }

  add(link: any){
    const url = this.url + '/add';
    const param = JSON.stringify(link);
    return this.http.post(url, param).pipe( catchError(this.handleError) );
  }

  edit(link: any){
    const url = this.url + '/edit';
    const param = JSON.stringify(link);
    return this.http.put(url, param).pipe( catchError(this.handleError) );
  }

  private handleError(error: HttpErrorResponse) {
    console.error(error.message);
    return throwError('A data error occurred, please try again.');
  }
}

export interface LinksResponse {
  statusCode: number,
  data: Link[];
}

export interface Link {
  id: number,
  title: string,
  location: string,
  new_window: number
}
