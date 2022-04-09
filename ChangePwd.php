<?php
include_once 'dbfun.php';
$old=$_POST["opwd"];
$userid=$_SESSION["userid"];
$pwd=$_POST["pwd"];    

$link= connect();
$result=mysqli_query($link,"select * from users where userid='$userid' and pwd='$old'");
if($row= mysqli_fetch_assoc($result)){
    $query="update users set pwd='$pwd' where userid='$userid'";       
    mysqli_query($link, $query) or die("error ".mysqli_error($link));
    if($_SESSION["role"]!='Admin'){
        $empid=$_SESSION["empid"];
        $emp=single("emps","empid='$empid'");
        $name=$emp["ename"];
        $email=$emp["email"];
        $subject="Password updated for Staff";
        $msg="Dear $name,<br>".
        "Your password has been updated for userid $userid.<br>".
        "Your current password is $pwd.<br>".
        "Thanks and regards<br>".
        "EMS BSPTCL";

        send_mail($email,$name,$subject,$msg);

        $_SESSION["msg"]="Userid and password sent to employee email id";
    }
    else{
        $_SESSION["msg"]="Password updated successfully";
    }

}else{        
    $_SESSION["error"]="Incorrect current password..!!";
}
if($_SESSION["role"]=="Admin"){ 
    header("location: adminhome.php");
}else{
    header("location: empprofile.php");
}
