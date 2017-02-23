<modal v-if="formModal" @close='closeModal("formModal")'>
	<div slot="header">
		  <b>@yield('modal-form-title')</b>
	</div>	
	<template slot="body">
		@include('layouts.flash')
		<b>@yield('modal-form-content')</b>
	</template>	
	<template slot="footer">
		{{--<button type="button" class="btn btn-default" @click='closeModal("formModal")'>Close</button>--}}
		<button type="button" class="btn btn-success" @click='submit'>Save</button>
	</template>	
</modal>