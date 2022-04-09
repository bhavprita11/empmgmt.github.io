<?php 
include_once 'aheader.php';?>

<div class="container-fluid p-2">
    <div class="card shadow" style="min-height: 90vh">
        <div class="card-body">
        	<button id="approve" class="btn btn-success btn-sm float-right">Approve</button>
        	<button id="reject" class="btn btn-danger btn-sm float-right mr-2">Reject</button>
			<h5 class="p-2" style="border-bottom:2px solid green;">Attendance Approval</h5>
			<table class="table table-sm">
				<thead>
					<tr>
						<th><input type="checkbox" id="all" name="all" value="1"></th>
						<th>Date</th>
						<th>Employee Id</th>
						<th>Employee Name</th>
						<th>Progress</th>
						<th>Log Time</th>						
					</tr>
				</thead>
				<tbody>
					<?php
					foreach(findall("attendance","approved=0 order by id desc") as $row) {
						$empid=$row["empid"];
						$ename=single("emps","empid='$empid'")["ename"];
					?>
						<tr>
							<td><input type="checkbox" class="att" value="<?= $row["id"] ?>"></td>
							<td><?= $row["adate"] ?></td>
							<td><?= $empid ?></td>
							<td><?= $ename ?></td>
							<td><?= $row["progress"] ?></td>
							<td><?= $row["logtime"] ?></td>
						</tr>						
					<?php } ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
<script>
$(function(){
	$("#all").change(function(){
		let state=$("#all").is(":checked");
		if(state){
			$(".att").prop("checked",true);
		}
		else{
			$(".att").prop("checked",false);
		}		
	});
	
	$("#approve").click(function(){
		let attend=[];
		$(".att:checked").each(function(){
			console.log($(this).val());
			attend.push($(this).val())
		})
		console.log(attend);
		console.log(attend.join(","));
		$.ajax({
			url:'approvereject.php',
			type:'post',
			data:{'ids':attend.join(","),'type':'approve'},
			success:function(response){
				location.href="attendance.php";
			}
		});
	});
	
	$("#reject").click(function(){
		let attend=[];
		$(".att:checked").each(function(){
			console.log($(this).val());
			attend.push($(this).val())
		})
		console.log(attend);
		console.log(attend.join(","));
		$.ajax({
			url:'approvereject.php',
			type:'post',
			data:{'ids':attend.join(","),'type':'reject'},
			success:function(response){
				location.href="attendance.php";
			}
		});
	});
});
</script>
<?php include_once 'afooter.php' ?>