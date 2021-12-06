<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Pickup Add</h3>
            </div>
            <?php echo form_open('pickup/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="providerReview" class="control-label">ProviderReview</label>
						<div class="form-group">
							<select name="providerReview" class="form-control">
								<option value="">select</option>
								<?php 
								$providerReview_values = array(
									'1'=>'1',
									'2'=>'2',
									'3'=>'3',
									'4'=>'4',
									'5'=>'5',
								);

								foreach($providerReview_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('providerReview')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="VolunteerReview" class="control-label">VolunteerReview</label>
						<div class="form-group">
							<select name="VolunteerReview" class="form-control">
								<option value="">select</option>
								<?php 
								$VolunteerReview_values = array(
									'1'=>'1',
									'2'=>'2',
									'3'=>'3',
									'4'=>'4',
									'5'=>'5',
								);

								foreach($VolunteerReview_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('VolunteerReview')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="provider" class="control-label">Provider</label>
						<div class="form-group">
							<select name="provider" class="form-control">
								<option value="">select provider</option>
								<?php 
								foreach($all_providers as $provider)
								{
									$selected = ($provider['providerId'] == $this->input->post('provider')) ? ' selected="selected"' : "";

									echo '<option value="'.$provider['providerId'].'" '.$selected.'>'.$provider['providerName'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="user" class="control-label">User</label>
						<div class="form-group">
							<select name="user" class="form-control">
								<option value="">select user</option>
								<?php 
								foreach($all_users as $user)
								{
									$selected = ($user['userId'] == $this->input->post('user')) ? ' selected="selected"' : "";

									echo '<option value="'.$user['userId'].'" '.$selected.'>'.$user['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="quality" class="control-label">Quality</label>
						<div class="form-group">
							<input type="text" name="quality" value="<?php echo $this->input->post('quality'); ?>" class="form-control" id="quality" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date" class="control-label">Date</label>
						<div class="form-group">
							<input type="text" name="date" value="<?php echo $this->input->post('date'); ?>" class="has-datepicker form-control" id="date" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="pickUptime" class="control-label">PickUptime</label>
						<div class="form-group">
							<input type="text" name="pickUptime" value="<?php echo $this->input->post('pickUptime'); ?>" class="has-datepicker form-control" id="pickUptime" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="portions" class="control-label">Portions</label>
						<div class="form-group">
							<input type="text" name="portions" value="<?php echo $this->input->post('portions'); ?>" class="form-control" id="portions" />
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