import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { TypePropertyComponent } from './type-property.component';

const routes: Routes = [
  { path: '', redirectTo: '/admin/dashboard', pathMatch: 'full' },
  { path: 'admin/dashboard',  component: TypePropertyComponent },
  { path: 'admin/types-properties',  component: TypePropertyComponent },
];

@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})

export class AppRoutingModule {}
