<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin Users Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('admin_user/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped bootstrap-table">
				<thead>
                    <tr>
						<th class="hide" >Admin Id</th>
						
						<th>Person Name</th>
						<th  >Zilla Name</th>

						<th>Mobile No</th>
						<th>Email Id</th>
						<th>Login Username</th>
						<th>Login Password</th>
						<th>Created On</th>
						<th>Is Active</th>
						<th>Actions</th>
                    </tr>
					</thead>
                    <?php foreach($admin_users as $a){ ?>
                    <tr>
						<td class="hide" ><?php echo $a['admin_id']; ?></td>
						
						
						<td><?php echo $a['person_name']; ?></td>
						<td  ><?php if($a['zilla_id']!=0){ echo $a['zilla_name'];}else{ echo "N/A";} ?></td>
						<td><?php echo $a['mobile_no']; ?></td>
						<td><?php echo $a['email_id']; ?></td>
						<td><?php echo $a['login_username']; ?></td>
						<td><?php echo $a['login_password']; ?></td>
												<td><?php echo date('d-m-Y',strtotime($a['created_on'])); ?></td>

						<td><?php if($a['is_active']=='1'){echo 'Active';}else{ echo "Inactive";} ?></td>
						<td>
                            <a href="<?php echo site_url('admin_user/edit/'.$a['admin_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
							<?php if($a['zilla_id'] != 0){ ?>
                            <a href="<?php echo site_url('admin_user/remove/'.$a['admin_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
							<?php } ?>
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