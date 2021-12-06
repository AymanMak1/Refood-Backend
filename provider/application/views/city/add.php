<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"> Add City</h3>
            </div>
            <?php echo form_open('city/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="country" class="control-label">Country</label>
						<div class="form-group">
							<select name="country" class="form-control">
								<option value="">select country</option>
								<?php 
								foreach($all_countries as $country)
								{
									$selected = ($country['countryID'] == $this->input->post('country')) ? ' selected="selected"' : "";

									echo '<option value="'.$country['countryID'].'" '.$selected.'>'.$country['countryNAME'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cityname" class="control-label">Cityname</label>
						<div class="form-group">
							<input type="text" name="cityname" value="<?php echo $this->input->post('cityname'); ?>" class="form-control" id="cityname" />
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