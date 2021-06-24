import { Injectable, OnInit } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { throwError, Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class LinkService {

  links:any = [];
  url = 'http://localhost:90';

  constructor( private http: HttpClient ) { }

  get(): Observable<LinksResponse> {
    const url = this.url + '/links';
    return this.http.get<LinksResponse>(url).pipe( catchError(this.handleError) );
  }

  private handleError(error: HttpErrorResponse) {
    console.error(error.message);
    return throwError('A data error occurred, please try again.');
  }
}

export interface LinksResponse {
  links: Link[];
}

export interface Link {
  id: number,
  title: string,
  location: string,
  new_window: boolean
}
