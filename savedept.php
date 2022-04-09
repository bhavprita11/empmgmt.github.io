<?php

include_once 'dbfun.php';
extract($_POST);
$link= connect();

if(isset($action))
    $query="update departments set dname='$dname' where dcode='$dcode'";
else
    $query="insert into departments(dcode,dname) values('$dcode','$dname')";

mysqli_query($link, $query) or die("error ". mysqli_error($link));

$_SESSION["msg"]="Department saved successfully";

header("location: departments.php");

