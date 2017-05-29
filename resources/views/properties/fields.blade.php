<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Property Form</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form">
				<div class="box-body">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">Description</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="1" v-model="row.description">
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="number" class="col-sm-2 control-label">Identification number</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.number" class="form-control" placeholder="Number">
							</div>
						</div>
						<div class="form-group">
							<label for="area" class="col-sm-2 control-label">Area</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.area" class="form-control" placeholder="Number">
							</div>
						</div>
						<div class="form-group">
							<label for="number_habitants" class="col-sm-2 control-label">Number habitants</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.number_habitants" class="form-control" placeholder="Number habitants">
							</div>
						</div>
						<div class="form-group">
							<label for="number_pets" class="col-sm-2 control-label">Number pets</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.number_pets" class="form-control" placeholder="Number pets">
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
							<label for="registration_number" class="col-sm-2 control-label">Registration number</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.registration_number" class="form-control" placeholder="Registration number">
							</div>
						</div>
						<div class="form-group">
							<label for="date_construction" class="col-sm-2 control-label">Date construction</label>
							<div class="col-sm-10">
								<datepicker v-model="row.date_construction" format="yyyy-MM-dd">
								</datepicker>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="cell_phone" class="col-sm-2 control-label">status</label>
							<div class="col-sm-10">
								<input type="radio" id="active" value="1" v-model="row.status">
								<label for="male">Active</label>
								<br>
								<input type="radio" id="inactive" value="0" v-model="row.status">
								<label for="female">inactive</label>
								<br>
							</div>
						</div>
						<div class="form-group">
							<label for="cell_phone" class="col-sm-2 control-label">Reside property</label>
							<div class="col-sm-10">
								<input type="radio" id="Yes" value="1" v-model="row.reside_property">
								<label for="male">Yes</label>
								<br>
								<input type="radio" id="No" value="0" v-model="row.reside_property">
								<label for="female">No</label>
								<br>
							</div>
						</div>
						<div class="form-group">
							<label for="type_contract" class="col-sm-2 control-label">Type contract</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.type_contract" class="form-control" placeholder="Type contract">
							</div>
						</div>
						<div class="form-group">
							<label for="start_date_lease" class="col-sm-2 control-label">Start date lease</label>
							<div class="col-sm-10">
								<datepicker v-model="row.start_date_lease" format="yyyy-MM-dd">
								</datepicker>
							</div>
						</div>
						<div class="form-group">
							<label for="end_date_lease" class="col-sm-2 control-label">End date lease</label>
							<div class="col-sm-10">
								<datepicker v-model="row.end_date_lease" format="yyyy-MM-dd">
								</datepicker>
							</div>
						</div>										
						<!-- type property Id Field -->
						<div class="form-group">
							<label for="type_property_related" class="col-sm-2 control-label">Type property</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.typePropertyOptions"
									:selected-option="row.type_property_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
							</div>
						</div>
						<!-- community Id Field -->
						<div class="form-group">
							<label for="community_related" class="col-sm-2 control-label">Community</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.communityOptions"
									:selected-option="row.community_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
							</div>						
						</div>
						<!-- person Id Field -->
						<div class="form-group">
							<label for="person_related" class="col-sm-2 control-label">Person</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.personOptions"
									:selected-option="row.person_related"
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
