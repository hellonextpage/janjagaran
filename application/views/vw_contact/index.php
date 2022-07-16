<style>
.srch{
	margin:10px 0px;
}
.srch .col-md-3{
	margin:5px 0px;
}
</style>
<?php $nagar_khanda_id = $this->session->userdata('nagar_khanda_id');?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Contacts Listing</h3>
				<?php if($this->session->userdata('zilla_id')==0 && $nagar_khanda_id==0){?>
            	<div class="box-tools">
                    <a href="<?php echo site_url('vw_contact/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
				<?php } ?>
				
            </div>
			<div class="col-md-12 srch">
				<form  method="POST" id="exportform" action="<?php echo site_url('vw_contact/search');?>">
				<?php if($this->session->userdata('zilla_id')==0 && $nagar_khanda_id==0){?>
				<div class="col-md-3">
					<select name="zilla" class="form-control" id="zilla" onchange="return cityData(this,'khanda')">
						<option value="">Select Zilla</option>
						<?php foreach($zilla as $c){?>
							<option value="<?php echo $c['zilla_id'];?>" <?php if($zilla_id == $c['zilla_id']){ echo "selected";}?>><?php echo $c['zilla_name'];?></option>
						<?php } ?>
					</select>
				</div>
				<?php } ?>
				<div class="col-md-3">
					<select name="nagar" class="form-control" id="khanda" onchange="return cityData(this,'upamandal')">
						<option value="">Select Nagar</option>
						<?php foreach($nagar_data as $c){?>
							<option value="<?php echo $c['nagar_khanda_id'];?>" <?php if($nagar == $c['nagar_khanda_id']){ echo "selected";}?>><?php echo $c['nagar_khanda_name'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3">
					<select name="basthi" id="upamandal" class="form-control" onchange="return cityData(this,'gramam')">>
						<option value="">Select Basthi</option>
						<?php foreach($basti_data as $c){?>
							<option value="<?php echo $c['basti_upamandal_id'];?>" <?php if($basthi == $c['basti_upamandal_id']){ echo "selected";}?>><?php echo $c['basti_upamandal_name'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3">
					<select name="upabasti" id="gramam" class="form-control" onchange="return cityData(this,'palle')">
						<option value="">Select Upabasti</option>
						<?php foreach($upabasti_data as $c){?>
							<option value="<?php echo $c['upabasti_gramam_id'];?>" <?php if($upabasti == $c['upabasti_gramam_id']){ echo "selected";}?>><?php echo $c['upabasti_gramam_name'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="v_mobile" value="<?php echo $v_mobile;?>" placeholder="Enter volunteer mobile number"/>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="d_mobile" value="<?php echo $d_mobile;?>" placeholder="Enter data mobile number"/>
				</div>
				<div class="col-md-3">
					<select name="occupation" class="form-control">
						<option value="">Select Occupation</option>
						<?php foreach($occupation_data as $c){?>
							<option value="<?php echo $c['occupation_id'];?>" <?php if($occupation == $c['occupation_id']){ echo "selected";}?>><?php echo $c['occupation_name'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3">
					<select name="contact_type"  class="form-control">
						<option value="">Select Contact Type</option>
						<?php foreach($contact_data as $c){?>
							<option value="<?php echo $c['contact_type_id'];?>" <?php if($contact_type == $c['contact_type_id']){ echo "selected";}?>><?php echo $c['contact_type_name'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-1">
					<button class="btn btn-success" type="button" onclick = 'this.form.submit();' >Search</button>
				</div>
				
				<div class="col-md-2">
					<input type="hidden" name="export" id="export" value="0"/> 
					<button class="btn btn-success"  type="button" onclick="return exportData();">Export To Excel</button>
				</div>
				</form>
			</div>
            <div class="box-body">
                <table class="table table-striped bootstrap-table ">
				<thead>
                    <tr>
						<th class="hide" >Contact Id</th>
						<th> Name</th>
						<th class="hide" >Occupation Id</th>
						<th class="hide">Contact Type Id</th>
						<th>Mobile </th>
						<th class="hide" >Locality Id</th>
						<th>Contact Type </th>
						<th>Occupation </th>
						<th class="hide" >Volunteer </th>
						<th class="hide" >Volunteer Mobileno</th>
						<th class="hide" >Upabasti Gramam Id</th>
						<th>Upabasti </th>
						<th class="hide" >Basti Upamandal Id</th>
						<th>Basti </th>
						<th class="hide" >Nagar Khanda Id</th>
						<th>Nagar  </th>
						<th class="hide" >Zilla Id</th>
						<th>Zilla </th>
						<th>Created On </th>
						<th>Actions</th>
                    </tr>
					</thead>
                    <?php foreach($vw_contacts as $v){ ?>
                    <tr>
						<td class="hide" ><?php echo $v['contact_id']; ?></td>
						<td><?php echo $v['contact_name']; ?></td>
						<td class="hide" ><?php echo $v['occupation_id']; ?></td>
						<td class="hide" ><?php echo $v['contact_type_id']; ?></td>
						<td><?php echo $v['mobile_no']; ?></td>
						<td class="hide" ><?php echo $v['locality_id']; ?></td>
						<td><?php echo $v['contact_type_name']; ?></td>
						<td><?php echo $v['occupation_name']; ?></td>
						<td class="hide" ><?php echo $v['volunteer_name']; ?></td>
						<td class="hide" ><?php echo $v['volunteer_mobileno']; ?></td>
						<td class="hide" ><?php echo $v['upabasti_gramam_id']; ?></td>
						<td><?php echo $v['upabasti_gramam_name']; ?></td>
						<td class="hide" ><?php echo $v['basti_upamandal_id']; ?></td>
						<td><?php echo $v['basti_upamandal_name']; ?></td>
						<td class="hide" ><?php echo $v['nagar_khanda_id']; ?></td>
						<td><?php echo $v['nagar_khanda_name']; ?></td>
						<td class="hide" ><?php echo $v['zilla_id']; ?></td>
						<td><?php echo $v['zilla_name']; ?></td>
						<td><?php echo date('d-m-Y',strtotime($v['created_on'])); ?></td>
						<td>
						<?php if($this->session->userdata('zilla_id')==0){?>
                            <a href="<?php echo site_url('vw_contact/edit/'.$v['contact_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('vw_contact/remove/'.$v['contact_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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