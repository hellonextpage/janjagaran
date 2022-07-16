<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Palle Edit</h3>
            </div>
			<?php echo form_open('palle/edit/'.$palle['palle_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="upabasti_gramam_id" class="control-label">Upabasti Gramam</label>
						<div class="form-group">
							<select name="upabasti_gramam_id" class="form-control">
								<option value="">select upabasti_gramam</option>
								<?php 
								foreach($all_upabasti_gramam as $upabasti_gramam)
								{
									$selected = ($upabasti_gramam['upabasti_gramam_id'] == $palle['upabasti_gramam_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$upabasti_gramam['upabasti_gramam_id'].'" '.$selected.'>'.$upabasti_gramam['upabasti_gramam_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="palle_name" class="control-label"><span class="text-danger">*</span>Palle Name</label>
						<div class="form-group">
							<input type="text" name="palle_name" value="<?php echo ($this->input->post('palle_name') ? $this->input->post('palle_name') : $palle['palle_name']); ?>" class="form-control" id="palle_name" />
							<span class="text-danger"><?php echo form_error('palle_name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="updated_on" class="control-label">Updated On</label>
						<div class="form-group">
							<input type="text" name="updated_on" value="<?php echo ($this->input->post('updated_on') ? $this->input->post('updated_on') : $palle['updated_on']); ?>" class="has-datetimepicker form-control" id="updated_on" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="created_on" class="control-label">Created On</label>
						<div class="form-group">
							<input type="text" name="created_on" value="<?php echo ($this->input->post('created_on') ? $this->input->post('created_on') : $palle['created_on']); ?>" class="has-datetimepicker form-control" id="created_on" />
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