<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Person Form</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form">
				<div class="box-body">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Identification number</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.identification_number" class="form-control" placeholder="Code">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Business name</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.business_name" class="form-control" placeholder="Business name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">First name</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.first_name" class="form-control" placeholder="First name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Second name</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.second_name" class="form-control" placeholder="Second name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">First surname</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.first_surname" class="form-control" placeholder="First name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Second surname</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.second_surname" class="form-control" placeholder="Second name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Home phone</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.home_phone" class="form-control" placeholder="Home phone">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Auxiliary phone</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.auxiliary_phone" class="form-control" placeholder="Auxiliary phone">
							</div>
						</div>	
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Cell phone</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.cell_phone" class="form-control" placeholder="Cell phone">
							</div>
						</div>	
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Auxiliary cell</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.auxiliary_cell" class="form-control" placeholder="Auxiliary cell">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Home email</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.home_email" class="form-control" placeholder="Home email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Auxiliary email</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.auxiliary_email" class="form-control" placeholder="Auxiliary email">
							</div>
						</div>
						<div class="form-group">
							<label for="reason_retiring" class="col-sm-2 control-label">Correspondence address</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="1" v-model="row.correspondence_address">
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">City correspondence</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.city_correspondence" class="form-control" placeholder="City correspondence">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Country correspondence</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.country_correspondence" class="form-control" placeholder="Country correspondence">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="reason_retiring" class="col-sm-2 control-label">Office address</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="1" v-model="row.office_address">
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">City office</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.city_office" class="form-control" placeholder="City office">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Country office</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.country_office" class="form-control" placeholder="Country office">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Birth date</label>
							<div class="col-sm-10">
								<input type="date" v-model="row.birth_date" class="form-control" placeholder="Birth date">
							</div>
						</div>
						<div class="form-group">
							<label for="cell_phone" class="col-sm-2 control-label">Gender</label>
							<div class="col-sm-10">
								<input type="radio" id="male" value="male" v-model="row.gender">
								<label for="male">Male</label>
								<br>
								<input type="radio" id="female" value="female" v-model="row.gender">
								<label for="female">Female</label>
								<br>
							</div>
						</div>
						<!-- civil status Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Civil status:</label>
							<div class="col-sm-10">
								{{--<basic-select :options=""
									:selected-option="row.country_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>--}}
								<select v-model="row.civil_status">
								  <option disabled value="">Please select one</option>
								  <option>married</option>
								  <option>bachelor</option>
								  <option>divorced</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Cod labor activity</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.cod_labor_activity" class="form-control" placeholder="Cod labor activity">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Admission date</label>
							<div class="col-sm-10">
								<input type="date" v-model="row.admission_date" class="form-control" placeholder="Admission date">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Cancellation date</label>
							<div class="col-sm-10">
								<input type="date" v-model="row.cancellation_date" class="form-control" placeholder="Cancellation date">
							</div>
						</div>
						<div class="form-group">
							<label for="cell_phone" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<input type="radio" id="active" value="1" v-model="row.status">
								<label for="active">Activa</label>
								<br>
								<input type="radio" id="inactive" value="0" v-model="row.status">
								<label for="inactive">Inactiva</label>
								<br>
							</div>
						</div>
						<!-- Contry Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Country:</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.countryOptions"
									:selected-option="row.country_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
								{{--<select class="form-control" v-model="row.country_related.value">
									<option v-for="country in foreignData.countryOptions" 
									v-bind:value="country.value">		
										@{{ country.text }}
									</option>
								</select>--}}
							</div>
						</div>
						<!-- State Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">State:</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.stateOptions"
									:selected-option="row.state_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
								{{--<select class="form-control" v-model="row.state_related.value">
									<option v-for="state in foreignData.stateOptions" 
									v-bind:value="state.value">		
										@{{ state.text}}
									</option>
								</select>--}}
							</div>
						</div>
						<!-- City birth Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">City birth</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.cityBirthOptions"
									:selected-option="row.city_birth_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
							</div>
						</div>
						<!-- Disability Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Disability</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.disabilityOptions"
									:selected-option="row.disability_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
							</div>
						</div>

						<!-- educational level Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Educational Level</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.educationalLevelOptions"
									:selected-option="row.educational_level_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
							</div>
						</div>

						<!-- Type identification Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Type identification</label>
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
