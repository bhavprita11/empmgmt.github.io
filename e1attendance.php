<?php 
include_once 'aheader.php'; 
$month=date('m');
$year=date('Y');
$search=false;
$empid="";
if(isset($_GET["month"])){
    $data= explode("-",$_GET["month"]);    
    $month=$data[1];
    $year=$data[0];
    $search=true;
    $empid=$_GET["empid"];
}
?>
<div class="container-fluid p-2">
    <div class="card shadow" style="min-height: 90vh">
        <div class="card-body">
        	<form class="form-inline float-right">
        		<label class="mr-1">Select Employee</label>
        		<select name="empid" class="form-control form-control-sm mr-2">
        		<option value=""> -- Select Employee -- </option>
					<?php foreach(allrecords("emps") as $e) { ?>
					<option value="<?= $e["empid"] ?>"><?= $e["ename"] ?></option>
					<?php } ?>
				</select>
        		<label class="mr-1">Select Month</label>
        		<input type="month" id="month" name="month" value="<?=$year ?>-<?= $month ?>" class="form-control form-control-sm mr-1">
        		<button class="btn btn-success btn-sm mr-1">Filter</button>
        	</form>
        	<?php
        		if($search) {
        	?>
        	<h4 class="p-2" style="border-bottom:2px solid green;">Attendance</h4>
        	<div class="form-row">      		
      		<div class="col-sm-7" id="details">
      			<table class="table table-sm">
      				<thead>
      					<tr>
      						<th>Date</th>
      						<th>Task Details</th>
      						<th>Hours</th>
      						<th>Status</th>
      					</tr>
      				</thead>
      				<tbody>
      				<?php      				
      				$sql="select * from attendance WHERE empid='$empid' and month(adate)='$month' and year(adate)=$year order by adate desc";					
					foreach(alldatasql($sql) as $row) { ?>
      					<tr>
      						<td><?= $row["adate"] ?></td>
      						<td><?= $row["progress"] ?></td>
      						<td><?= $row["logtime"] ?>Hr.</td>
      						<td><?php if($row["approved"]==0) { ?>
      						<span class="badge badge-primary">Unapproved</span>
      						<?php } else if($row["approved"]==1) { ?>   
      						<span class="badge badge-success">Approved</span>
      						<?php }  else { ?>
      						<span class="badge badge-danger">Rejected</span>
      						<?php } ?>
      						</td>
      					</tr>
      					<?php } ?>
      				</tbody>
      			</table>
      		</div> 
      		</div>
      		<?php } ?> 	
        </div>
    </div>
</div>
<script>
var dd=new Date();
document.getElementById("adate").valueAsDate=dd;
document.getElementById("adate").setAttribute("max",dd.toISOString().slice(0, -14));
dd.setDate(dd.getDate()-6);
document.getElementById("adate").setAttribute("min",dd.toISOString().slice(0, -14));
</script>
<?php include_once 'afooter.php'; ?>