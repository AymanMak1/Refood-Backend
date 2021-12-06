<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Providers Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('provider/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ProviderId</th>
                        <th>Provider Name</th>
						<th>Approved</th>
						<th>Provider Type</th>
                        <th>Provider Password</th>
						<th>Provider Description</th>
						<th>Provider Logo</th>
						<th>Provider JoinDate</th>
						<th>Provider Email</th>
						<th>Provider Phone</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($providers as $p){ ?>
                    <tr>
						<td><?php echo $p['providerId']; ?></td>
                        <td><?php echo $p['providerName']; ?></td>
						<?php if ($p['approved'] == 0): ?>
					    	<td>No</td>
							<?php elseif ($p['approved'] == 1): ?>
							<td>Requested to join</td>
							<?php elseif ($p['approved'] == 2): ?>
							<td>Approved </td>
							<?php elseif ($p['approved'] == 3): ?>
							<td>Requested to leave</td>
						<?php endif; ?>
						<td><?php echo $p['providerTypeName']; ?></td>
                        <td><?php echo $p['providerPassword']; ?></td>
						<td><?php echo $p['providerDescription']; ?></td>
                        <td><img src="<?php echo IMAGEURL.$p['providerLogo'] ?>" width="150" height="150"></td>
						<td><?php echo $p['providerJoinDate']; ?></td>
						<td><?php echo $p['providerEmail']; ?></td>
						<td><?php echo $p['providerPhone']; ?></td>
						<td>
                            <a href="<?php echo site_url('provider/edit/'.$p['providerId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('provider/remove/'.$p['providerId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
