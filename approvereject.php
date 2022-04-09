<?php
include_once 'dbfun.php';
extract($_POST);
$link=connect();
if($type=="approve")
    mysqli_query($link,"UPDATE attendance SET approved=1 WHERE find_in_set(id,'$ids')");
else
    mysqli_query($link,"UPDATE attendance SET approved=2 WHERE find_in_set(id,'$ids')");

mysqli_close($link);

$_SESSION["msg"]="Attendance stored successfully";