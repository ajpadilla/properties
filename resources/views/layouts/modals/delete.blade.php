<modal v-if="deleteModal">
	<div slot="header">
		  <b>@yield('modal-delete-form-title')</b>
	</div>	
	<div slot="body">
		  <b>@yield('modal-delete-form-title')</b>
	</div>	
	<div slot="footer">
		<button type="button" class="btn btn-default" @click='closeModal("deleteModal")'>Close</button>
		<button type="button" class="btn btn-success" @click="" v-if="">Delete</button>
	</div>	
</modal>