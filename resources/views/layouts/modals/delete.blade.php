<modal v-if="deleteModal" @close='closeModal("deleteModal")'>
	<div slot="header">
		  <b>@yield('modal-delete-form-title')</b>
	</div>	
	<div slot="body">
		  <b>@yield('modal-delete-form-title')</b>
		  @include('layouts.flash')
	</div>	
	<template slot="footer">
		{{--<button type="button" class="btn btn-default" @click='closeModal("deleteModal")'>Close</button>--}}
		<button type="button" class="btn btn-success" @click="submit" v-if="">Delete</button>
	</template>	
</modal>