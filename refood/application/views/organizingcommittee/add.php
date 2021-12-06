<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Organizingcommittee Add</h3>
            </div>
            <?php echo form_open('organizingcommittee/add'); ?>
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
						<label for="type" class="control-label">Type</label>
						<div class="form-group">
							<select name="type" class="form-control">
								<option value="">select</option>
								<?php 
								$type_values = array(
									'1'=>'organization',
									'2'=>'volunteer',
									'3'=>'provider',
								);

								foreach($type_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('type')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="event" class="control-label">Event</label>
						<div class="form-group">
							<select name="event" class="form-control">
								<option value="">select event</option>
								<?php 
								foreach($all_events as $event)
								{
									$selected = ($event['eventId'] == $this->input->post('event')) ? ' selected="selected"' : "";

									echo '<option value="'.$event['eventId'].'" '.$selected.'>'.$event['name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="origanizerId" class="control-label">OriganizerId</label>
						<div class="form-group">
							<input type="text" name="origanizerId" value="<?php echo $this->input->post('origanizerId'); ?>" class="form-control" id="origanizerId" />
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