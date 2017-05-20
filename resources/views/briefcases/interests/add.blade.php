<?php
	extract([
            'modalTitle'    => 'Agregar Interes',
            'modalSync'     => 'interests_ADD',
            'modalClose'    => 'interests_ADD',
            'model'         => 'Interest',
            'related'       => true,
            'type'			=> 'store',
            'content'       => view('briefcases.interests.fields'),
            'btbSave'       => true
	]);
?>

@include('layouts.modals.relation-form')