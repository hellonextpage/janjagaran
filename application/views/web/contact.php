<style>
.skin-blue{
	max-width:900px !important;
}
</style>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Add Data </h3>
            </div>
            <form method="POST" action="<?php echo base_url()?>web/add_contact" id="contact">
          	<div class="box-body">
          		<div class="row clearfix">
						<div class="col-md-12">
						
						<label id="message" name="message" class="control-label" style="color: green;font-weight: bold;">
						<?php echo $message; ?>
						</label>
						
						</div>
						
						<div class="col-md-6">
						<label for="khanda" class="control-label">Nagar/Khanda ( నగర్ / ఖండ )</label>
						<div class="form-group">
							<select name="khanda" class="form-control" id="khanda" onchange="return cityData(this,'upamandal')">
								<option value="">select Nagar/Khanda</option>
								<?php 
								foreach($nagar_khanda as $nagar)
								{
									$selected = ($nagar['nagar_khanda_id'] == $this->input->post('nagar_khanda_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$nagar['nagar_khanda_id'].'" '.$selected.'>'.$nagar['nagar_khanda_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger" id="khanda_error"><?php echo form_error('contact_name');?></span>
						</div>
					</div>
					
								<div class="col-md-6">
						<label for="upamandal" class="control-label">Bathi/Upamandal ( బస్తి / ఉపమండల్ )</label>
						<div class="form-group">
							<select name="upamandal" id="upamandal" class="form-control" onchange="return cityData(this,'gramam')">
								<option value="">select Bathi/Upamandal</option>
								
							</select>
							<span class="text-danger" id="upamandal_error"><?php echo form_error('contact_name');?></span>
						</div>
					</div>
								<div class="col-md-6">
						<label for="gramam" class="control-label">Upabasthi/Gramam ( ఉపబస్తీ / గ్రామం )</label>
						<div class="form-group">
							<select name="gramam" id="gramam" class="form-control" onchange="return cityData(this,'palle')">
								<option value="">select Upabasthi/Gramam</option>
								
							</select>
							<span class="text-danger" id="gramam_error"><?php echo form_error('contact_name');?></span>
						</div>
					</div>
					<!--
							<div class="col-md-6">
						<label for="locality_id" class="control-label">Palle ( పల్లె)</label>
						<div class="form-group">
							<select name="locality_id" id="palle" class="form-control">
								<option value="">select palle</option>
								
							</select>
							<span class="text-danger" id="palle_error"><?php echo form_error('contact_name');?></span>
						</div>
					</div> -->
					
						<div class="col-md-6">
						<label for="contact_name" class="control-label"><span class="text-danger">*</span> Name ( పేరు)</label>
						<div class="form-group">
							<input type="text" name="contact_name" value="<?php echo $this->input->post('contact_name'); ?>" class="form-control" id="contact_name" />
							<span class="text-danger" id="name_error"><?php echo form_error('contact_name');?></span>
						</div>
					</div>
					
								<div class="col-md-6">
						<label for="contact_type_id" class="control-label"><span class="text-danger">*</span>Contact Type ( కాంటాక్ట్ టైప్ )</label>
						<div class="form-group">
							<select name="contact_type_id" id="contact_type_id"  class="form-control">
								<option value="">select contact type</option>
								<?php 
								foreach($contact_type as $contact_type)
								{
									$selected = ($contact_type['contact_type_id'] == $this->input->post('contact_type_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$contact_type['contact_type_id'].'" '.$selected.'>'.$contact_type['contact_type_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger" id="contact_error"><?php echo form_error('contact_type_id');?></span>
						</div>
					</div>
					
					<div class="col-md-6">
						<label for="occupation_id" class="control-label">Occupation  ( వృత్తి)</label>
						<div class="form-group">
							<select name="occupation_id" class="form-control">
								<option value="">select occupation</option>
								<?php 
								foreach($occupations as $occupation)
								{
									$selected = ($occupation['occupation_id'] == $this->input->post('occupation_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$occupation['occupation_id'].'" '.$selected.'>'.$occupation['occupation_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
		
		
					<div class="col-md-6 hide">
						<label for="added_by" class="control-label"><span class="text-danger">*</span>Volunteer Name ( వాలంటీర్ పేరు)</label>
						<div class="form-group">
						<input type="text" name="added_by"  class="form-control" id="added_by" />
							<span class="text-danger"><?php echo form_error('added_by');?></span>
						</div>
					</div>
			
					<div class="col-md-6">
						<label for="mobile_no" class="control-label">Mobile No (  మొబైల్ నెంబర్ )</label>
						<div class="form-group">
							<input type="text" name="mobile_no" value="<?php echo $this->input->post('mobile_no'); ?>" class="form-control" id="mobile_no" />
							<span class="text-danger" id="mobile_error"><?php echo form_error('mobile_no');?></span>
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="locality_type" class="control-label">Locality Type</label>
						<div class="form-group">
							<input type="text" name="locality_type" value="<?php echo $this->input->post('locality_type'); ?>" class="form-control" id="locality_type" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label">Address ( అడ్రస్)</label>
						<div class="form-group">
							<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
							<span class="text-danger"><?php echo form_error('address');?></span>
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="latitude" class="control-label">Latitude</label>
						<div class="form-group">
							<input type="text" name="latitude" value="<?php echo $this->input->post('latitude'); ?>" class="form-control" id="latitude" />
							<span class="text-danger"><?php echo form_error('latitude');?></span>
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="longitude" class="control-label">Longitude</label>
						<div class="form-group">
							<input type="text" name="longitude" value="<?php echo $this->input->post('longitude'); ?>" class="form-control" id="longitude" />
							<span class="text-danger"><?php echo form_error('longitude');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="comment" class="control-label">Comment ( ఇతర వివరాలు)</label>
						<div class="form-group">
							<input type="text" name="comment" value="<?php echo $this->input->post('comment'); ?>" class="form-control" id="comment" />
							<span class="text-danger"><?php echo form_error('comment');?></span>
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="updated_on" class="control-label">Updated On</label>
						<div class="form-group">
							<input type="text" name="updated_on" value="<?php echo $this->input->post('updated_on'); ?>" class="has-datetimepicker form-control" id="updated_on" />
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="created_on" class="control-label">Created On</label>
						<div class="form-group">
							<input type="text" name="created_on" value="<?php echo $this->input->post('created_on'); ?>" class="has-datetimepicker form-control" id="created_on" />
						</div>
					</div>
				
				</div>
			</div>
          	<div class="box-footer">
            	<button type="button" onclick="return submitform()"  class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
								<span id="response_msg"></span>

          	</div>
</form>
      	</div>
    </div>
</div>
<style>
.hide{
	display:none;
}
</style>
<script>
	window.onload=function(){
		$("#added_by").val(localStorage.getItem("added_by"));
		var zilla_id = localStorage.getItem("zilla_id");
		 $.ajax({
                url: '<?php echo base_url()?>web/getnagar',
                type: 'post',
                data: {'zilla_id':zilla_id},
                success: function(data) {
					var responsedata = jQuery.parseJSON(data);
						localStorage.setItem("upamandal", JSON.stringify(responsedata.basthi));
						localStorage.setItem("gramam", JSON.stringify(responsedata.upabasthi));	
var selectdata = "<option value=''>Select Nagar/Khanda</option>";
						$.each(responsedata.data, function(key,value){
							selectdata += "<option value='"+value["nagar_khanda_id"]+"'>"+value["nagar_khanda_name"]+"</option>";
						});
						$("#khanda").html(selectdata);						
						
                }
        });
	}
	function submitform(){
		var contact_type_id = $("#contact_type_id").val();
		var mobile_no = $("#mobile_no").val();
		var error = 0;
var khanda = $("#khanda").val();
var upamandal = $("#upamandal").val();
var gramam = $("#gramam").val();
var palle = $("#palle").val();
var name = $("#contact_name").val();
if(khanda == ""){
	error = 1;
	$("#khanda_error").html("Please select khanda");
}else{
	$("#khanda_error").html("");
}

if(upamandal == ""){
	error = 1;
	$("#upamandal_error").html("Please select upamandal");
}else{
	$("#upamandal_error").html("");
}

if(name == "" || name.length<2){
	error = 1;
	$("#name_error").html("Please enter name and should be minimum 3 characters");
}else{
	$("#name_error").html("");
}

if(gramam == ""){
	error = 1;
	$("#gramam_error").html("Please select gramam");
}else{
	$("#gramam_error").html("");
}

if(palle == ""){
	error = 1;
	$("#palle_error").html("Please select palle");
}else{
	$("#palle_error").html("");
}


if(contact_type_id == ""){
	error = 1;
	$("#contact_error").html("Please select contact type");
}else{
	$("#contact_error").html("");
}

		if(contact_type_id!='5'){

			if(mobile_no=="" || mobile_no==null || mobile_no.length!=10){
				error = 1;
				$("#mobile_error").html("Please enter valid mobile number.");
			}else{
				$("#mobile_error").html("");
			}
		}else{
			$("#mobile_error").html("");
		}
		if(error == 0){
			
		 $.ajax({
                url: '<?php echo base_url()?>web/save_contact',
                method: 'post',
                data: $("#contact").serialize(),
                success: function(response) {
					if(response == true){
						$("#response_msg").html("<div class='alert alert-success' style=' color: #155724; background-color: #d4edda;border-color: #c3e6cb;'>Contact saved successfully</div>").show().fadeOut(3500);

					}else{
						$("#response_msg").html("Please fill all the fields").show().fadeout(3000);

					}
					
                }
        });
		}
	}
	function cityData(e,data){
		var id = $(e).val();
		var tablekey = data;
		var defaultselect = "<option value=''>Select here</option>";
		if(data == 'upamandal'){
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
			var srchdata = localStorage.getItem(data);
					srchdata = jQuery.parseJSON(srchdata);
					//var heroes = [{name: 'Batman', franchise: 'DC'},{name: 'Batman', franchise: 'Marvel'}];
					var srch_val =  srchdata.filter(function(keyvalue) {
						return keyvalue.parent_id == id;
					});
					var selectdata = "<option value=''>Select "+data+"</option>";
						$.each(srch_val, function(key,value){
							selectdata += "<option value='"+value["child_id"]+"'>"+value["child_name"]+"</option>";
						});
					$("#"+data).html(selectdata);
		}
	}
</script>