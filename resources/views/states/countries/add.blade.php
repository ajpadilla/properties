<?php
	extract([
            'modalTitle'    => 'New Country',
            'modalSync'     => 'country_ADD_inform',
            'modalClose'    => 'country_ADD_inform',
            'model'         => 'Country',
            'type'			=> 'store',
            'content'       => view('states.countries.fields')
	]);
?>

@include('layouts.modals.relation-form')