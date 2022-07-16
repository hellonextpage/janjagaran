<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Basti Upamandal Add</h3>
            </div>
            <?php echo form_open('basti_upamandal/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nagar_khanda_id" class="control-label">Nagar Khanda</label>
						<div class="form-group">
							<select name="nagar_khanda_id" class="form-control">
								<option value="">select nagar_khanda</option>
								<?php 
								foreach($all_nagar_khanda as $nagar_khanda)
								{
									$selected = ($nagar_khanda['nagar_khanda_id'] == $this->input->post('nagar_khanda_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$nagar_khanda['nagar_khanda_id'].'" '.$selected.'>'.$nagar_khanda['nagar_khanda_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="basti_upamandal_name" class="control-label"><span class="text-danger">*</span>Basti Upamandal Name</label>
						<div class="form-group">
							<input type="text" name="basti_upamandal_name" value="<?php echo $this->input->post('basti_upamandal_name'); ?>" class="form-control" id="basti_upamandal_name" />
							<span class="text-danger"><?php echo form_error('basti_upamandal_name');?></span>
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