@extends('layouts.modals.form')

@section('modal-form-title')
	Form (Create-Edit) Type Property
@stop

@section('modal-form-content')
	@include('typeProperties.fields')
@stop
