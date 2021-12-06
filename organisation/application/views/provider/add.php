<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Provider Add</h3>
            </div>
            <?php echo form_open('provider/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="approved" class="control-label">Approved</label>
						<div class="form-group">
							<select name="approved" class="form-control">
								<option value="">select</option>
								<?php 
								$approved_values = array(
									'1'=>'requested',
									'2'=>'approved',
									'3'=>'leaving requested',
									'4'=>'leaving approved',
								);

								foreach($approved_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('approved')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="providerType" class="control-label">Providertype</label>
						<div class="form-group">
							<select name="providerType" class="form-control">
								<option value="">select providertype</option>
								<?php 
								foreach($all_providertypes as $providertype)
								{
									$selected = ($providertype['providerTypeId'] == $this->input->post('providerType')) ? ' selected="selected"' : "";

									echo '<option value="'.$providertype['providerTypeId'].'" '.$selected.'>'.$providertype['providerTypeName'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="providerName" class="control-label">ProviderName</label>
						<div class="form-group">
							<input type="text" name="providerName" value="<?php echo $this->input->post('providerName'); ?>" class="form-control" id="providerName" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="password" class="control-label">Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="providerDescription" class="control-label">ProviderDescription</label>
						<div class="form-group">
							<input type="text" name="providerDescription" value="<?php echo $this->input->post('providerDescription'); ?>" class="form-control" id="providerDescription" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="providerLogo" class="control-label">ProviderLogo</label>
						<div class="form-group">
							<input type="file" name="providerLogo" value="<?php echo $this->input->post('providerLogo'); ?>" class="form-control" id="providerLogo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="providerJoinDate" class="control-label">ProviderJoinDate</label>
						<div class="form-group">
							<input type="text" name="providerJoinDate" value="<?php echo $this->input->post('providerJoinDate'); ?>" class="has-datepicker form-control" id="providerJoinDate" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="providerEmail" class="control-label">ProviderEmail</label>
						<div class="form-group">
							<input type="text" name="providerEmail" value="<?php echo $this->input->post('providerEmail'); ?>" class="form-control" id="providerEmail" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="providerPhone" class="control-label">ProviderPhone</label>
						<div class="form-group">
							<input type="text" name="providerPhone" value="<?php echo $this->input->post('providerPhone'); ?>" class="form-control" id="providerPhone" />
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