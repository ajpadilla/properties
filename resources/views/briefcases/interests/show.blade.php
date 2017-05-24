@extends('layouts.modals.show')

@section('modal-show-form-title')
	<h1 v-if="row.name">Datos del item @{{ row.name }}</h1>
@stop

@section('modal-show-form-content')
	Form Show content
	{{--@include('admin.schools.fields')--}}
@stop