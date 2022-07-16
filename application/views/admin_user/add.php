<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Admin User Add</h3>
            </div>
            <?php echo form_open('admin_user/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6 hide">
						<div class="form-group">
							<input type="checkbox" name="role" value="1"  id="role" checked />
							<label for="role" class="control-label">Role</label>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<input type="checkbox" name="is_active" value="1"  id="is_active" />
							<label for="is_active" class="control-label">Is Active</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="zilla_id" class="control-label">Zilla</label>
						
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
						</div>
					</div>
					<div class="col-md-6">
						<label for="person_name" class="control-label"><span class="text-danger">*</span>Person Name</label>
						<div class="form-group">
							<input type="text" name="person_name" value="<?php echo $this->input->post('person_name'); ?>" class="form-control" id="person_name" />
							<span class="text-danger"><?php echo form_error('person_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mobile_no" class="control-label">Mobile No</label>
						<div class="form-group">
							<input type="text" name="mobile_no" value="<?php echo $this->input->post('mobile_no'); ?>" class="form-control" id="mobile_no" />
							<span class="text-danger"><?php echo form_error('mobile_no');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="email_id" class="control-label">Email Id</label>
						<div class="form-group">
							<input type="text" name="email_id" value="<?php echo $this->input->post('email_id'); ?>" class="form-control" id="email_id" />
							<span class="text-danger"><?php echo form_error('email_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="login_username" class="control-label"><span class="text-danger">*</span>Login Username</label>
						<div class="form-group">
							<input type="text" name="login_username" value="<?php echo $this->input->post('login_username'); ?>" class="form-control" id="login_username" />
							<span class="text-danger"><?php echo form_error('login_username');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="login_password" class="control-label"><span class="text-danger">*</span>Login Password</label>
						<div class="form-group">
							<input type="text" name="login_password" value="<?php echo $this->input->post('login_password'); ?>" class="form-control" id="login_password" />
							<span class="text-danger"><?php echo form_error('login_password');?></span>
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