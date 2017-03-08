<modal v-if="localModals.{{ $modalSync }}" @close="closeModal('{{ $modalClose }}')" width="800">
	<template slot="header">
		<b>{{ $modalTitle }}</b>
	</template>	
	<template slot="body">
		@include('layouts.flash')
		{!! $content !!}
	</template>	
	<template slot="footer">
		{{--<button type="button" class="btn btn-default" @click='closeModal("formModal")'>Close</button>--}}
		<button type="button" class="btn btn-success" @click='submit(
			{{ ( isset ($model) 	? "'" 	. lcfirst($model) . "'" : 'null' ) }}, 
			{{ ( isset ($type) 		? "'" 	. $type 	. "'" : 'null' ) }}, 
			{{ ( isset ($related) 	? "'" 	. $related 	. "'" : 'null' ) }}
		)'>Save</button>
	</template>	
</modal>