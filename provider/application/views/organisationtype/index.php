<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Organisation types Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('organisationtype/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Organisation Type Id</th>
						<th>Organisation Type Name</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($organisationtypes as $o){ ?>
                    <tr>
						<td><?php echo $o['organisationTypeId']; ?></td>
						<td><?php echo $o['organisationTypeName']; ?></td>
						<td>
                            <a href="<?php echo site_url('organisationtype/edit/'.$o['organisationTypeId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('organisationtype/remove/'.$o['organisationTypeId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
