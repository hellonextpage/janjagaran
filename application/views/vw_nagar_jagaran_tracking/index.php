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
                <h3 class="box-title"> Jagaran Tracking</h3>
				<?php if($this->session->userdata('nagar_khanda_id')!=0){?>
            	<div class="box-tools">
                    <a href="<?php echo site_url('nagar_jagaran_tracking/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
				<?php } ?>
				
            </div>
			<div class="col-md-12 srch">
				<form  method="POST" id="exportform" action="">
				<div class="col-md-3">
				
					<select name="nagar" class="form-control" id="nagar">
						<option value="">Select Nagar/Khanda</option>
						
						<?php foreach($nagar_khanda as $c){?>
							<option value="<?php echo $c['nagar_khanda_id'];?>"><?php echo $c['nagar_khanda_name'];?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="col-md-3">
					<input type="date" class="form-control" name="jagaran_date"/>
				</div>				
		
				<div class="col-md-1">
					<button class="btn btn-success" type="button" onclick = 'this.form.submit();' >Search</button>
				</div>
				
				<div class="col-md-2">
					<input type="hidden" name="export" id="export" value="0"/> 
					<button style="display:none" class="btn btn-success"  type="button" onclick="return exportData();">Export To Excel</button>
				</div>
				</form>
			</div>
            <div class="box-body">
                <table class="table table-striped bootstrap-table ">
				<thead>
                    <tr>
						<th class="hide" >nagar_khanda_id</th>
						<th> Nagar/Khanda Name</th>						
						<th>Jagaran Date </th>						
						<th>Families Covered </th>
						<th>Teams Count </th>						
						<th>Actions</th>
                    </tr>
					</thead>
                    <?php foreach($vw_nagar_jagaran_trackings as $v){ ?>
                    <tr>
						<td class="hide" ><?php echo $v['nagar_khanda_id']; ?></td>
						<td><?php echo $v['nagar_khanda_name']; ?></td>						
						<td><?php echo $v['jagaran_date']; ?></td>						
						<td><?php echo $v['families_covered']; ?></td>
						<td><?php echo $v['teams_count']; ?></td>				
						
						<td>
                            <a href="<?php echo site_url('nagar_jagaran_tracking/edit/'.$v['nagar_khanda_id'].'/'.$v['jagaran_date']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('nagar_jagaran_tracking/remove/'.$v['nagar_khanda_id'].'/'.$v['jagaran_date']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
function exportData(){
	$("#export").val(1);
	$("#exportform").submit();
}
function cityData(e,data){
	$("#export").val(0);
		var id = $(e).val();
		var tablekey = data;
		var defaultselect = "<option value=''>Select here</option>";
		if(data == 'khanda'){
			$("#"+data).html(defaultselect);
			$("#gramam").html(defaultselect);
			$("#khanda").html(defaultselect);
		}else if(data == 'upamandal'){
			$("#"+data).html(defaultselect);
			$("#gramam").html(defaultselect);
			//$("#palle").html(defaultselect);
		}else if(data == 'gramam'){
			$("#gramam").html(defaultselect);
			//$("#palle").html(defaultselect);
		}else{
			//$("#palle").html(defaultselect);
		}
		if( id!="" && id!=null ){		
			$.ajax({
				method:'POST',
				url:'<?php echo site_url("web/getData")?>',
				data:{'id':id,'tablekey':tablekey},
				success:function(response){
					var data = jQuery.parseJSON(response);
					var selectdata = "<option value=''>Select "+tablekey+"</option>";
						$.each(data.data, function(key,value){
							selectdata += "<option value='"+value["id"]+"'>"+value["name"]+"</option>";
						});
					$("#"+tablekey).html(selectdata);
				}
				
			});
					
		}
	}
</script>