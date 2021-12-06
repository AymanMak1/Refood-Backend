<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Organisations Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('organisation/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Organisation Id</th>	
                        <th>Organisation  Logo</th>
                        <th>OrganisationName</th>
                        <th>Organisation Description</th>
						<th>Approved</th>
						<th>Organisation Type</th>
						<th>Organisation Joindate</th>
						<th>Organisation Email</th>
						<th>Organisation Number</th>

						<th>Actions</th>
                    </tr>
                    <?php foreach($organisations as $o){ ?>
                    <tr>
						<td><?php echo $o['organisationId']; ?></td>
						<td><?php echo $o['organisationLogo']; ?></td>
                        <td><?php echo $o['organisationName']; ?></td>
                        <td><?php echo $o['organisationDescription']; ?></td>
                        <td><?php echo $o['approved']; ?></td>
						<td><?php echo $o['organisationTypeName']; ?></td>
						<td><?php echo $o['organisationJoindate']; ?></td>
						<td><?php echo $o['organisationEmail']; ?></td>
						<td><?php echo $o['organisationNumber']; ?></td>
						<td>
                            <a href="<?php echo site_url('organisation/edit/'.$o['organisationId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('organisation/remove/'.$o['organisationId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
