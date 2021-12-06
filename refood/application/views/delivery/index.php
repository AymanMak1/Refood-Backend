<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Deliveries Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('delivery/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PickUp Id</th>
						<th>Organisation Review</th>
						<th>Volunteer Review</th>
						<th>User</th>
						<th>Organisation</th>
						<th>Quality</th>
						<th>Date</th>
						<th>PickUp time</th>
						<th>Portions</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($deliveries as $d){ ?>
                    <tr>
						<td><?php echo $d['pickUpId']; ?></td>
						<td><?php echo $d['organisationReview']; ?></td>
						<td><?php echo $d['VolunteerReview']; ?></td>
						<td><?php echo $d['name']; ?><?php echo $d['lastname']; ?></td>
						<td><?php echo $d['organisationName']; ?></td>
						<td><?php echo $d['quality']; ?></td>
						<td><?php echo $d['date']; ?></td>
						<td><?php echo $d['pickUptime']; ?></td>
						<td><?php echo $d['portions']; ?></td>
						<td>
                            <a href="<?php echo site_url('delivery/edit/'.$d['pickUpId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('delivery/remove/'.$d['pickUpId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
