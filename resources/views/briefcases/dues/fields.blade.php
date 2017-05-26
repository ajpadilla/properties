<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Due form</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form class="form-horizontal" role="form">
				<div class="box-body">
					<div class="col-sm-6">
						<!-- Property Id Field -->
						<div class="form-group">
							<label for="currency_id" class="col-sm-2 control-label">Due</label>
							<div class="col-sm-10">
								<basic-select :options="foreignData.dueOptions"
								:selected-option="row.due_related"
								placeholder="select item"
								@select="onSelect">
							</basic-select>
						</div>
					</div>
					<div class="form-group">
						<label for="amount" class="col-sm-2 control-label">Amount</label>
						<div class="col-sm-10">
							<input type="text" v-model="row.due.amount" class="form-control" placeholder="amount">
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
