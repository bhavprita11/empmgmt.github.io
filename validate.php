<?php

include_once 'dbfun.php';
extract($_POST);

$link= connect();

$query="SELECT * FROM users WHERE userid='$userid' and pwd='$pwd'";
$result=mysqli_query($link, $query) or die("Error ". mysqli_error($link));

if($row= mysqli_fetch_assoc($result)){

    $_SESSION["userid"]=$row["userid"];
    $_SESSION["role"]=$row["role"];
    $_SESSION["uname"]=$row["uname"];
    if($_SESSION["role"]=="Admin"){
        header("location: adminhome.php");
    }          
    else if($row["role"]=="Staff"){
        $_SESSION["empid"]=$row["id"];
        header("location: emphome.php");
    }
}
else{
    $_SESSION["error"]="Invalid username or password";
    header("location: index.php");
}
