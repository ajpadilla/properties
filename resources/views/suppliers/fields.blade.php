<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Supplier Form</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form">
				<div class="box-body">
					<div class="col-sm-6">
						
						<div class="form-group">
							<label for="identification_number" class="col-sm-2 control-label">Identification number</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.identification_number" class="form-control" placeholder="identification_number">
							</div>
						</div>

						<div class="form-group">
							<label for="supplier_regime" class="col-sm-2 control-label">Supplier regime</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.supplier_regime" class="form-control" placeholder="supplier_regime">
							</div>
						</div>

						<div class="form-group">
							<label for="business_name" class="col-sm-2 control-label">Business name</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.business_name" class="form-control" placeholder="business_name">
							</div>
						</div>

						<div class="form-group">
							<label for="legal_representative" class="col-sm-2 control-label">Legal representative</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="1" v-model="row.legal_representative">
								</textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="economic_activity" class="col-sm-2 control-label">Economic activity</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.economic_activity" class="form-control" placeholder="economic_activity">
							</div>
						</div>

						<div class="form-group">
							<label for="admission_date" class="col-sm-2 control-label">Admission date</label>
							<div class="col-sm-10">
								<datepicker v-model="row.admission_date" format="yyyy-MM-dd">
								</datepicker>
							</div>
						</div>

						<div class="form-group">
							<label for="address" class="col-sm-2 control-label">Legal representative</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="1" v-model="row.address">
								</textarea>
							</div>
						</div>
					</div>

					<div class="col-sm-6">

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

						<!-- Type identification Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">type identification id:</label>
								<div class="col-sm-10">
									<basic-select :options="foreignData.typeIdentificationOptions"
									:selected-option="row.type_identification_related"
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
