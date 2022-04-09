<?php
include_once 'dbfun.php';
extract($_POST);
switch($type){
    case 1:        
        $type="all";
        break;
    case 2:
        $type="students";
        break;
    case 3:
        $type="class";
        $nto=$cid;
        break;
    case 4:
        $type="teachers";
        break;
    case 5:
        $type="teacher";
        break;
    case 6:
        $type="student";
        break;
}
$query="insert into notifications(subject,nfrom,nto,msg,sendtype) values('$subject','$nfrom','$nto','$msg','$type')";
$link=connect();
mysqli_query($link, $query) or die("Error ". mysqli_error($link));
mysqli_close($link);
$_SESSION["msg"]="Notification send successfully";
header("location: notifications.php?q=inbox");
