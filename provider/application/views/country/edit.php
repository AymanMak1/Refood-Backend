<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Edit Country </h3>
            </div>
			<?php echo form_open('country/edit/'.$country['countryID']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="countryNAME" class="control-label">Country name</label>
						<div class="form-group">
							<input type="text" name="countryNAME" value="<?php echo ($this->input->post('countryNAME') ? $this->input->post('countryNAME') : $country['countryNAME']); ?>" class="form-control" id="countryNAME" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>