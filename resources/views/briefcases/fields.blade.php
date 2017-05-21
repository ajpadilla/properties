<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Briefcase Form</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form">
				<div class="box-body">
					<div class="col-sm-6">
						
						<div class="form-group">
							<label for="date_cut" class="col-sm-2 control-label">Date cut</label>
							<div class="col-sm-10">
								<datepicker v-model="row.date_cut" format="yyyy-MM-dd">
								</datepicker>
								{{--<input type="text" v-model="row.opening_date" class="form-control" placeholder="opening_date">--}}
							</div>
						</div>
							
						<div class="form-group">
							<label for="publication_date" class="col-sm-2 control-label">Publication date</label>
							<div class="col-sm-10">
								<datepicker v-model="row.publication_date" format="yyyy-MM-dd">
								</datepicker>
								{{--<input type="text" v-model="row.opening_date" class="form-control" placeholder="opening_date">--}}
							</div>
						</div>

						<div class="form-group">
							<label for="honorarium" class="col-sm-2 control-label">Honorarium</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.honorarium" class="form-control" placeholder="honorarium">
							</div>
						</div>

						<div class="form-group">
							<label for="total_capital" class="col-sm-2 control-label">Total capital</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.total_capital" class="form-control" placeholder="total_capital">
							</div>
						</div>

						<div class="form-group">
							<label for="total_sanction" class="col-sm-2 control-label">Total sanction</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.total_sanction" class="form-control" placeholder="total_sanction">
							</div>
						</div>

						<div class="form-group">
							<label for="total_interest" class="col-sm-2 control-label">Total interest</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.total_interest" class="form-control" placeholder="total_interest">
							</div>
						</div>

						<div class="form-group">
							<label for="total_debt" class="col-sm-2 control-label">Total debt</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.total_debt" class="form-control" placeholder="total_debt">
							</div>
						</div>

					</div>
					<div class="col-sm-6">

						<div class="form-group">
							<label for="cell_phone" class="col-sm-2 control-label">Debt indicator</label>
							<div class="col-sm-10">
								<input type="radio" id="active" value="1" v-model="row.debt_indicator">
								<label for="active">Si</label>
								<br>
								<input type="radio" id="inactive" value="0" v-model="row.debt_indicator">
								<label for="inactive">No</label>
								<br>
							</div>
						</div>

						<div class="form-group">
							<label for="cell_phone" class="col-sm-2 control-label">Sms indicator</label>
							<div class="col-sm-10">
								<input type="radio" id="si" value="1" v-model="row.sms_indicator">
								<label for="si">Si</label>
								<br>
								<input type="radio" id="inactiveno" value="0" v-model="row.sms_indicator">
								<label for="no">No</label>
								<br>
							</div>
						</div>
								
						<div class="form-group">
							<label for="positive_balance" class="col-sm-2 control-label">Positive balance</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.positive_balance" class="form-control" placeholder="positive_balance">
							</div>
						</div>

						<div class="form-group">
							<label for="application_code" class="col-sm-2 control-label">Application code</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.application_code" class="form-control" placeholder="application_code">
							</div>
						</div>

						<div class="form-group">
							<label for="debt_height" class="col-sm-2 control-label">Debt height</label>
							<div class="col-sm-10">
								<input type="text" v-model="row.debt_height" class="form-control" placeholder="debt_height">
							</div>
						</div>

						<!-- Community Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Community:</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.communityOptions"
									:selected-option="row.community_related"
									placeholder="select item"
									@select="onSelect">
								</basic-select>
							</div>
						</div>

						<!-- Property Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Property:</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.propertyOptions"
									:selected-option="row.property_related"
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
