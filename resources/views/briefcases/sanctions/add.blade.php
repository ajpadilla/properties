<?php
	extract([
            'modalTitle'    => 'Agregar Sanción',
            'modalSync'     => 'sanctions_ADD',
            'modalClose'    => 'sanctions_ADD',
            'model'         => 'Sanction',
            'related'       => true,
            'type'	    => 'store',
            'content'       => view('briefcases.sanctions.fields'),
            'btbSave'       => true
	]);
?>

@include('layouts.modals.relation-form')