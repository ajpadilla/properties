<modal v-if="infoModal" @close='closeModal("infoModal")'>
	<div slot="header">
	</div>	
	<template slot="body">
		@include('layouts.flash')
	</template>	
	<template slot="footer">
	</template>	
</modal>