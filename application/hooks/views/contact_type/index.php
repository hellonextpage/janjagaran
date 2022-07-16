<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Contact Type Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('contact_type/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped bootstrap-table">
				<thead>
                    <tr>
						<th class="hide" >Contact Type Id</th>
						<th>Contact Type Name</th>
						<th>Created On</th>
						<th>Actions</th>
                    </tr>
					</thead>
                    <?php foreach($contact_type as $c){ ?>
                    <tr>
						<td class="hide" ><?php echo $c['contact_type_id']; ?></td>
						<td><?php echo $c['contact_type_name']; ?></td>
						<td><?php echo date('d-m-Y',strtotime($c['created_on'])); ?></td>
						<td>
                            <a href="<?php echo site_url('contact_type/edit/'.$c['contact_type_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('contact_type/remove/'.$c['contact_type_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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