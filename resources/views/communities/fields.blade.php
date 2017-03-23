<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Community Form</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form">
				<div class="box-body">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="nit" class="col-sm-2 control-label">Nit</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.nit" class="form-control" placeholder="nit">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.name" class="form-control" placeholder="name">
							</div>
						</div>
						<div class="form-group">
							<label for="home_phone" class="col-sm-2 control-label">Home phone</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.home_phone" class="form-control" placeholder="home_phone">
							</div>
						</div>
						<div class="form-group">
							<label for="auxiliary_phone" class="col-sm-2 control-label">Auxiliary phone</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.auxiliary_phone" class="form-control" placeholder="auxiliary_phone">
							</div>
						</div>
						<div class="form-group">
							<label for="cell_phone" class="col-sm-2 control-label">Cell phone</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.cell_phone" class="form-control" placeholder="cell_phone">
							</div>
						</div>
						<div class="form-group">
							<label for="cell_phone" class="col-sm-2 control-label">Estatus</label>
							<div class="col-sm-10">
								<input type="radio" id="active" value="1" v-model="row.status">
								<label for="active">Activa</label>
								<br>
								<input type="radio" id="inactive" value="0" v-model="row.status">
								<label for="inactive">Inactiva</label>
								<br>
							</div>
						</div>
						<div class="form-group">
							<label for="opening_date" class="col-sm-2 control-label">Ingreso</label>
							<div class="col-sm-10">
								<datepicker v-model="row.opening_date" format="yyyy-MM-dd">
								</datepicker>
								{{--<input type="text" v-model="row.opening_date" class="form-control" placeholder="opening_date">--}}
							</div>
						</div>
						<div class="form-group">
							<label for="reason_retiring" class="col-sm-2 control-label">Reason retiring</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="1" v-model="row.reason_retiring">
								</textarea>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="auxiliary_cell" class="col-sm-2 control-label">Auxiliary cell</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.auxiliary_cell" class="form-control" placeholder="auxiliary_cell">
							</div>
						</div>
						<div class="form-group">
							<label for="home_email" class="col-sm-2 control-label">Home email</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.home_email" class="form-control" placeholder="home_email">
							</div>
						</div>
						<div class="form-group">
							<label for="auxiliary_email" class="col-sm-2 control-label">Auxiliary email</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.auxiliary_email" class="form-control" placeholder="auxiliary_email">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-sm-2 control-label">Address</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="1" v-model="row.address">
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="cancellation_date" class="col-sm-2 control-label">Salida</label>
							<div class="col-sm-10">
								<datepicker v-model="row.cancellation_date" format="yyyy-MM-dd">
								</datepicker>
								{{--<input type="text" v-model="row.cancellation_date" class="form-control" placeholder="cancellation_date">--}}
							</div>
						</div>
						<!-- Municipality Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Municipality:</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.municipalityOptions"
									:selected-option="row.municipality_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
							</div>
						</div>
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Type Community:</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.typeCommunityOptions"
									:selected-option="row.type_community_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
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
