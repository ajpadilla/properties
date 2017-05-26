<?php
	extract([
            'modalTitle'    => 'Agregar Cuota',
            'modalSync'     => 'dues_ADD',
            'modalClose'    => 'dues_ADD',
            'model'         => 'Sanction',
            'related'       => true,
            'type'	    => 'store',
            'content'       => view('briefcases.dues.fields'),
            'btbSave'       => true
	]);
?>

@include('layouts.modals.relation-form')