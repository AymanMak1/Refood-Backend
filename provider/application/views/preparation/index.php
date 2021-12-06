<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Preparations Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('preparation/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PreparationId</th>
						<th>User</th>
						<th>ExpireAt</th>
						<th>Portions</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($preparations as $p){ ?>
                    <tr>
						<td><?php echo $p['preparationId']; ?></td>
						<td><?php echo $p['name']; ?><?php echo $p['lastname']; ?></td>
						<td><?php echo $p['expireat']; ?></td>
						<td><?php echo $p['portions']; ?></td>
						<td>
                            <a href="<?php echo site_url('preparation/edit/'.$p['preparationId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('preparation/remove/'.$p['preparationId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
