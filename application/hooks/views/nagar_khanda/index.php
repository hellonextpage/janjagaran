<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nagar Khanda Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('nagar_khanda/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped bootstrap-table">
				<thead>
                    <tr>
						<th class="hide" >Nagar Khanda Id</th>
						<th >Zilla </th>
						<th>Nagar Khanda Name</th>
						<th>Created On</th>
						<th>Actions</th>
                    </tr>
					</thead>
                    <?php foreach($nagar_khanda as $n){ ?>
                    <tr>
						<td class="hide" ><?php echo $n['nagar_khanda_id']; ?></td>
						<td  ><?php if($n['zilla_name']!="" && $n['zilla_name']!=null){echo $n['zilla_name'];}else{ echo "N/A";} ?></td>
						<td><?php echo $n['nagar_khanda_name']; ?></td>
						<td><?php echo date('d-m-Y',strtotime($n['created_on'])); ?></td>
						<td>
                            <a href="<?php echo site_url('nagar_khanda/edit/'.$n['nagar_khanda_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('nagar_khanda/remove/'.$n['nagar_khanda_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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