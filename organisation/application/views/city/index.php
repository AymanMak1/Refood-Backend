<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cities Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('city/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                    <th>Country Id</th>
						<th>Country name</th>
						<th>City Id</th>
                        <th>Cityname</th>

						<th>Actions</th>
                    </tr>
                    <?php foreach($cities as $c){ ?>
                    <tr>
                        <td><?php echo $c['countryId']; ?></td>
                        <td><?php echo $c['countryNAME']; ?></td>
						<td><?php echo $c['cityId']; ?></td>
						<td><?php echo $c['cityname']; ?></td>
						<td>
                            <a href="<?php echo site_url('city/edit/'.$c['cityId']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('city/remove/'.$c['cityId']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
