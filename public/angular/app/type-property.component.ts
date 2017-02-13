import { Component, OnInit } from '@angular/core';
import { Http } from '@angular/http';

import { TypeProperty } from './type-property';
import { TypePropertyService } from './type-property.service';

@Component({
  moduleId: module.id,
  selector: 'my-type-property',
  template: `<h3>Type property Componentn</h3>`,
  providers: [ TypePropertyService ]
})
export class TypePropertyComponent implements OnInit {

	public typeProperties : any[];
	public data: any[];


	constructor(
		private http: Http,
		) {}

	/*getTypeProperties(): void {
		this.typePropertyService.getTypeProperties()
			.then(typeProperties => this.typeProperties = typeProperties);
		console.log(this.typeProperties);
	}
	*/
	ngOnInit(): void {
		//this.getTypeProperties();
		 /*this.http.get("api/typeProperties")
            .subscribe((data)=> {
                setTimeout(()=> {
                    this.data = data.json();
                }, 2000);
            });*/
       console.log(this.data);
       	console.log(Http);

	}
}