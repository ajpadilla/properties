<modal v-if="infoModal" @close='closeModal("infoModal")' width="600">
	<div slot="header">
	</div>	
	<template slot="body">
		@include('layouts.flash')
	</template>	
	<template slot="footer">
	</template>	
</modal>