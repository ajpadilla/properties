import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';

import { AppComponent }  from './app.component';
import { TypePropertyComponent } from './type-property.component';

import {APP_BASE_HREF} from '@angular/common';


@NgModule({
  imports:      [ 
  	BrowserModule,  
  	AppRoutingModule
  ],
  declarations: [ 
  	AppComponent,
  	TypePropertyComponent
  ],
  providers: [
    {provide: APP_BASE_HREF, useValue : '/' }
  ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
