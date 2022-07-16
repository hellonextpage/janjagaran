<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Occupation Edit</h3>
            </div>
			<?php echo form_open('occupation/edit/'.$occupation['occupation_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="occupation_name" class="control-label"><span class="text-danger">*</span>Occupation Name</label>
						<div class="form-group">
							<input type="text" name="occupation_name" value="<?php echo ($this->input->post('occupation_name') ? $this->input->post('occupation_name') : $occupation['occupation_name']); ?>" class="form-control" id="occupation_name" />
							<span class="text-danger"><?php echo form_error('occupation_name');?></span>
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