<style>
.srch{
	margin:10px 0px;
}
.srch .col-md-3{
	margin:5px 0px;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Volunteers Listing</h3>
				<?php if($this->session->userdata('zilla_id')==0){?>
            	<div class="box-tools">
                    <a href="<?php echo site_url('volunteer/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
				<?php 
				}?>
            </div>
			<div class="col-md-12 srch">
				<form  method="POST" id="exportform" action="<?php echo site_url('volunteer/search');?>">
				<div class="col-md-3">
					<select name="zilla" class="form-control" id="zilla" onchange="return cityData(this,'khanda')">
						<option value="">Select Zilla</option>
						<?php foreach($zilla as $c){?>
							<option value="<?php echo $c['zilla_id'];?>" <?php if($zilla_id == $c['zilla_id']){ echo "selected";}?>><?php echo $c['zilla_name'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" class="has-datepicker form-control" name="start_date" value="<?php echo $start_date;?>" placeholder="Enter start date"/>
				</div>
				<div class="col-md-3">
					<input type="text" class="has-datepicker form-control" name="end_date" value="<?php echo $end_date;?>" placeholder="Enter end date"/>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="v_mobile" value="<?php echo $v_mobile;?>" placeholder="Enter volunteer mobile number"/>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="v_name" value="<?php echo $v_name;?>" placeholder="Enter volunteer name"/>
				</div>
				<div class="col-md-1">
					<button class="btn btn-success" type="submit" >Search</button>
				</div>
				
				</form>
			</div>
			
            <div class="box-body">
                <table class="table table-striped bootstrap-table">
				<thead>
                    <tr>
						<th class="hide" >Volunteer Id</th>
						<th  >Zilla </th>
						<th>Volunteer Name</th>
						<th>Mobile No</th>
						<th>Created On</th>

						<th>Actions</th>
                    </tr>
					</thead>
                    <?php foreach($volunteers as $v){ ?>
                    <tr>
						<td class="hide" ><?php echo $v['volunteer_id']; ?></td>
						<td  ><?php if($v['zilla_name']!="" && $v['zilla_name']!=null){echo $v['zilla_name'];}else{ echo "N/A";} ?></td>
						<td><?php echo $v['volunteer_name']; ?></td>
						<td><?php echo $v['mobile_no']; ?></td>
						<td><?php echo date('d-m-Y',strtotime($v['created_on'])); ?></td>

						<td>
						<?php if($this->session->userdata('zilla_id')==0){?>
                            <a href="<?php echo site_url('volunteer/edit/'.$v['volunteer_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('volunteer/remove/'.$v['volunteer_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
    $('.bootstrap-table').DataTable({"aaSorting": []});
});
</script>