<modal v-if="infoModal" @close='closeModal("infoModal")' width="600">
	<div slot="header">
	</div>	
	<template slot="body">
		<div v-if="flashSuccessfulMessage" :class="{ alert: true, 'alert-success': flashSuccessfulType == 'success',  
		'alert-danger': flashSuccessfulType == 'danger'}">
		<b>@{{ flashSuccessfulMessage }}</b>

		{{--<hr v-if="$validation.errors">
		<validator-errors :component="'custom-error'" :validation="$validation"></validator-errors>--}}
		</div>
</template>	
<template slot="footer">
</template>	
</modal>