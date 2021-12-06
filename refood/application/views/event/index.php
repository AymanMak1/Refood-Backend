<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Events Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('event/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>EventId</th>
                        <th>Name</th>
						<th>User</th>
						<th>Description</th>
						<th>Date</th>
						<th>Time</th>
						<th>Location</th>
						<th>OrganisationComiteeNumber</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($events as $e){ ?>
                    <tr>
						<td><?php echo $e['eventId']; ?></td>
                        <td><?php echo $e['eventName']; ?></td>
						<td><?php echo $e['userName']; ?> <?php echo $e['lastname']; ?></td>
						
						<td><?php echo $e['description']; ?></td>
						<td><?php echo $e['date']; ?></td>
						<td><?php echo $e['time']; ?></td>
						<td><?php echo $e['location']; ?></td>
						<td><?php echo $e['organisationComiteeNumber']; ?></td>
						<td>
                            <a href="<?php echo site_url('event/edit/'.$e['eventId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('event/remove/'.$e['eventId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
