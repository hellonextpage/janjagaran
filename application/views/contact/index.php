<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Contacts Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('contact/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped bootstrap-table">
				<thead>
                    <tr>
						<th class="hide" >Contact Id</th>
						<th class="hide" >Occupation Id</th>
						<th class="hide" >Contact Type Id</th>
						<th class="hide" >Locality Id</th>
						<th>Added By</th>
						<th>Contact Name</th>
						<th>Mobile No</th>
						<th>Locality Type</th>
						<th>Address</th>
						<th>Latitude</th>
						<th>Longitude</th>
						<th>Comment</th>
						<th>Updated On</th>
						<th>Created On</th>
						<th>Actions</th>
                    </tr>
					</thead>
                    <?php foreach($contacts as $c){ ?>
                    <tr>
						<td class="hide" ><?php echo $c['contact_id']; ?></td>
						<td class="hide" ><?php echo $c['occupation_id']; ?></td>
						<td class="hide" ><?php echo $c['contact_type_id']; ?></td>
						<td class="hide" ><?php echo $c['locality_id']; ?></td>
						<td><?php echo $c['added_by']; ?></td>
						<td><?php echo $c['contact_name']; ?></td>
						<td><?php echo $c['mobile_no']; ?></td>
						<td><?php echo $c['locality_type']; ?></td>
						<td><?php echo $c['address']; ?></td>
						<td><?php echo $c['latitude']; ?></td>
						<td><?php echo $c['longitude']; ?></td>
						<td><?php echo $c['comment']; ?></td>
						<td><?php echo $c['updated_on']; ?></td>
						<td><?php echo $c['created_on']; ?></td>
						<td>
                            <a href="<?php echo site_url('contact/edit/'.$c['contact_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('contact/remove/'.$c['contact_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
				$.noConflict();
    $('.bootstrap-table').DataTable();
});
</script>