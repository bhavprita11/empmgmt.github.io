<?php
include_once 'dbfun.php';
extract($_POST);
$empid=$_SESSION["empid"];
$query= "insert into leaves(fromdate,todate,reason,empid,approved,reqdate) 
values('$fromdate','$todate','$reason','$empid',0,now())";
$link=connect();
mysqli_query($link,$query) or die("Error ".mysqli_error($link));
mysqli_close($link);
$_SESSION["msg"]="Leave requested successfully";
header("location: eleaverequest.php");
