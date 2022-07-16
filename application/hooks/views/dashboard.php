<style>
.tile{
	    border: 1px solid #c9c9c9;
    border-radius: 5px;
    background: #fff;
    padding: 10px 15px;
}
</style>
<div class="row">

<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
					Zilla Data
					</h3>
				</div>
			</div>
			<table class="table table-stripped bootstrap-table">
			<thead>
				<tr>
				<th>Zilla Name</th>
				<th>Data</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach($zilladata as $n){
						if($n['total']>0){?>
						<tr>
							<td><?php echo $n['zilla_name'];?></td>
							<td><?php echo $n['total'];?></td>
						</tr>
					<?php }} ?>
				</tbody>
			</table>
		</div>
		
		
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
					Volunteer Data
					</h3>
				</div>
			</div>
			<table class="table table-stripped bootstrap-table">
			<thead>
				<tr>
				<th>Zilla Name</th>
				<th>Data</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach($volunteerdata as $n){
						if($n['total']>0){?>
						<tr>
							<td><?php echo $n['zilla_name'];?></td>
							<td><?php echo $n['total'];?></td>
						</tr>
					<?php }} ?>
				</tbody>
			</table>
		</div>
		
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						Jana Jagaran Report
					</h3><br><br>
					<form action="<?php echo base_url()?>dashboard" method="POST">
					<?php if($this->session->userdata('nagar_khanda_id')==0 && $this->session->userdata('zilla_id')==0){?>

						<div class="col-md-3">
							<select id="zilla" name="zilla_id" class="form-control" >
								<option value="0">Select Zilla</option>
								<?php foreach($zilla as $z){?>
								<option value="<?php echo $z['zilla_id'];?>" <?php if($id == $z['zilla_id']){ echo "selected";}?>><?php echo $z['zilla_name'];?></option>
								<?php } ?>
							</select>
						</div>
						<?php } ?>
						<div class="col-md-4">
							<input type="date" class="form-control" name="jagaran_start_date"/>
						</div>
						<div class="col-md-4">
							<input type="date" class="form-control" name="jagaran_end_date"/>
						</div>
						<div class="col-md-1">
					<button class="btn btn-success" type="button" onclick = 'this.form.submit();' >Search</button>
				</div>
					</form>
				</div>
			</div>
			<table class="table table-stripped bootstrap-table">
			<thead>
				<tr>
				<th>Nagar/Khanda Name</th>
				<th>Families Covered</th>
				<th>Teams Count</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach($tracking as $v){
						?>
						<tr>
							<td><?php echo $v['nagar_khanda_name']; ?></td>						
						<td><?php echo $v['families_covered']; ?></td>
						<td><?php echo $v['teams_count']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
<?php if($this->session->userdata('zilla_id')==0){?>
	<div class="col-md-8">
	<div class="box">
				<div class="box-header">
					<h3 class="box-title">
					Search
					</h3>
					<select id="zilla" class="form-control" onchange="location = this.value;">
			<option value="0">Select Zilla</option>
			<?php foreach($zilla as $z){?>
			<option value="<?php echo site_url('dashboard/index/'.$z['zilla_id']);?>" <?php if($id == $z['zilla_id']){ echo "selected";}?>><?php echo $z['zilla_name'];?></option>
			<?php } ?>
		</select>
				</div>
			</div>
		
		</div>
<?php } ?>
    <div class="col-md-12" style="margin-top:20px;">
		
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
					Nagar Data
					</h3>
				</div>
			</div>
			<table class="table table-stripped bootstrap-table">
			<thead>
				<tr>
				<th>Nagar Name</th>
				<th>Data</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach($nagar as $n){
						if($n['total']>0){?>
						<tr>
							<td><?php echo $n['nagar_khanda_name'];?></td>
							<td><?php echo $n['total'];?></td>
						</tr>
					<?php }} ?>
				</tbody>
			</table>
		</div>
		
		<div class="col-md-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
					Occupation Data
					</h3>
				</div>
			</div>
			
					<?php foreach($occupation as $n){?>
						<div class="col-md-4 tile">
						<?php if($n['occupation_name']!="" && $n['occupation_name']!=null){echo $n['occupation_name'];}else{ echo "Deleted";}?> - <?php echo $n['total'];?>
						</div>
						
					<?php } ?>
				
		</div>
		
		
		<div class="col-md-6" style="margin-top:50px">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
					Contact Type Data
					</h3>
				</div>
			</div>
			
					<?php foreach($contact_type as $n){?>
						<div class="col-md-4 tile">
						<?php if($n['contact_type_name']!="" && $n['contact_type_name']!=null){echo $n['contact_type_name'];}else{ echo "Deleted";}?> - <?php echo $n['total'];?>
						</div>
						
					<?php } ?>
				
		</div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
				$.noConflict();
    $('.bootstrap-table').DataTable();
});
</script>