<modal v-if="showModal" @close='closeModal("showModal")'>
	<div slot="header">
		<b>@yield('modal-show-form-title')</b>
		@include('layouts.flash')
	</div>	
	<div slot="body">
		<b>@yield('modal-show-form-content')</b>
		<div class="row">
			<div class="col-sm-offset-2 col-sm-8">
				<table class="table-responsive">
					<tbody>
						<template v-for="(field, value) in row">		
							<tr v-if="">
								<th style="width:50%">@{{ field }}</th>
								<td>@{{ value }}</td>
							</tr>
						</template>
					</tbody>
				</table>
			</div>
		</div>
	</div>	
	<template slot="footer">
		{{--<button type="button" class="btn btn-default" @click='closeModal("showModal")'>Close</button>--}}
	</template>	
</modal>