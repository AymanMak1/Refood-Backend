<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">User Edit</h3>
            </div>
			<?php echo form_open('user/edit/'.$user['UserId'], 'enctype="multipart/form-data"'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="admin" class="control-label">Admin</label>
						<div class="form-group">
							<select name="admin" class="form-control">
								<option value="">select</option>
								<?php 
								$admin_values = array(
									'0'=>'yes',
									'1'=>'no',
									'2'=>'Pending',
								);

								foreach($admin_values as $value => $display_text)
								{
									$selected = ($value == $user['admin']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="gender" class="control-label">Gender</label>
						<div class="form-group">
							<select name="gender" class="form-control">
								<option value="">select gender</option>
								<?php 
								foreach($all_genders as $gender)
								{
									$selected = ($gender['genderId'] == $user['gender']) ? ' selected="selected"' : "";

									echo '<option value="'.$gender['genderId'].'" '.$selected.'>'.$gender['gendeName'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cityFrom" class="control-label">City</label>
						<div class="form-group">
							<select name="cityFrom" class="form-control">
								<option value="">select city</option>
								<?php 
								foreach($all_cities as $city)
								{
									$selected = ($city['cityId'] == $user['cityFrom']) ? ' selected="selected"' : "";

									echo '<option value="'.$city['cityId'].'" '.$selected.'>'.$city['cityname'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cityResident" class="control-label">City</label>
						<div class="form-group">
							<select name="cityResident" class="form-control">
								<option value="">select city</option>
								<?php 
								foreach($all_cities as $city)
								{
									$selected = ($city['cityId'] == $user['cityResident']) ? ' selected="selected"' : "";

									echo '<option value="'.$city['cityId'].'" '.$selected.'>'.$city['cityname'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="volunteer" class="control-label">Volunteer</label>
						<div class="form-group">
							<select name="volunteer" class="form-control">
								<option value="">select</option>
								<?php 
								$volunteer_values = array(
									'0'=>'normal user',
									'1'=>'requested to join',
									'2'=>'approved to join',
									'3'=>'requested to leave',
								);

								foreach($volunteer_values as $value => $display_text)
								{
									$selected = ($value == $user['volunteer']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="password" class="control-label">Password</label>
						<div class="form-group">
							<input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $user['password']); ?>" class="form-control" id="password" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $user['name']); ?>" class="form-control" id="name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="lastname" class="control-label">Lastname</label>
						<div class="form-group">
							<input type="text" name="lastname" value="<?php echo ($this->input->post('lastname') ? $this->input->post('lastname') : $user['lastname']); ?>" class="form-control" id="lastname" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control" id="email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="datebirthday" class="control-label">Datebirthday</label>
						<div class="form-group">
							<input type="text" name="datebirthday" value="<?php echo ($this->input->post('datebirthday') ? $this->input->post('datebirthday') : $user['datebirthday']); ?>" class="has-datepicker form-control" id="datebirthday" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="photo" class="control-label">Photo</label>
						<div class="form-group">
						<input type="file" name="photo"  class="form-control" id="photo" />
							<span class="text-danger"><?php echo form_error('photo');?></span>
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