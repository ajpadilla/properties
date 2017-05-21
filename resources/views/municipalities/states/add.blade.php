<?php
	extract([
            'modalTitle'    => 'New State',
            'modalSync'     => 'state_ADD_inform',
            'modalClose'    => 'state_ADD_inform',
            'model'         => 'State',
            'type'			=> 'store',
            'content'       => view('municipalities.states.fields')
	]);
?>

@include('layouts.modals.relation-form')