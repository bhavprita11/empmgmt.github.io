<?php

include_once 'dbfun.php';
extract($_POST);
$link= connect();
$query="";

print_r($_POST);
$check=single("emps","email='$email'");
$check2=single("emps","empid='$empid'");
if(isset($check) && !isset($action)){
    $_SESSION["error"]="Email already in use";
    header("location: staffs.php");
}else if(isset($check2) && !isset($action)){
    $_SESSION["error"]="EmpID already in use";
    header("location: staffs.php");
}
else{
    $srcphoto=$_FILES["photo"]["tmp_name"];
    $photo="pics/$empid.jpg";
    move_uploaded_file($srcphoto, $photo);
    //update and email check
    if(isset($action)){
        echo "I am here";
        $query="update emps set ename='$ename',father='$father',city='$city',email='$email',"
            . "gender='$gender',qual='$qual',exp='$exp',adhar='$adhar',salary='$salary',dept='$dept',photo='$photo' where empid='$empid'";
    }
    else{    
        $query="insert into emps(empid,ename,father,city,gender,phone,email,qual,exp,dob,adhar,salary,dept,photo) "
            . "values('$empid','$ename','$father','$city','$gender','$phone','$email','$qual','$exp','$dob','$adhar','$salary','$dept','$photo')";
    }
    mysqli_query($link, $query) or die("error ". mysqli_error($link));
    $_SESSION["msg"]="Employee saved successfully";

    header("location: staffs.php");
}

