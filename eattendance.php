<?php include_once 'header.php'; 
$month=date('m');
$year=date('Y');
$empid=$_SESSION["empid"];  		
if(isset($_GET["month"])){
$data= explode("-",$_GET["month"]);    
$month=$data[1];
$year=$data[0];
}
$noofdays=countifrecords("attendance","empid='$empid' and month(adate)=$month and year(adate)=$year and approved=1");
$totaldays=countifrecords("attendance","empid='$empid' and month(adate)=$month and year(adate)=$year");
?>
<div class="container-fluid p-2">
    <div class="card shadow" style="min-height: 90vh">
        <div class="card-body">
        	<button class="btn btn-success btn-sm float-right" data-target="#attendance" data-toggle="modal"><i class="fa fa-plus"></i> Mark Attendance</button>        	
        	<form class="form-inline float-right">
        		<label class="mr-1">Select Month</label>
        		<input type="month" id="month" name="month" value="<?=$year ?>-<?= $month ?>" class="form-control form-control-sm mr-1">
        		<button class="btn btn-success btn-sm mr-1">Filter</button>
        	</form>
        	<h4 class="p-2" style="border-bottom:2px solid green;">Attendance</h4>
        	<div class="form-row">
      		<div class="col-sm-5">
      			<table class="table">
      				<thead>
      					<tr>
      						<th>Employee Name</th>
      						<th>Days</th>
      					</tr>
      				</thead>
      				<tbody>
      					<tr>
      						<th><?= $_SESSION["uname"] ?></th>
      						<th><?= $noofdays ?> out of <?= $totaldays ?> days</th>
      					</tr>
      				</tbody>
      			</table>
      		</div>
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
                      		
      				$sql="select * from attendance WHERE empid='$empid' and month(adate)=$month and year(adate)=$year order by adate desc";
                    foreach(alldatasql($sql) as $row) {
                        ?>
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
        </div>
    </div>
</div>
<div class="modal fade" id="attendance">
	<div class="modal-dialog">
		<form class="modal-content" method="post" action="markattendance.php">			
			<div class="modal-header">
				<h5>Mark Attendance</h5>
			</div>
			<div class="modal-body">
				<div class="form-group form-row">
					<label class="col-sm-4">Date</label>
					<div class="col-sm-8">
					<input type="date" id="adate" required name="adate" class="form-control form-control-sm">
					</div>
				</div>
				<div class="form-group form-row">
					<label class="col-sm-4">Progress Details</label>
					<div class="col-sm-8">
					<input type="text" name="progress" class="form-control form-control-sm">
				</div>
				</div>
				<div class="form-group form-row">
					<label class="col-sm-4">Log Time</label>
					<div class="col-sm-8">
					<input type="number" min="1" max="12" name="logtime" maxlength="5" class="form-control form-control-sm">
				</div>
				</div> 				
			</div>
			<div class="modal-footer">
				<input type="submit" value="Save Attendance" class="btn btn-primary btn-sm">
			</div>
		</form>
	</div>
</div>
<script>
var dd=new Date();
document.getElementById("adate").valueAsDate=dd;
document.getElementById("adate").setAttribute("max",dd.toISOString().slice(0, -14));
dd.setDate(dd.getDate()-6);
document.getElementById("adate").setAttribute("min",dd.toISOString().slice(0, -14));
</script>
<?php include_once 'footer.php'; ?>