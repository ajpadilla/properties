<modal v-if="formModal">
	<div slot="header">
		  <b>@yield('modal-form-title')</b>
	</div>	
	<div slot="body">
		  <b>@yield('modal-form-content')</b>
	</div>	
	<div slot="footer">
		<button type="button" class="btn btn-default" @click='closeModal("formModal")'>Close</button>
		<button type="button" class="btn btn-success" @click="" v-if="">Save</button>
	</div>	
</modal>