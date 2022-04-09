<?php
include_once 'header.php';
$empid=$_SESSION["empid"];
$data = single("emps", "empid='$empid'");
?>
<div class="container-fluid p-2">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom:2px solid green;">Employee Profile</h5>
            <div class="row">
                <div class="col-sm-2">
                    <img src="<?= $data["photo"] ?>" class="img-thumbnail">
                    <br>
                    <h5 class="p-2 text-center"><?= $data["ename"] ?></h5>
                </div>
                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-left" style="width: 150px;">Empid Id</td>
                            <td>
<?= $empid ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Employee Name</td>
                            <td>
<?= $data["ename"] ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Department</td>
                            <td>
<?= $data["dept"] ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">City</td>
                            <td>
<?= $data["city"] ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Email Id</td>
                            <td>
<?= $data["email"] ?></td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 200px;">Date of Birth</td>
                            <td>
<?= $data["dob"] ?></td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 200px;">Aadhar No</td>
                            <td>
<?= $data["adhar"] ?></td>
                        </tr>                
                        <tr>
                            <td class="text-left" style="width: 200px;">Contact Number</td>
                            <td>
<?= $data["phone"] ?></td>
                        </tr>                          
                        <tr>
                            <td class="text-left">Father's Name</td>
                            <td>
<?= $data["father"] ?></td></tr>                
                        <tr>
                            <td class="text-left">User ID</td>
                            <td>
<?= $_SESSION["userid"] ?></td>                    
                        </tr>
                        <tr>
                            <td class="text-left">Salary</td>
                            <td>&#8377; <?= $data["salary"] ?>/- per month</td>                    
                        </tr> 
                    </table> 
                </div>
            </div>

        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>