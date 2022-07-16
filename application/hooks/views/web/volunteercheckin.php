<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Volunteer Check-in( కార్యకర్త వివరాలు  )</h3>
            </div>
            <?php echo form_open('web/add_volunteer'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-12">
						<label for="zilla_id" class="control-label"><span class="text-danger">*</span>Zilla( జిల్లా )</label>
						<div class="form-group">
							<select name="zilla_id" class="form-control">
								<option value="">select zilla</option>
								<?php 
								foreach($all_zilla as $zilla)
								{
									$selected = ($zilla['zilla_id'] == $this->input->post('zilla_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$zilla['zilla_id'].'" '.$selected.'>'.$zilla['zilla_name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('zilla_id');?></span>
						</div>
					</div>
					<div class="col-md-12">
						<label for="volunteer_name" class="control-label"><span class="text-danger">*</span>Volunteer Nam( కార్యకర్త పేరు  )</label>
						<div class="form-group">
							<input type="text" name="volunteer_name" value="<?php echo $this->input->post('volunteer_name'); ?>" class="form-control" id="volunteer_name" />
							<span class="text-danger"><?php echo form_error('volunteer_name');?></span>
						</div>
					</div>
					<div class="col-md-12">
						<label for="mobile_no" class="control-label"><span class="text-danger">*</span>Mobile No( మొబైల్ నెంబర్ )</label>
						<div class="form-group">
							<input type="text" name="mobile_no" value="<?php echo $this->input->post('mobile_no'); ?>" class="form-control" id="mobile_no" />
							<span class="text-danger"><?php echo form_error('mobile_no');?></span>
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="latitude" class="control-label">Latitude</label>
						<div class="form-group">
							<input type="text" name="latitude" value="17.918" class="form-control" id="latitude" />
							<span class="text-danger"><?php echo form_error('latitude');?></span>
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="longitude" class="control-label">Longitude</label>
						<div class="form-group">
							<input type="text" name="longitude" value="78.965" class="form-control" id="longitude" />
							<span class="text-danger"><?php echo form_error('longitude');?></span>
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="auth_key" class="control-label">Auth Key</label>
						<div class="form-group">
							<input type="text" name="auth_key" value="<?php echo $this->input->post('auth_key'); ?>" class="form-control" id="auth_key" />
						</div>
					</div>
					<div class="col-md-6 hide">
						<label for="device_id" class="control-label">Device Id</label>
						<div class="form-group">
							<input type="text" name="device_id" value="<?php echo $this->input->post('device_id'); ?>" class="form-control" id="device_id" />
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
							<div class="col-md-6 hide">
						<label for="created_on" class="control-label"></label>
						<div class="form-group">
							<input type="text" name="from" value="W" class="form-control" id="from" />
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
<style>
.hide{
	display:none;
}
</style>
<script>
	 if( "zilla_id" in localStorage && "added_by" in localStorage  )
			{
				window.location.href = "<?php echo site_url('web/contact'); ?>";
			}
			
</script>