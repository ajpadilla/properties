<?php
	extract([
            'modalTitle'    => 'New Currency',
            'modalSync'     => 'currency_ADD_inform',
            'modalClose'    => 'currency_ADD_inform',
            'model'         => 'Currency',
            'type'			=> 'store',
            'content'       => view('countries.currencies.fields')
	]);
?>

@include('layouts.modals.relation-form')