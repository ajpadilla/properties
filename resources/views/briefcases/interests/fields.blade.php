<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Interest form</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form">
				<div class="box-body">
					<div class="col-sm-6">
						<!-- Property Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Interest</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.interestOptions"
								:selected-option="row.interest_related"
								placeholder="select item"
								@select="onSelect">
							</basic-select>
						</div>
					</div>
					<div class="form-group">
						<label for="percent" class="col-sm-2 control-label">percent</label>
						<div class="col-sm-10">
							<input type="text" v-model="row.interest.percent" class="form-control" placeholder="percent">
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
