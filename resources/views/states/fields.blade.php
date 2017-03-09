<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Estate Form</h3>
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
						<label for="inputEmail3" class="col-sm-2 control-label">Area code</label>
						<div class="col-sm-10">
							<input type="text" v-model="row.area_code" class="form-control" placeholder="area code">
						</div>
					</div>
					<!-- SubFamily Id Field -->
					<div class="form-group">
						<label for="country_id" class="col-sm-2 control-label">Country:</label>
						<div class="col-sm-10">
							<div class="input-group">
								<select class="form-control" v-model="row.country_id">
								<option v-for="(name, id) in foreignData.countryOptions" v-bind:value="id">	
										@{{ name }}
									</option>
								</select>
								<span class="input-group-btn">
									<button class="btn btn-primary" @click.prevent="modal('country_ADD_inform')">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</form>
		</div>
		<!-- /.box -->
	</div>
</div>
