<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="icon" href="images/logo.png" />
    <style>
    body{
        background-image:url('images/b1.jpg');        
        background-size:100% 100%;
    }
    </style>
</head>
<body style="height: 100vh; background-color: rgb(234, 245, 250);">
<?php
session_start();
include_once 'msg.php'; 
?>
<div class="jumbotron p-3 mb-2 bg-transparent text-dark text-center rounded-0" style="box-shadow: 0 0 5px 2px white">
    <h3 class="text-center text-white">Employee Management System BSPTCL</h3>            
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto bg-transparent text-center mt-5 p-4" style="box-shadow:0 0 2px 2px white;">
            <img src="images/logo.jpeg" style="width:200px;height:200px;" class="my-2 img-thumbnail mb-4"/>
            <form method="post" autocomplete="off" action="validate.php">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success border-0 text-white">
                                <i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" placeholder="User ID here" name="userid" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success border-0 text-white">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input type="password" name="pwd" placeholder="Password here" class="form-control">
                    </div>
                </div>                                                                     
            <input type="submit" value="Login" class="btn btn-success btn-block" />
            </form>
        </div>
    </div>
</div>
</body>
</html>