<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Countries Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('country/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Country ID</th>
						<th>Country NAME</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($countries as $c){ ?>
                    <tr>
						<td><?php echo $c['countryID']; ?></td>
						<td><?php echo $c['countryNAME']; ?></td>
						<td>
                            <a href="<?php echo site_url('country/edit/'.$c['countryID']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('country/remove/'.$c['countryID']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
