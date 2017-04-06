<?php
	extract([
            'modalTitle'    => 'Add photo',
            'modalSync'     => 'photo_ADD_inform',
            'modalClose'    => 'photo_ADD_inform',
            'model'         => 'CommunityPhoto',
            'type'			=> 'store',
            'content'       => view('communities.photos.fields'),
            'btbSave'		=> false
	]);
?>

@include('layouts.modals.relation-form')