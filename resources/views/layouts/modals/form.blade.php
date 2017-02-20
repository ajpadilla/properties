<modal v-if="formModal" @close='closeModal("formModal")'>
	<div slot="header">
		  <b>@yield('modal-form-title')</b>
	</div>	
	<div slot="body">
		  <b>@yield('modal-form-content')</b>
	</div>	
	<template slot="footer">
		{{--<button type="button" class="btn btn-default" @click='closeModal("formModal")'>Close</button>--}}
		<button type="button" class="btn btn-success" @click="" v-if="">Save</button>
	</template>	
</modal>