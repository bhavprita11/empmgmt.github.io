<?php include_once 'aheader.php'; ?>
<script>
    $(function () {
        $("#fuphoto").change(function () {
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<div class="container-fluid p-2">
    <div class="card shadow">
        <div class="card-body">
            <h5 class="p-2" style="border-bottom: 2px solid green;">Employee Registration</h5>
            <form method="post" action="save_student.php" enctype="multipart/form-data">
                <div class="container-fluid p-2">                    
                    <div class="form-row">
                        <label class='col-sm-2'>Select Class</label>
                        <div class="form-group col-sm-2">
                            <select name="cid" required id="cid" class="form-control form-control-sm">
                                <option value="">-- Select Class --</option>
                                <?php foreach (allrecords("classes") as $c) { ?>
                                    <option value="<?= $c["id"] ?>"><?= $c["name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>            
                        <label class='col-sm-2'>Roll no</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="rollno" id="rollno" readonly placeholder="Roll no" class="form-control form-control-sm">                                                            
                        </div>
                        <label class='col-sm-2'>Student Name</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="fname" placeholder="First Name" class="form-control form-control-sm" >
                        </div>  
                    </div>
                    <div class="form-row">
                        <label class="col-sm-2">Select Gender</label>
                        <div class="form-group col-sm-2">
                            <select name="gender" required class="form-control form-control-sm">
                                <option value=""><-- Select Gender --></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>      
                        <label class="col-sm-2">Contact Number</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="phone" maxLength="10" placeholder="Contact Number" class="form-control form-control-sm" >
                        </div>
                        <label class="col-sm-2">Aadhar No</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="adhar" maxLength="12" placeholder="Aadhar No" TextMode="Email" class="form-control form-control-sm" >
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-sm-2">Select Category</label>
                        <div class="form-group col-sm-2">
                            <select name="category" required class="form-control form-control-sm">
                                <option value=""><-- Select Category --></option>                                
                                <option>General</option>
                                <option>OBC</option>
                                <option>SC/ST</option> 
                            </select>
                        </div>
                        <label class="col-sm-2">Religion</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="religion" placeholder="Religion" class="form-control form-control-sm" >
                        </div>
                        <label class="col-sm-2">Date of Birth</label>
                        <div class="form-group col-sm-2">
                            <input type="date" name="dob" class="form-control form-control-sm" >
                        </div>
                    </div>

                    <div class="form-row">
                        <label class="col-sm-2">Father's Name</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="father" placeholder="Father's Name" class="form-control form-control-sm" >
                        </div>
                        <label class="col-sm-2">Mother's Name</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="mother" placeholder="Mother's Name" class="form-control form-control-sm" >
                        </div>
                        <label class="col-sm-2">Father's Mobile</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="fmobile" maxlength="10" placeholder="Father's Mobile" class="form-control form-control-sm" >
                        </div>
                        <label class="col-sm-2">City</label>
                        <div class="form-group col-sm-2">
                            <input type="text" name="city" placeholder="City" class="form-control form-control-sm" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            <img id="blah" src="images/NoImage.jpg" style="max-width: 80px; margin-left: 20px;" />
                        </div>
                        <div class="form-group col-sm-2">
                            <label>Photo</label>
                            <input type="file" id="fuphoto" name="fuphoto" class="form-control-file form-control-sm" accept=".jpg" />
                        </div>                        
                    </div>

                </div>
                <input type="submit" class="btn btn-success btn-sm float-right" value="Save Student"/>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#cid").change(function () {
            let cid = $(this).val();
            if (cid != "") {
                $.get("genRollno.php", {"cid": cid}, function (output) {
                    $("#rollno").val(output);
                });
            } else {
                $("#rollno").val("");
            }
        });
    });
</script>
<?php include_once 'afooter.php'; ?>