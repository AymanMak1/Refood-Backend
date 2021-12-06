<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Organizingcommittees Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('organizingcommittee/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>OrganizingCommitteeId</th>
                        <th>Event</th>
						<th>Approved</th>
						<th>Type</th>
						<th>OriganizerId</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($organizingcommittees as $o){ ?>
                    <tr>
						<td><?php echo $o['organizingCommitteeId']; ?></td>
						<td><?php echo $o['eventName']; ?></td>
                        <?php if ($o['approved'] == 1): ?>
					    	<td>Requested</td>
							<?php elseif ($o['approved'] == 2): ?>
							<td>Approved</td>
							<?php elseif ($o['approved'] == 3): ?>
							<td>leaving requested</td>
                            <?php elseif ($o['approved'] == 4): ?>
							<td>leaving approved</td>
						<?php endif; ?>

                        <?php if ($o['type'] == 1): ?>
					    	<td>organization</td>
							<?php elseif ($o['type'] == 2): ?>
							<td>Volunteer</td>
							<?php elseif ($o['type'] == 3): ?>
							<td>provider</td>
						<?php endif; ?>

						
						<td><?php echo $o['origanizerId']; ?></td>
						<td>
                            <a href="<?php echo site_url('organizingcommittee/edit/'.$o['organizingCommitteeId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('organizingcommittee/remove/'.$o['organizingCommitteeId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
