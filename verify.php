<?php
include_once 'dbfun.php';
extract($_POST);
$data=single("students","regno='$regno' and name='$name'");
if(empty($data))
    echo "Invalid";
else
    echo sprintf ("student%04d",$regno);


