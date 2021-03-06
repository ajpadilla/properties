<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Country Form</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form">
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Code</label>
						<div class="col-sm-10">
							<input type="text" v-model="row.code" class="form-control" placeholder="code">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" v-model="row.name" class="form-control" placeholder="name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Language</label>
						<div class="col-sm-10">
							<input type="text" v-model="row.language" class="form-control" placeholder="language">
						</div>
					</div>
					<!-- Currency Id Field -->
					<div class="form-group">
						<label for="currency_id" class="col-sm-2 control-label">Currency:</label>
						<div class="col-sm-10">
							{{--<div class="input-group">--}}
								{{--<select class="form-control" v-model="row.currency_id">
								<option v-for="(name, id) in foreignData.currencyOptions" v-bind:value="id">	
										@{{ name }}
									</option>
								</select>--}}
								
								  <basic-select :options="foreignData.currencyOptions"
								 	:selected-option="row.currency_related"
								    placeholder="select item"
								    @select="onSelect">
								  </basic-select>

								{{--<span class="input-group-btn">
									<button class="btn btn-primary" @click.prevent="modal('currency_ADD_inform')">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</button>
								</span>--}}
							{{--</div>--}}
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</form>
		</div>
		<!-- /.box -->
	</div>
</div>
