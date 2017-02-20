<modal v-if="showModal" @close='closeModal("showModal")'>
	<div slot="header">
		  <b>@yield('modal-show-form-title')</b>
	</div>	
	<div slot="body">
		  <b>@yield('modal-show-form-content')</b>
	</div>	
	<template slot="footer">
		{{--<button type="button" class="btn btn-default" @click='closeModal("showModal")'>Close</button>--}}
	</template>	
</modal>