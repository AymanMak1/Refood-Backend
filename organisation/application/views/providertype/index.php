<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Providertypes Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('providertype/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ProviderTypeId</th>
						<th>ProviderTypeName</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($providertypes as $p){ ?>
                    <tr>
						<td><?php echo $p['providerTypeId']; ?></td>
						<td><?php echo $p['providerTypeName']; ?></td>
						<td>
                            <a href="<?php echo site_url('providertype/edit/'.$p['providerTypeId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('providertype/remove/'.$p['providerTypeId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
