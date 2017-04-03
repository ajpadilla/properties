<?php
	extract([
            'modalTitle'    => 'Add photo',
            'modalSync'     => 'photo_ADD_inform',
            'modalClose'    => 'photo_ADD_inform',
            'model'         => 'Currency',
            'type'			=> 'store',
            'content'       => view('communities.photos.fields')
	]);
?>

@include('layouts.modals.relation-form')