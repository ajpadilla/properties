import { Injectable } from '@angular/core';
import { Headers, Http } from '@angular/http';

import 'rxjs/add/operator/toPromise';

import { TypeProperty } from './type-property';

@Injectable()
export class TypePropertyService {

	private headers = new Headers({'Content-type': 'aplication/json'});
	private typePropertyUrl = 'api/typeProperties';

	constructor(private http: Http) {}

	getTypeProperties(): Promise<any[]>{
		/*return this.http.get(this.typePropertyUrl)
				.toPromise()
				.then(response => response.json().data as any[])
				.catch(this.handleError)*/
		return ;
	}

	private handleError(error: any): Promise<any> {
    	console.error('An error occurred', error); // for demo purposes only
    	return Promise.reject(error.message || error);
  	}

}
