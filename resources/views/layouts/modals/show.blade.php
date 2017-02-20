<modal v-if="showModal">
	<div slot="header">
		  <b>@yield('modal-show-form-title')</b>
	</div>	
	<div slot="body">
		  <b>@yield('modal-show-form-content')</b>
	</div>	
	<div slot="footer">
		<button type="button" class="btn btn-default" @click='closeModal("showModal")'>Close</button>
	</div>	
</modal>