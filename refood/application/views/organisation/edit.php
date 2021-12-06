<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Organisation Edit</h3>
            </div>
			<?php echo form_open('organisation/edit/'.$organisation['organisationId']); ?>
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
									$selected = ($value == $organisation['approved']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="organisationType" class="control-label">Organisationtype</label>
						<div class="form-group">
							<select name="organisationType" class="form-control">
								<option value="">select organisationtype</option>
								<?php 
								foreach($all_organisationtypes as $organisationtype)
								{
									$selected = ($organisationtype['organisationTypeId'] == $organisation['organisationType']) ? ' selected="selected"' : "";

									echo '<option value="'.$organisationtype['organisationTypeId'].'" '.$selected.'>'.$organisationtype['organisationTypeName'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="organisationName" class="control-label">OrganisationName</label>
						<div class="form-group">
							<input type="text" name="organisationName" value="<?php echo ($this->input->post('organisationName') ? $this->input->post('organisationName') : $organisation['organisationName']); ?>" class="form-control" id="organisationName" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organisationLogo" class="control-label">OrganisationLogo</label>
						<div class="form-group">
							<input type="text" name="organisationLogo" value="<?php echo ($this->input->post('organisationLogo') ? $this->input->post('organisationLogo') : $organisation['organisationLogo']); ?>" class="form-control" id="organisationLogo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organisationJoindate" class="control-label">OrganisationJoindate</label>
						<div class="form-group">
							<input type="text" name="organisationJoindate" value="<?php echo ($this->input->post('organisationJoindate') ? $this->input->post('organisationJoindate') : $organisation['organisationJoindate']); ?>" class="has-datepicker form-control" id="organisationJoindate" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organisationEmail" class="control-label">OrganisationEmail</label>
						<div class="form-group">
							<input type="text" name="organisationEmail" value="<?php echo ($this->input->post('organisationEmail') ? $this->input->post('organisationEmail') : $organisation['organisationEmail']); ?>" class="form-control" id="organisationEmail" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organisationNumber" class="control-label">OrganisationNumber</label>
						<div class="form-group">
							<input type="text" name="organisationNumber" value="<?php echo ($this->input->post('organisationNumber') ? $this->input->post('organisationNumber') : $organisation['organisationNumber']); ?>" class="form-control" id="organisationNumber" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="organisationDescription" class="control-label">OrganisationDescription</label>
						<div class="form-group">
							<textarea name="organisationDescription" class="form-control" id="organisationDescription"><?php echo ($this->input->post('organisationDescription') ? $this->input->post('organisationDescription') : $organisation['organisationDescription']); ?></textarea>
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