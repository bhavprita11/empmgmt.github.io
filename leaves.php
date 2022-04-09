<?php include_once 'aheader.php' ?>
<div class="container-fluid p-2">
    <div class="card shadow" style="min-height: 90vh">
        <div class="card-body">
        	<button id="approve" class="btn btn-success btn-sm float-right">Approve</button>
        	<button id="reject" class="btn btn-danger btn-sm float-right mr-2">Reject</button>
			<h5 class="p-2" style="border-bottom:2px solid green;">Leave Request Process</h5>
			<table class="table table-sm">
				<thead>
					<tr>
						<th><input type="checkbox" id="all" name="all" value="1"></th>
						<th>Request Date</th>
						<th>Employee ID</th>
						<th>Employee Name</th>
						<th>From Date</th>
						<th>To Date</th>
						<th>Reason</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql="select * from leaves WHERE approved=0 order by id desc";
								foreach(alldatasql($sql) as $row) {
                                    $empid=$row["empid"];
                                    $ename=single("emps","empid='$empid'")["ename"];
					?>
						<tr>
							<td><input type="checkbox" class="att" value="<?= $row["id"]?>"></td>
							<td><?= $row["reqdate"] ?></td>
							<td><?= $empid ?></td>
							<td><?= $ename ?></td>
							<td><?= $row["fromdate"] ?></td>
							<td><?= $row["todate"] ?></td>
							<td><?= $row["reason"] ?></td>
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
			url:'processleave.php',
			type:'post',
			data:{'ids':attend.join(","),'type':'approve'},
			success:function(response){
				location.href="leaves.php";
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
			url:'processleave.php',
			type:'post',
			data:{'ids':attend.join(","),'type':'reject'},
			success:function(response){
				location.href="leaves.php";
			}
		});
	});
});
</script>
<?php include_once 'afooter.php' ?>