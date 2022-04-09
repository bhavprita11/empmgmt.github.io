<?php include_once 'header.php'; 
$month=date('m');
$year=date('Y');
if(isset($_GET["month"])){
$data= explode("-",$_GET["month"]);    
$month=$data[1];
$year=$data[0];
}
?>
<div class="container-fluid p-2">
    <div class="card shadow" style="min-height: 90vh">
        <div class="card-body">
        	<button class="btn btn-success btn-sm float-right" data-target="#leave" data-toggle="modal"><i class="fa fa-plus"></i> Make Request</button>
        	<form class="form-inline float-right">
        		<label class="mr-1">Select Month</label>
        		<input type="month" id="month" name="month" value="<?=$year ?>-<?= $month ?>" class="form-control form-control-sm mr-1">
        		<button class="btn btn-success btn-sm mr-1">Filter</button>
        	</form>
        	<h4 class="p-2" style="border-bottom:2px solid green;">Leave Request</h4>
        	<div class="form-row">      		
      		<div class="col-sm-7" id="details">
      			<table class="table table-sm">
      				<thead>
      					<tr>
      						<th>From Date</th>
      						<th>To Date</th>
      						<th>Reason</th>
      						<th>Status</th>
      					</tr>
      				</thead>
      				<tbody>
      				<?php      				
                      $empid=$_SESSION["empid"];
      				$sql="select * from leaves WHERE empid='$empid' and month(fromdate)='$month' and year(fromdate)='$year' order by fromdate desc";
					foreach(alldatasql($sql) as $row) { ?>
      					<tr>
      						<td><?= $row["fromdate"] ?></td>
      						<td><?= $row["todate"] ?></td>
      						<td><?= $row["reason"] ?></td>
      						<td><?php if($row["approved"]==0) { ?>
      						<span class="badge badge-primary">Pending</span>
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
<div class="modal fade" id="leave">
	<div class="modal-dialog">
		<form class="modal-content" method="post" action="saverequest.php">			
			<div class="modal-header">
				<h5>Leave Request</h5>
			</div>
			<div class="modal-body">
				<div class="form-group form-row">
					<label class="col-sm-4">Leave From</label>
					<div class="col-sm-8">
					<input type="date" id="fromdate" required name="fromdate" class="form-control form-control-sm">
					</div>
				</div>
				<div class="form-group form-row">
					<label class="col-sm-4">Leave To</label>
					<div class="col-sm-8">
					<input type="date" id="todate" required name="todate" class="form-control form-control-sm">
					</div>
				</div>
				<div class="form-group form-row">
					<label class="col-sm-4">Reason</label>
					<div class="col-sm-8">
					<input type="text" name="reason" class="form-control form-control-sm">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" value="Save leave" class="btn btn-primary btn-sm">
			</div>
		</form>
	</div>
</div>
<script>
var dd=new Date();
document.getElementById("fromdate").valueAsDate=dd;
document.getElementById("todate").valueAsDate=dd;
dd.setDate(dd.getDate()-6);
document.getElementById("fromdate").setAttribute("min",dd.toISOString().slice(0, -14];
document.getElementById("todate").setAttribute("min",dd.toISOString().slice(0, -14];
</script>
<?php include_once 'footer.php'; ?>