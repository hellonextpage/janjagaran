<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Contact Type Add</h3>
            </div>
            <?php echo form_open('contact_type/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="contact_type_name" class="control-label"><span class="text-danger">*</span>Contact Type Name</label>
						<div class="form-group">
							<input type="text" name="contact_type_name" value="<?php echo $this->input->post('contact_type_name'); ?>" class="form-control" id="contact_type_name" />
							<span class="text-danger"><?php echo form_error('contact_type_name');?></span>
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