<?php
	extract([
            'modalTitle'    => 'Add photo',
            'modalSync'     => 'photo_ADD_inform',
            'modalClose'    => 'photo_ADD_inform',
            'model'         => 'PersonPhoto',
            'type'			=> 'store',
            'content'       => view('layouts.modals.dropzone'),
            'btbSave'		=> false
	]);
?>

@include('layouts.modals.relation-form')