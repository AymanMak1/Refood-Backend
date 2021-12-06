<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pickups Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('pickup/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PickUpId</th>
						<th>ProviderReview</th>
						<th>VolunteerReview</th>
						<th>Provider</th>
						<th>User</th>
						<th>Quality</th>
						<th>Date</th>
						<th>PickUptime</th>
						<th>Portions</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($pickups as $p){ ?>
                    <tr>
						<td><?php echo $p['pickUpId']; ?></td>
						<td><?php echo $p['providerReview']; ?></td>
						<td><?php echo $p['VolunteerReview']; ?></td>
						<td><?php echo $p['providerName']; ?></td>
						<td><?php echo $p['name']; ?> <?php echo $p['lastname']; ?> </td>
						<td><?php echo $p['quality']; ?></td>
						<td><?php echo $p['date']; ?></td>
						<td><?php echo $p['pickUptime']; ?></td>
						<td><?php echo $p['portions']; ?></td>
						<td>
                            <a href="<?php echo site_url('pickup/edit/'.$p['pickUpId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('pickup/remove/'.$p['pickUpId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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