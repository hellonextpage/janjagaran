<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Nagar Khanda Edit</h3>
            </div>
			<?php echo form_open('nagar_khanda/edit/'.$nagar_khanda['nagar_khanda_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="zilla_id" class="control-label">Zilla</label>
						<div class="form-group">
							<select name="zilla_id" class="form-control">
								<option value="">select zilla</option>
								<?php 
								foreach($all_zilla as $zilla)
								{
									$selected = ($zilla['zilla_id'] == $nagar_khanda['zilla_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$zilla['zilla_id'].'" '.$selected.'>'.$zilla['zilla_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nagar_khanda_name" class="control-label"><span class="text-danger">*</span>Nagar Khanda Name</label>
						<div class="form-group">
							<input type="text" name="nagar_khanda_name" value="<?php echo ($this->input->post('nagar_khanda_name') ? $this->input->post('nagar_khanda_name') : $nagar_khanda['nagar_khanda_name']); ?>" class="form-control" id="nagar_khanda_name" />
							<span class="text-danger"><?php echo form_error('nagar_khanda_name');?></span>
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