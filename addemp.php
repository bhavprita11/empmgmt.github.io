<?php include_once 'aheader.php';
$ename="";$city="";$email="";$phone="";
$exp="";$dob="";$adhar="";$userid="";
$gender="";$father="";$qual="";$active="";
$salary="";$dept="";$photo="images/noimage.jpg";
$empid=countrecords("emps")+1;
if(isset($_GET["empid"])){
    $empid=$_GET["empid"];
    $t=single("emps","empid='$empid'");
    $ename=$t["ename"];
    $email=$t["email"];
    $phone=$t["phone"];
    $city=$t["city"];
    $gender=$t["gender"];
    $qual=$t["qual"];
    $exp=$t["exp"];
    $father=$t["father"];
    $adhar=$t["adhar"];
    $dob=$t["dob"];
    $salary=$t["salary"];
    $photo=$t["photo"];
    $dept=$t["dept"];
    $u=single("users","id='$empid' and role='Staff'");
    if(!empty($u)){
        $userid=$u["userid"];
        $active=$u["active"]==1?"checked":"";
    }
}
?>
<script>
    $(function () {
        $("#photo").change(function () {
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#pic').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<div class="container-fluid p-2">
<div class="card shadow">
    <div class="card-body">
        <h5 class="p-2" style="border-bottom: 2px solid green;">Employee Registration</h5>
        <form method="post" enctype="multipart/form-data" action="saveemp.php">
            <?php if(isset($_GET["empid"])) { ?>
            <input type="hidden" name="action" value="update">
            <?php } ?>
            <div class="container-fluid p-2">                    
                <div class="form-row">
                    <label class="col-sm-2">Emp Id</label>
                    <div class="form-group col-sm-2">
                        <input type="text" name="empid" readonly value="<?= $empid ?>" class="form-control form-control-sm" >
                    </div>
                    <label class='col-sm-2'>Emp Name</label>
                    <div class="form-group col-sm-2">
                        
                        <input type="text" name="ename" required value="<?= $ename ?>" class="form-control form-control-sm" >
                    </div>
                    <label class="col-sm-2">Email Id</label>
                    <div class="form-group col-sm-2">
                        <input type="email" name="email" required value="<?= $email ?>" placeholder="Email ID" TextMode="Email" class="form-control form-control-sm" >
                    </div>
                    
                </div>        

                <div class="form-row">
                    <label class="col-sm-2">Select Gender</label>
                    <div class="form-group col-sm-2">
                        <select name="gender" required class="form-control form-control-sm">
                            <option value=""><-- Select Gender --></option>
                            <option <?= $gender=="Male" ? "selected":""?>>Male</option>
                            <option <?= $gender=="Female" ? "selected":""?>>Female</option>
                        </select>
                    </div>
                    <label class="col-sm-2">Father's Name</label>
                    <div class="form-group col-sm-2">
                        <input type="text" name="father" required value="<?= $father ?>"  class="form-control form-control-sm" >
                    </div>
                    <label class="col-sm-2">Date of Birth</label>
                    <div class="form-group col-sm-2">
                        <input type="date" name="dob" required value="<?= date('Y-m-d', strtotime($dob)) ?>"  class="form-control form-control-sm" >
                    </div>
                </div>
                <div class="form-row">
                    <label class='col-sm-2'>Qualification</label>
                    <div class="form-group col-sm-2">
                        <input type="text" name="qual" required value="<?= $qual ?>"  class="form-control form-control-sm" >
                    </div>
                    <label class="col-sm-2">Experience</label>
                    <div class="form-group col-sm-2">
                        <input type="text" name="exp" required value="<?= $exp ?>"  class="form-control form-control-sm" >
                    </div>
                    <label class="col-sm-2">Adhar No</label>
                    <div class="form-group col-sm-2">
                        <input type="text" name="adhar" required pattern="[0-9]{12,12}" value="<?= $adhar ?>" maxlength="12" class="form-control form-control-sm" >
                    </div>
                </div>
                <div class="form-row">
                    <label class="col-sm-2">City</label>
                    <div class="form-group col-sm-2">
                        <input type="text" name="city" required value="<?= $city ?>" class="form-control form-control-sm" >
                    </div> 
                    <label class="col-sm-2">Contact Number</label>
                    <div class="form-group col-sm-2">
                        <input type="text" name="phone" required pattern="[7-9][0-9]{9,9}" value="<?= $phone ?>" maxLength="10" placeholder="Contact Number" class="form-control form-control-sm" >
                    </div>
                    <label class="col-sm-2">Salary</label>
                    <div class="form-group col-sm-2">
                        <input type="number" name="salary" required value="<?= $salary ?>" class="form-control form-control-sm" >
                    </div>                          
                </div> 
                <div class="form-row">
                    <label class="col-sm-2">Department</label>
                    <div class="form-group col-sm-2">
                        <select name="dept" required class="form-control form-control-sm">
                            <option value="">Select Department</option>
                            <?php foreach(allrecords("departments") as $d) { ?>
                                <option <?= $d["dcode"]==$dept ? "selected":"" ?> value="<?= $d["dcode"] ?>"><?= $d["dname"]?></option>    
                            <?php } ?>
                        </select>
                    </div>
                    <label class="col-sm-2">Select Photo</label>
                    <div class="form-group col-sm-2">
                        <input type="file" required id="photo" accept=".jpg,.png,.jpeg" name="photo" class="form-control-file">
                    </div> 
                    <div class="col-sm-4">
                    <img src="<?= $photo ?>" id="pic" width="100px" class="float-right img-thumbnail">
                    </div>
                </div>               
            </div>
            <input type="submit" class="btn btn-success btn-sm" value="Save Employee"/>
            <a onclick="return confirm('Are you sure to delete this record ?')" href="deleteemp.php?empid=<?= $empid ?>" class="btn btn-outline-danger btn-sm">Delete</a>
        </form>
    </div>
</div>
    <div class="card shadow">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom: 2px solid green;">Login Information</h5>
            <form method="post" action="saveuser.php">
                <input type="hidden" name="role" value="Staff">
                <input type="hidden" name="empid" value="<?= $empid ?>">
                <input type="hidden" name="ename" value="<?= $ename ?>">
                <div class="form-row">
                    <label class='col-sm-2'>User Id</label>
                    <div class="form-group col-sm-2">
                        <input type="text" name="userid" value="<?= $userid ?>" class="form-control form-control-sm" >
                    </div>
                    <label class="col-sm-2">Password</label>
                    <div class="form-group col-sm-2">
                        <input type="password" name="pwd"  class="form-control form-control-sm" >
                    </div>
                    <label class="col-sm-2">Repeat Password</label>
                    <div class="form-group col-sm-2">
                        <input type="password" name="cpwd" maxlength="12" class="form-control form-control-sm" >
                    </div>
                    <label class="col-sm-2">Active</label>
                    <div class="form-group col-sm-2">
                        <input type="checkbox" name="active" value="1" <?= $active ?> class="form-check-input" >
                    </div>                    
                </div>
                <input type="submit" value="Update Information" class="btn btn-success float-right btn-sm">
            </form>
        </div>
    </div>
</div>
<?php include_once 'afooter.php'; ?>