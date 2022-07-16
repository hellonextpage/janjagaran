<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Palle Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('palle/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped bootstrap-table">
                    <thead>
					<tr>
						<th class="hide" >Palle Id</th>
						<th class="hide" >Upabasti Gramam Id</th>
						<th>Palle Name</th>
						<th>Updated On</th>
						<th>Created On</th>
						<th>Actions</th>
                    </tr>
					</thead>
                    <?php foreach($palle as $p){ ?>
                    <tr>
						<td class="hide" ><?php echo $p['palle_id']; ?></td>
						<td class="hide" ><?php echo $p['upabasti_gramam_id']; ?></td>
						<td><?php echo $p['palle_name']; ?></td>
						<td><?php echo $p['updated_on']; ?></td>
						<td><?php echo $p['created_on']; ?></td>
						<td>
                            <a href="<?php echo site_url('palle/edit/'.$p['palle_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('palle/remove/'.$p['palle_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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