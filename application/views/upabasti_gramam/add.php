<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Upabasti Gramam Add</h3>
            </div>
            <?php echo form_open('upabasti_gramam/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="basti_upamandal_id" class="control-label">Basti Upamandal</label>
						<div class="form-group">
							<select name="basti_upamandal_id" class="form-control">
								<option value="">select basti_upamandal</option>
								<?php 
								foreach($all_basti_upamandal as $basti_upamandal)
								{
									$selected = ($basti_upamandal['basti_upamandal_id'] == $this->input->post('basti_upamandal_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$basti_upamandal['basti_upamandal_id'].'" '.$selected.'>'.$basti_upamandal['basti_upamandal_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="upabasti_gramam_name" class="control-label"><span class="text-danger">*</span>Upabasti Gramam Name</label>
						<div class="form-group">
							<input type="text" name="upabasti_gramam_name" value="<?php echo $this->input->post('upabasti_gramam_name'); ?>" class="form-control" id="upabasti_gramam_name" />
							<span class="text-danger"><?php echo form_error('upabasti_gramam_name');?></span>
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