<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Genders Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('gender/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>GenderId</th>
						<th>GendeName</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($genders as $g){ ?>
                    <tr>
						<td><?php echo $g['genderId']; ?></td>
						<td><?php echo $g['gendeName']; ?></td>
						<td>
                            <a href="<?php echo site_url('gender/edit/'.$g['genderId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('gender/remove/'.$g['genderId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
