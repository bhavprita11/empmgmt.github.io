<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

include_once 'dbcon.php';
ob_start();
if(!isset($_SESSION)){
    session_start();
}
function connect(){
    $link= mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("Error ". mysqli_connect_error());
    return $link;
}

function singledata($query){
    $link= connect();    
    $result=mysqli_query($link, $query) or die("Error ". mysqli_error($link));
    $row=mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row;
}

function alldatasql($query){
    $link=connect();
    $result=mysqli_query($link, $query) or die("Error ". mysqli_error($link));
    $rows=[];
    while($row=mysqli_fetch_assoc($result))
    {
        $rows[]=$row;
    }
    mysqli_close($link);
    return $rows;
}

function allrecords($table){
    $link=connect();
    $result=mysqli_query($link, "SELECT * FROM $table") or die("Error ". mysqli_error($link));
    $rows=[];
    while($row=mysqli_fetch_assoc($result))
    {
        $rows[]=$row;
    }
    mysqli_close($link);
    return $rows;
}

function single($table,$condition){
    $link=connect();
    $result=mysqli_query($link, "SELECT * FROM $table WHERE $condition") 
            or die("Error ". mysqli_error($link));
    $row=mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row;
}

function findall($table,$condition){
    $link=connect();
    $result=mysqli_query($link, "SELECT * FROM $table WHERE $condition") 
            or die("Error ". mysqli_error($link));
    $rows=[];
    while($row=mysqli_fetch_assoc($result))
    {
        $rows[]=$row;
    }
    mysqli_close($link);
    return $rows;
}

function countrecords($table){
    $link=connect();
    $result=mysqli_query($link, "SELECT count(*) as total FROM $table") or die("Error ". mysqli_error($link));    
    $row=mysqli_fetch_assoc($result);    
    mysqli_close($link);
    return $row["total"];
}

function countifrecords($table,$condition){
    $link=connect();
    $result=mysqli_query($link, "SELECT count(*) as total FROM $table WHERE $condition") or die("Error ". mysqli_error($link));    
    $row=mysqli_fetch_assoc($result);    
    mysqli_close($link);
    return $row["total"];
}

function getStudentId($cid){
    if(countifrecords("students","cid=$cid")==0)
        return 1;
    else{
        $link= connect ();
        $result= mysqli_query($link, "select max(rollno)+1 as rollno from students where cid=$cid");
        $row= mysqli_fetch_assoc($result);
        $rollno=$row["rollno"];
        mysqli_close($link);
        return $rollno;
    }
}

function numberToRoman($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}

function send_mail($mail_to,$name,$subject,$msg) {
    $email=single("settings","id=1");
    $fromemail=$email["frommail"];
    $password=$email["password"];
    $fromname=$email["compname"];

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = $fromemail;
    $mail->Password   = $password;
    $mail->IsHTML(true);
    $mail->AddAddress($mail_to, $name);
    $mail->SetFrom($fromemail, $fromname);
    $mail->Subject = $subject;
    $content = "<b>$msg</b>";
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        echo "Email sent successfully";
    }
}
