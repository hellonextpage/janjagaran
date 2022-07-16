<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Update Jagaran Details</h3>
            </div>
			<?php echo form_open('nagar_jagaran_tracking/edit/'.$nagar_jagaran_tracking['nagar_khanda_id'].'/'.$nagar_jagaran_tracking['jagaran_date']); ?>
			<div class="box-body">
				<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="jagaran_date" class="control-label"><span class="text-danger">*</span>Jagaran Date</label>
						<div class="form-group">
							<input type="date" name="jagaran_date" required
							value="<?php echo ($this->input->post('jagaran_date') ? $this->input->post('jagaran_date') : $nagar_jagaran_tracking['jagaran_date']); ?>" class="form-control" id="jagaran_date" />
							<span class="text-danger"><?php echo form_error('jagaran_date');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="families_covered" required class="control-label"><span class="text-danger">*</span>Families Covered</label>
						<div class="form-group">
							<input type="number" name="families_covered" value="<?php echo ($this->input->post('families_covered') ? $this->input->post('families_covered') : $nagar_jagaran_tracking['families_covered']); ?>" class="form-control" id="families_covered" />
							<span class="text-danger"><?php echo form_error('families_covered');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="teams_count" required class="control-label"><span class="text-danger">*</span>Teams Count</label>
						<div class="form-group">
							<input type="number" name="teams_count" value="<?php echo ($this->input->post('teams_count') ? $this->input->post('teams_count') : $nagar_jagaran_tracking['teams_count']); ?>" class="form-control" id="teams_count" />
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