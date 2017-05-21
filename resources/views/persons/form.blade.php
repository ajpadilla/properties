@extends('layouts.modals.form')

@section('modal-form-title')
	<h1 v-if="row.name">Datos del item @{{ row.name }}</h1>
	<h1 v-else>Datos</h1>
@stop

@section('modal-form-content')
	@include('persons.fields')
@stop
