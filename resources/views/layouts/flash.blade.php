<div v-if="flashMessage" :class="{ alert: true, 'alert-success': flashType == 'success',  
'alert-danger': flashType == 'danger'}">
	<b>@{{ flashMessage }}</b>

	{{--<hr v-if="$validation.errors">
	<validator-errors :component="'custom-error'" :validation="$validation"></validator-errors>--}}
</div>
<div class="row">
	<ul class="list-group" v-if="errorMessages">
	  <li class="list-group-item" v-for="error in errorMessages">@{{ error }}</li>
	</ul>
</div>
