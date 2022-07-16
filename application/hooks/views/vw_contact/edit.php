<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"> Contact Edit</h3>
            </div>
			<?php echo form_open('vw_contact/edit/'.$vw_contact['contact_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
				<div class="col-md-6">
						<label for="nagar_khanda_id" class="control-label">Zilla </label>
						<div class="form-group">
						<select name="zilla" class="form-control" id="zilla" onchange="return cityData(this,'khanda')">
								<option value="">Select Here</option>
								<?php foreach($zilla as $o){?>
									<option value="<?php echo $o['zilla_id'];?>" <?php if($o['zilla_id']==$vw_contact['zilla_id']){ echo "selected";}?>><?php echo $o['zilla_name'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nagar_khanda_id" class="control-label">Nagar Khanda </label>
						<div class="form-group">
						<select name="nagar_khanda_id"  class="form-control" id="khanda" onchange="return cityData(this,'upamandal')">
								<option value="">Select Here</option>
								<?php foreach($nagar as $o){?>
									<option value="<?php echo $o['nagar_khanda_id'];?>" <?php if($o['nagar_khanda_id']==$vw_contact['nagar_khanda_id']){ echo "selected";}?>><?php echo $o['nagar_khanda_name'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="basti_upamandal_id" class="control-label">Basti Upamandal </label>
						<div class="form-group">
							<select name="basti_upamandal_id" id="upamandal" class="form-control" onchange="return cityData(this,'gramam')">
								<option value="">Select Here</option>
								<?php foreach($basthi as $o){?>
									<option value="<?php echo $o['basti_upamandal_id'];?>" <?php if($o['basti_upamandal_id']==$vw_contact['basti_upamandal_id']){ echo "selected";}?>><?php echo $o['basti_upamandal_name'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="upabasti_gramam_id" class="control-label">Upabasti Gramam </label>
						<div class="form-group">
							<select name="upabasti_gramam_id" id="gramam" class="form-control" onchange="return cityData(this,'palle')">
								<option value="">Select Here</option>
								<?php foreach($upabasthi as $o){?>
									<option value="<?php echo $o['upabasti_gramam_id'];?>" <?php if($o['upabasti_gramam_id']==$vw_contact['upabasti_gramam_id']){ echo "selected";}?>><?php echo $o['upabasti_gramam_name'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contact_name" class="control-label">Contact Name</label>
						<div class="form-group">
							<input type="text" name="contact_name" value="<?php echo ($this->input->post('contact_name') ? $this->input->post('contact_name') : $vw_contact['contact_name']); ?>" class="form-control" id="contact_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="occupation_id" class="control-label">Occupation </label>
						<div class="form-group">
							<select name="occupation_id" class="form-control">
								<option value="">Select Here</option>
								<?php foreach($occupation as $o){?>
									<option value="<?php echo $o['occupation_id'];?>" <?php if($o['occupation_id']==$vw_contact['occupation_id']){ echo "selected";}?>><?php echo $o['occupation_name'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contact_type_id" class="control-label">Contact Type </label>
						<div class="form-group">
							<select name="contact_type_id" class="form-control">
								<option value="">Select Here</option>
								<?php foreach($contact as $o){?>
									<option value="<?php echo $o['contact_type_id'];?>" <?php if($o['contact_type_id']==$vw_contact['contact_type_id']){ echo "selected";}?>><?php echo $o['contact_type_name'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mobile_no" class="control-label">Mobile No</label>
						<div class="form-group">
							<input type="text" name="mobile_no" value="<?php echo ($this->input->post('mobile_no') ? $this->input->post('mobile_no') : $vw_contact['mobile_no']); ?>" class="form-control" id="mobile_no" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label">Address</label>
						<div class="form-group">
							<input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $vw_contact['address']); ?>" class="form-control" id="address" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="comment" class="control-label">Comment</label>
						<div class="form-group">
							<input type="text" name="comment" value="<?php echo ($this->input->post('comment') ? $this->input->post('comment') : $vw_contact['comment']); ?>" class="form-control" id="comment" />
						</div>
					</div>
					
					
					
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>


<script>

function cityData(e,data){
		var id = $(e).val();
		var tablekey = data;
		var defaultselect = "<option value=''>Select here</option>";
		if(data == 'khanda'){
			$("#"+data).html(defaultselect);
			$("#gramam").html(defaultselect);
			$("#upamandal").html(defaultselect);
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