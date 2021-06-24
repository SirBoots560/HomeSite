import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class FilesService {

  files:any = [];
  url = 'http://localhost:90';
  
  constructor( private http: HttpClient ) { }

  get(category: any): Observable<FilesResponse> {
    const url = this.url + '/files';
    const getOptions = {
      params: { category }
    };
    return this.http.get<FilesResponse>(url, getOptions).pipe( catchError(this.handleError) );
  }

  private handleError(error: HttpErrorResponse) {
    console.error(error.message);
    return throwError('A data error occurred, please try again.');
  }
}

export interface FilesResponse {
  files: File[];
}

export interface File {
  id: number,
  name: string,
  category: string
}
