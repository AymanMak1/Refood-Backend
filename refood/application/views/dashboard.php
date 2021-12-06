<?php $user = $this->session->userdata("auth"); ?>

<?php if ($user->admin == 0): ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pending Admin Requests</h3>
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
                    <?php foreach($users as $u){ ?>
                     <tr>
						
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

						<td><?php echo $u['email']; ?></td>
						<td><?php echo $u['datebirthday']; ?></td>
						<td><img src="<?php echo IMAGEURL.$u['photo']; ?>" width="150" height="150"></td>

						<td>
                    
                            <a href="<?php echo site_url('user/approve/'.$u['userId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approve</a> 
                            <a href="<?php echo site_url('user/deny/'.$u['userId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deny</a>

                            
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
                <h3 class="box-title">Pending Volunteer Joining Requests</h3>
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
                    <?php foreach($volunteers as $v){ ?>
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
                    
                            <a href="<?php echo site_url('user/approvevol/'.$v['userId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approve</a> 
                            <a href="<?php echo site_url('user/denyvol/'.$v['userId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deny</a>

                            
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
                    <?php foreach($leavolunteers as $uu){ ?>
                     <tr>
					
						<td><?php echo $uu['name']; ?></td>
						<td><?php echo $uu['lastname']; ?></td>
						<?php if ($uu['admin'] == 0): ?>
					    	<td>Yes</td>
							<?php elseif ($uu['admin'] == 1): ?>
							<td>No</td>
                            <?php elseif ($uu['admin'] == 2): ?>
							<td>Pending</td>
						<?php endif; ?>
						

						<td><?php echo $uu['gendeName']; ?></td>
						<td><?php echo $uu['cityFromName']; ?> <?php echo $uu['cityFromCountryName']; ?> </td>
						<td><?php echo $uu['cityResidentName']; ?> <?php echo $uu['cityResidentCountryName']; ?></td>
						<?php if ($uu['volunteer'] == 0): ?>
					    	<td>No</td>
							<?php elseif ($uu['volunteer'] == 1): ?>
							<td>Requested to join</td>
							<?php elseif ($uu['volunteer'] == 2): ?>
							<td>Approved volunteer</td>
							<?php elseif ($uu['volunteer'] == 3): ?>
							<td>Requested to leave</td>
						<?php endif; ?>

						<td><?php echo $uu['email']; ?></td>
						<td><?php echo $uu['datebirthday']; ?></td>
						<td><img src="<?php echo IMAGEURL.$uu['photo']; ?>" width="150" height="150"></td>

						<td>

                            <a href="<?php echo site_url('user/denyvol/'.$uu['userId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approve</a> 
                            <a href="<?php echo site_url('user/approvevol/'.$uu['userId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deny</a>

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
                <h3 class="box-title"> Pending Organisation Partnerships</h3>
            	<div class="box-tools">
                  
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Organisation Id</th>	
                        <th>Organisation  Logo</th>
                        <th>OrganisationName</th>
                        <th>Organisation Description</th>
						<th>Organisation Type</th>
						<th>Organisation Joindate</th>
						<th>Organisation Email</th>
						<th>Organisation Number</th>

						<th>Actions</th>
                    </tr>
                    <?php foreach($reqjoinorg as $o){ ?>
                    <tr>
						<td><?php echo $o['organisationId']; ?></td>
						<td><img src="<?php echo IMAGEURL.$o['organisationLogo']; ?>" width="150" height="150"></td>
                        <td><?php echo $o['organisationName']; ?></td>
                        <td><?php echo $o['organisationDescription']; ?></td>
						<td><?php echo $o['organisationTypeName']; ?></td>
						<td><?php echo $o['organisationJoindate']; ?></td>
						<td><?php echo $o['organisationEmail']; ?></td>
						<td><?php echo $o['organisationNumber']; ?></td>
						<td>
                        <a href="<?php echo site_url('organisation/approvepart/'.$o['organisationId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approve</a> 
                            <a href="<?php echo site_url('organisation/denypart/'.$o['organisationId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deny</a>
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
                <h3 class="box-title"> Pending Organisation requests to end Partnership</h3>
            	<div class="box-tools">
                  
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Organisation Id</th>	
                        <th>Organisation  Logo</th>
                        <th>OrganisationName</th>
                        <th>Organisation Description</th>
						<th>Organisation Type</th>
						<th>Organisation Joindate</th>
						<th>Organisation Email</th>
						<th>Organisation Number</th>

						<th>Actions</th>
                    </tr>
                    <?php foreach($reqleavorg as $or){ ?>
                    <tr>
						<td><?php echo $or['organisationId']; ?></td>
						<td><img src="<?php echo IMAGEURL.$or['organisationLogo']; ?>" width="150" height="150"></td>
                        <td><?php echo $or['organisationName']; ?></td>
                        <td><?php echo $or['organisationDescription']; ?></td>
						<td><?php echo $or['organisationTypeName']; ?></td>
						<td><?php echo $or['organisationJoindate']; ?></td>
						<td><?php echo $or['organisationEmail']; ?></td>
						<td><?php echo $or['organisationNumber']; ?></td>
						<td>
                        <a href="<?php echo site_url('organisation/denypart/'.$or['organisationId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approve</a> 
                            <a href="<?php echo site_url('organisation/approvepart/'.$or['organisationId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deny</a>
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
                <h3 class="box-title">Pending Provider requests to start Partnership</h3>
            	<div class="box-tools">
                    
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
                    <?php foreach($reqjoinpro as $pj){ ?>
                    <tr>
						<td><?php echo $pj['providerId']; ?></td>
                        <td><?php echo $pj['providerName']; ?></td>
						<?php if ($pj['approved'] == 0): ?>
					    	<td>No</td>
							<?php elseif ($pj['approved'] == 1): ?>
							<td>Requested to join</td>
							<?php elseif ($pj['approved'] == 2): ?>
							<td>Approved </td>
							<?php elseif ($pj['approved'] == 3): ?>
							<td>Requested to leave</td>
						<?php endif; ?>
						<td><?php echo $pj['providerTypeName']; ?></td>
                        <td><?php echo $pj['providerPassword']; ?></td>
						<td><?php echo $pj['providerDescription']; ?></td>
                        <td><img src="<?php echo IMAGEURL.$pj['providerLogo'] ?>" width="150" height="150"></td>
						<td><?php echo $pj['providerJoinDate']; ?></td>
						<td><?php echo $pj['providerEmail']; ?></td>
						<td><?php echo $pj['providerPhone']; ?></td>
						<td>
                        <a href="<?php echo site_url('provider/denypart/'.$pj['providerId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approve</a> 
                            <a href="<?php echo site_url('provider/approvepart/'.$pj['providerId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deny</a>
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
                <h3 class="box-title">Pending Provider requests to end Partnership</h3>
            	<div class="box-tools">
                    
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
                    <?php foreach($reqleavpro as $pl){ ?>
                    <tr>
						<td><?php echo $pl['providerId']; ?></td>
                        <td><?php echo $pl['providerName']; ?></td>
						<?php if ($pl['approved'] == 0): ?>
					    	<td>No</td>
							<?php elseif ($pl['approved'] == 1): ?>
							<td>Requested to join</td>
							<?php elseif ($pl['approved'] == 2): ?>
							<td>Approved </td>
							<?php elseif ($pl['approved'] == 3): ?>
							<td>Requested to leave</td>
						<?php endif; ?>
						<td><?php echo $pl['providerTypeName']; ?></td>
                        <td><?php echo $pl['providerPassword']; ?></td>
						<td><?php echo $pl['providerDescription']; ?></td>
                        <td><img src="<?php echo IMAGEURL.$pl['providerLogo'] ?>" width="150" height="150"></td>
						<td><?php echo $pl['providerJoinDate']; ?></td>
						<td><?php echo $pl['providerEmail']; ?></td>
						<td><?php echo $pl['providerPhone']; ?></td>
						<td>
                        <a href="<?php echo site_url('provider/approvepart/'.$pl['providerId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Approve</a> 
                            <a href="<?php echo site_url('provider/denypart/'.$pl['providerId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Deny</a>
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


<?php endif; ?> 

<?php if ($user->volunteer == 2): ?>
	<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Not assigned Pickups</h3>
				<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PickUpId</th>
						<th>Provider</th>
						<th>Date</th>
						<th>PickUptime</th>
						<th>Portions</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($picks as $p){ ?>
                    <tr>
						<td><?php echo $p['pickUpId']; ?></td>
						<td> <?php $xx=$this->db->get_where('provider',array('providerId'=> $p['provider']))->row_array();
						          echo $xx['providerName'];   ?></td>
						<td><?php echo $p['date']; ?></td>
						<td><?php echo $p['pickUptime']; ?></td>
						<td><?php echo $p['portions']; ?></td>
						<td>
						<a href="<?php echo site_url('pickup/assign/'.$p['pickUpId']); ?>" class="btn btn-info btn-xs"> Assign to me</a>
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
	<div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Rate Pickups</h3>
				<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PickUpId</th>
						<th>Provider</th>
						<th>Date</th>
						<th>PickUptime</th>
						<th>Provider Review</th>
						
                    </tr>
                    <?php foreach($picksrevs as $p){ ?>
                    <tr>
						<td><?php echo $p['pickUpId']; ?></td>
						<td> <?php $xx=$this->db->get_where('provider',array('providerId'=> $p['provider']))->row_array();
						          echo $xx['providerName'];   ?></td>
						<td><?php echo $p['date']; ?></td>
						<td><?php echo $p['pickUptime']; ?></td>
						

						<td> <a href="<?php echo site_url('pickup/rateone/'.$p['pickUpId']); ?>" class="btn btn-info btn-xs"> 1</a>
						<a href="<?php echo site_url('delivery/ratetwo/'.$p['pickUpId']); ?>" class="btn btn-info btn-xs"> 2</a>
						<a href="<?php echo site_url('delivery/ratethree/'.$p['pickUpId']); ?>" class="btn btn-info btn-xs"> 3</a>
						<a href="<?php echo site_url('delivery/ratefour/'.$p['pickUpId']); ?>" class="btn btn-info btn-xs"> 4</a>
						<a href="<?php echo site_url('delivery/ratefive/'.$p['pickUpId']); ?>" class="btn btn-info btn-xs"> 5</a></td>
						
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
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Not assigned deliveries</h3>
				<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PickUp Id</th>
						<th>Organisation</th>
						<th>Date</th>
						<th>PickUp time</th>
						<th>Portions</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($deliveries as $d){ ?>
                    <tr>
						<td><?php echo $d['pickUpId']; ?></td>
						<td> <?php $xx=$this->db->get_where('organisation',array('organisationId'=> $d['organisation']))->row_array();
						          echo $xx['organisationName'];   ?></td>
						<td><?php echo $d['date']; ?></td>
						<td><?php echo $d['pickUptime']; ?></td>
						<td><?php echo $d['portions']; ?></td>
						<td>
						<a href="<?php echo site_url('delivery/assign/'.$d['pickUpId']); ?>" class="btn btn-info btn-xs"> Assign to me</a>
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
	
	<div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Rate organisations</h3>
				<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PickUp Id</th>
						<th>Organisation</th>
						<th>Date</th>
						<th>PickUp time</th>
						<th>OrganisationReview</th>
                    </tr>
                    <?php foreach($delivrev as $d){ ?>
                    <tr>
						<td><?php echo $d['pickUpId']; ?></td>
						<td> <?php $xx=$this->db->get_where('organisation',array('organisationId'=> $d['organisation']))->row_array();
						          echo $xx['organisationName'];   ?></td>
						<td><?php echo $d['date']; ?></td>
						<td><?php echo $d['pickUptime']; ?></td>

					
						<td> <a href="<?php echo site_url('delivery/rateone/'.$d['pickUpId']); ?>" class="btn btn-info btn-xs"> 1</a>
						<a href="<?php echo site_url('delivery/ratetwo/'.$d['pickUpId']); ?>" class="btn btn-info btn-xs"> 2</a>
						<a href="<?php echo site_url('delivery/ratethree/'.$d['pickUpId']); ?>" class="btn btn-info btn-xs"> 3</a>
						<a href="<?php echo site_url('delivery/ratefour/'.$d['pickUpId']); ?>" class="btn btn-info btn-xs"> 4</a>
						<a href="<?php echo site_url('delivery/ratefive/'.$d['pickUpId']); ?>" class="btn btn-info btn-xs"> 5</a></td>
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
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Not assigned Preparations </h3>
				<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
			
            <div class="box-body chart-responsive">
                <table class="table table-striped">
                    <tr>
						<th>PreparationId</th>
						<th>ExpireAt</th>
						<th>Portions</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($preps as $p){ ?>
                    <tr>
						<td><?php echo $p['preparationId']; ?></td>
						<td><?php echo $p['expireAt']; ?></td>
						<td><?php echo $p['portions']; ?></td>
						<td>
						<a href="<?php echo site_url('preparation/assign/'.$p['preparationId']); ?>" class="btn btn-info btn-xs"> Assign to me</a>
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
                    </div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Events to join</h3>
            	
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>EventId</th>
                        <th>Name</th>
						<th>Description</th>
						<th>Date</th>
						<th>Time</th>
						<th>Location</th>
						<th>OrganisationComiteeNumber</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($organisationcom as $e){ ?>
                    <tr>
						<td><?php echo $e['eventId']; ?></td>
                        <td><?php echo $e['eventName']; ?></td>
						<td><?php echo $e['description']; ?></td>
						<td><?php echo $e['date']; ?></td>
						<td><?php echo $e['time']; ?></td>
						<td><?php echo $e['location']; ?></td>
						<td><?php echo $e['organisationComiteeNumber']; ?></td>
						<td>
						<a href="<?php echo site_url('organizingcommittee/requestvol/'. $e['eventId']); ?>" class="btn btn-info btn-xs"> Request to join</a>
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
<?php endif; ?>