import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';

import { AppComponent }  from './app.component';
import { TypePropertyComponent } from './type-property.component';

import { TypePropertyService } from './type-property.service';

import {APP_BASE_HREF} from '@angular/common';

@NgModule({
  imports:      [ 
  	BrowserModule,  
  	AppRoutingModule,
  ],
  declarations: [ 
  	AppComponent,
  	TypePropertyComponent
  ],
  providers: [
    TypePropertyService,
    {provide: APP_BASE_HREF, useValue : '/' }
  ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
