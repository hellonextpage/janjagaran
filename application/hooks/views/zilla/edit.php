<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Zilla Edit</h3>
            </div>
			<?php echo form_open('zilla/edit/'.$zilla['zilla_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="zilla_name" class="control-label"><span class="text-danger">*</span>Zilla Name</label>
						<div class="form-group">
							<input type="text" name="zilla_name" value="<?php echo ($this->input->post('zilla_name') ? $this->input->post('zilla_name') : $zilla['zilla_name']); ?>" class="form-control" id="zilla_name" />
							<span class="text-danger"><?php echo form_error('zilla_name');?></span>
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