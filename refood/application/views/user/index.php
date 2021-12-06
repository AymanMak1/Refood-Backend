
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pending Volunteer Leaving Requests</h3>
            	<div class="box-tools">
                 
                </div>
            </div>
<div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Name</th>
						<th>Lastname</th>
						<th>Admin</th>
						<th>Gender</th>
						<th>City From</th>
						<th>City Resident</th>
						<th>Volunteer</th>
						<th>Email</th>
						<th>Birthday date</th>
						<th>Photo</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($leavolunteers as $v){ ?>
                     <tr>
					
						<td><?php echo $v['name']; ?></td>
						<td><?php echo $v['lastname']; ?></td>
						<?php if ($v['admin'] == 0): ?>
					    	<td>Yes</td>
							<?php elseif ($v['admin'] == 1): ?>
							<td>No</td>
                            <?php elseif ($v['admin'] == 2): ?>
							<td>Pending</td>
						<?php endif; ?>
						

						<td><?php echo $v['gendeName']; ?></td>
						<td><?php echo $v['cityFromName']; ?> <?php echo $v['cityFromCountryName']; ?> </td>
						<td><?php echo $v['cityResidentName']; ?> <?php echo $v['cityResidentCountryName']; ?></td>
						<?php if ($v['volunteer'] == 0): ?>
					    	<td>No</td>
							<?php elseif ($v['volunteer'] == 1): ?>
							<td>Requested to join</td>
							<?php elseif ($v['volunteer'] == 2): ?>
							<td>Approved volunteer</td>
							<?php elseif ($v['volunteer'] == 3): ?>
							<td>Requested to leave</td>
						<?php endif; ?>

						<td><?php echo $v['email']; ?></td>
						<td><?php echo $v['datebirthday']; ?></td>
						<td><img src="<?php echo IMAGEURL.$v['photo']; ?>" width="150" height="150"></td>

						<td>

                            <a href="<?php echo site_url('user/denyvol/'.$v['userId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approve</a> 
                            <a href="<?php echo site_url('user/approvevol/'.$v['userId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deny</a>

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
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>UserId</th>
						<th>Name</th>
						<th>Lastname</th>
						<th>Admin</th>
						<th>Gender</th>
						<th>City From</th>
						<th>City Resident</th>
						<th>Volunteer</th>
						<th>Password</th>
						<th>Email</th>
						<th>Birthday date</th>
						<th>Photo</th>
						<th>CreatedAt</th>
						<th>UpdatedAt</th>
						<th>Actions</th>
                    </tr>
                     <?php foreach($users as $u){ ?>
                     <tr>
						<td><?php echo $u['userId']; ?></td>
						<td><?php echo $u['name']; ?></td>
						<td><?php echo $u['lastname']; ?></td>
						<?php if ($u['admin'] == 0): ?>
					    	<td>Yes</td>
							<?php elseif ($u['admin'] == 1): ?>
							<td>No</td>
							<?php elseif ($u['admin'] == 2): ?>
							<td>Pending</td>
						<?php endif; ?>
						

						<td><?php echo $u['gendeName']; ?></td>
						<td><?php echo $u['cityFromName']; ?> <?php echo $u['cityFromCountryName']; ?> </td>
						<td><?php echo $u['cityResidentName']; ?> <?php echo $u['cityResidentCountryName']; ?></td>
						<?php if ($u['volunteer'] == 0): ?>
					    	<td>No</td>
							<?php elseif ($u['volunteer'] == 1): ?>
							<td>Requested to join</td>
							<?php elseif ($u['volunteer'] == 2): ?>
							<td>Approved volunteer</td>
							<?php elseif ($u['volunteer'] == 3): ?>
							<td>Requested to leave</td>
						<?php endif; ?>

						<td><?php echo $u['password']; ?></td>

						<td><?php echo $u['email']; ?></td>
						<td><?php echo $u['datebirthday']; ?></td>
						<td><img src="<?php echo IMAGEURL.$u['photo']; ?>" width="150" height="150"></td>
						<td><?php echo $u['createdAt']; ?></td>
						<td><?php echo $u['updatedAt']; ?></td>
						<td>
                            <a href="<?php echo site_url('user/edit/'.$u['userId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('user/remove/'.$u['userId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
