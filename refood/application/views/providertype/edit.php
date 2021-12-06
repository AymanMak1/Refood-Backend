<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Providertype Edit</h3>
            </div>
			<?php echo form_open('providertype/edit/'.$providertype['providerTypeId']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="providerTypeName" class="control-label">ProviderTypeName</label>
						<div class="form-group">
							<input type="text" name="providerTypeName" value="<?php echo ($this->input->post('providerTypeName') ? $this->input->post('providerTypeName') : $providertype['providerTypeName']); ?>" class="form-control" id="providerTypeName" />
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