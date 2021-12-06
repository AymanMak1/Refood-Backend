<?php $user = $this->session->userdata("auth"); ?>
<?php if ($user->approved == 4): ?>

    Your request to stop our partnership has been approved , if you want to join us again please press this button and we will review you request
                                <a href="<?php echo site_url('organisation/reqpart/'.$user->organisationId) ?>" > send volunteering request</a>
                                <?php endif; ?> 

<?php if ($user->approved == 2): ?>
    <div class="row">
<div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Rate volunteers </h3>
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
						<th>User</th>
						<th>Date</th>
						<th>PickUp time</th>
						<th>OrganisationReview</th>
                    </tr>
                    <?php foreach($delivrev as $d){ ?>
                    <tr>
						<td><?php echo $d['pickUpId']; ?></td>
						<td> <?php $xx=$this->db->get_where('user',array('UserId'=> $d['user']))->row_array();
						          echo $xx['name']; echo $xx['lastname'] ; ?></td>
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

<?php if ($user->approved == 1): ?>

    Your request to become one of our partners is now being reviewed , Thank you for your patience
     <?php endif; ?> 
     <?php if ($user->approved == 3): ?>

Your request to stop our partenrship is now being reviewed , Thank you for your patience
     <?php endif; ?> 