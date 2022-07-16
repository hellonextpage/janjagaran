<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Contact Edit</h3>
            </div>
			<?php echo form_open('contact/edit/'.$contact['contact_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="occupation_id" class="control-label">Occupation</label>
						<div class="form-group">
							<select name="occupation_id" class="form-control">
								<option value="">select occupation</option>
								<?php 
								foreach($all_occupations as $occupation)
								{
									$selected = ($occupation['occupation_id'] == $contact['occupation_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$occupation['occupation_id'].'" '.$selected.'>'.$occupation['occupation_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contact_type_id" class="control-label"><span class="text-danger">*</span>Contact Type</label>
						<div class="form-group">
							<select name="contact_type_id" class="form-control">
								<option value="">select contact_type</option>
								<?php 
								foreach($all_contact_type as $contact_type)
								{
									$selected = ($contact_type['contact_type_id'] == $contact['contact_type_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$contact_type['contact_type_id'].'" '.$selected.'>'.$contact_type['contact_type_id'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('contact_type_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="locality_id" class="control-label">Palle</label>
						<div class="form-group">
							<select name="locality_id" class="form-control">
								<option value="">select palle</option>
								<?php 
								foreach($all_palle as $palle)
								{
									$selected = ($palle['palle_id'] == $contact['locality_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$palle['palle_id'].'" '.$selected.'>'.$palle['palle_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="added_by" class="control-label"><span class="text-danger">*</span>Volunteer</label>
						<div class="form-group">
							<select name="added_by" class="form-control">
								<option value="">select volunteer</option>
								<?php 
								foreach($all_volunteers as $volunteer)
								{
									$selected = ($volunteer['volunteer_id'] == $contact['added_by']) ? ' selected="selected"' : "";

									echo '<option value="'.$volunteer['volunteer_id'].'" '.$selected.'>'.$volunteer['volunteer_id'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('added_by');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="contact_name" class="control-label"><span class="text-danger">*</span>Contact Name</label>
						<div class="form-group">
							<input type="text" name="contact_name" value="<?php echo ($this->input->post('contact_name') ? $this->input->post('contact_name') : $contact['contact_name']); ?>" class="form-control" id="contact_name" />
							<span class="text-danger"><?php echo form_error('contact_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mobile_no" class="control-label">Mobile No</label>
						<div class="form-group">
							<input type="text" name="mobile_no" value="<?php echo ($this->input->post('mobile_no') ? $this->input->post('mobile_no') : $contact['mobile_no']); ?>" class="form-control" id="mobile_no" />
							<span class="text-danger"><?php echo form_error('mobile_no');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="locality_type" class="control-label">Locality Type</label>
						<div class="form-group">
							<input type="text" name="locality_type" value="<?php echo ($this->input->post('locality_type') ? $this->input->post('locality_type') : $contact['locality_type']); ?>" class="form-control" id="locality_type" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="address" class="control-label">Address</label>
						<div class="form-group">
							<input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $contact['address']); ?>" class="form-control" id="address" />
							<span class="text-danger"><?php echo form_error('address');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="latitude" class="control-label">Latitude</label>
						<div class="form-group">
							<input type="text" name="latitude" value="<?php echo ($this->input->post('latitude') ? $this->input->post('latitude') : $contact['latitude']); ?>" class="form-control" id="latitude" />
							<span class="text-danger"><?php echo form_error('latitude');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="longitude" class="control-label">Longitude</label>
						<div class="form-group">
							<input type="text" name="longitude" value="<?php echo ($this->input->post('longitude') ? $this->input->post('longitude') : $contact['longitude']); ?>" class="form-control" id="longitude" />
							<span class="text-danger"><?php echo form_error('longitude');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="comment" class="control-label">Comment</label>
						<div class="form-group">
							<input type="text" name="comment" value="<?php echo ($this->input->post('comment') ? $this->input->post('comment') : $contact['comment']); ?>" class="form-control" id="comment" />
							<span class="text-danger"><?php echo form_error('comment');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated_on" class="control-label">Updated On</label>
						<div class="form-group">
							<input type="text" name="updated_on" value="<?php echo ($this->input->post('updated_on') ? $this->input->post('updated_on') : $contact['updated_on']); ?>" class="has-datetimepicker form-control" id="updated_on" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="created_on" class="control-label">Created On</label>
						<div class="form-group">
							<input type="text" name="created_on" value="<?php echo ($this->input->post('created_on') ? $this->input->post('created_on') : $contact['created_on']); ?>" class="has-datetimepicker form-control" id="created_on" />
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