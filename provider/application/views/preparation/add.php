<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Preparation Add</h3>
            </div>
            <?php echo form_open('preparation/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
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
						<label for="expireAt" class="control-label">ExpireAt</label>
						<div class="form-group">
							<input type="text" name="expireAt" value="<?php echo $this->input->post('expireAt'); ?>" class="has-datepicker form-control" id="expireAt" />
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