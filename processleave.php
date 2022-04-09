<?php
include_once 'dbfun.php';
extract($_POST);
$link=connect();
if($type=="approve") {
    $sql="UPDATE leaves SET approved=1 WHERE find_in_set(id,'$ids')";
    mysqli_query($link,$sql);

    $sql="insert into attendance(adate,progress,logtime,empid,approved) SELECT fromdate,'On Leave',0,empid,1 from leaves WHERE find_in_set(id,'$ids')";
    mysqli_query($link,$sql);
}
else {
    $sql="UPDATE leaves SET approved=2 WHERE find_in_set(id,'$ids')";
    mysqli_query($link,$sql);

    $sql="insert into attendance(adate,progress,logtime,empid,approved) SELECT fromdate,'Absent',0,empid,2 from leaves WHERE find_in_set(id,'$ids')";
    mysqli_query($link,$sql);
}
$_SESSION["msg"]= "Leaves stored successfully";