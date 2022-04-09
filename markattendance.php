<?php
include_once 'dbfun.php';
extract($_POST);
$empid=$_SESSION["empid"];

$count=countifrecords("attendance","adate='$adate' and empid='$empid'") ;
if($count==1) {
    $_SESSION["error"]= "Attendance already marked";
}else {
    $link=connect();
    mysqli_query($link,"insert into attendance(adate,progress,logtime,empid) 
    values('$adate','$progress','$logtime','$empid')");
    mysqli_close($link);
    $_SESSION["msg"]= "Attendance marked successfully";
}
header("location: eattendance.php");