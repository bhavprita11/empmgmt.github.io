<?php
include_once 'dbfun.php';

extract($_POST);
$link= connect();
$user=single("users","userid='$userid'");
if(empty($user)){
    $query="insert into users values('$userid','$ename','$pwd','$role','$empid',1)";
}
else{
    $active=isset($active) ? 1 : 0; 
    $pwd=empty($pwd) ? $user["pwd"] : $pwd;  
    $query="update users set pwd='$pwd',active=b'$active' where userid='$userid'";
}
mysqli_query($link, $query) or die("Error ". mysqli_error($link));
mysqli_close($link);


$emp=single("emps","empid='$empid'");
$name=$emp["ename"];
$email=$emp["email"];
$subject="Password created for Staff";
$msg="Dear $name,<br>".
"Welcome to BSPTCL<br>" .
"Your password has been created for userid $userid.<br>".
"Your password is $pwd.<br>".
"Thanks and regards<br>".
"EMS BSPTCL";

send_mail($email,$name,$subject,$msg);

$_SESSION["msg"]="Userid and password sent to employee email id";
$url="addemp.php?empid=$empid";
header("location: $url");
