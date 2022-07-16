<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Volunteer Add</h3>
            </div>
            <?php echo form_open('volunteer/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="zilla_id" class="control-label"><span class="text-danger">*</span>Zilla</label>
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
					<div class="col-md-6">
						<label for="volunteer_name" class="control-label"><span class="text-danger">*</span>Volunteer Name</label>
						<div class="form-group">
							<input type="text" name="volunteer_name" value="<?php echo $this->input->post('volunteer_name'); ?>" class="form-control" id="volunteer_name" />
							<span class="text-danger"><?php echo form_error('volunteer_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mobile_no" class="control-label"><span class="text-danger">*</span>Mobile No</label>
						<div class="form-group">
							<input type="text" name="mobile_no" value="<?php echo $this->input->post('mobile_no'); ?>" class="form-control" id="mobile_no" />
							<span class="text-danger"><?php echo form_error('mobile_no');?></span>
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