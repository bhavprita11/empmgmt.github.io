<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin Login</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/all.css">
        <link rel="icon" href="images/logo.png" />
        <script src="js/jquery-3.4.1.js" type="text/javascript"></script>
        <script>
            $(function () {
                $("#sname").change(function () {
                    let regno = $("#regno").val();
                    let sname = $(this).val();
                    $.post('verify.php', {'regno': regno, 'name': sname}, (data) => {
                        console.log(data);
                        if (data === "Invalid") {
                            $("#btn").attr("disabled", true);
                            $("#userid").val("");
                        } else {
                            $("#userid").val(data);
                            $("#btn").attr("disabled", false);
                        }
                    });
                });

            });
        </script>
        <style>
            body{
                background-image:url('images/bg6.jpg');        
                background-size:100% 100%;
            }
        </style>
    </head>
    <body style="height: 100vh;">
        <?php
        session_start();
        include_once 'msg.php';
        ?>        
        <div class="jumbotron p-3 mb-2 rounded-0 bg-transparent text-dark text-center" style="box-shadow: 0 0 5px 2px black">
            <h3 class="text-center text-white">My School</h3>            
            <h6 class="text-center font-italic font-weight-normal text-white">(Affiliated to CBSE Board)</h6>            
        </div>
        <div class="container p-2 mt-3" style="background-image: url('images/bg1.jpg');background-size: 100% 100%">
            <div class="card shadow bg-transparent">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="text-center">Employee Registration</h3>
                            <h5 class="text-center font-italic font-weight-normal">
                                Generate your userid and password
                            </h5>
                        </div>
                        <div class="col-sm-4 bg-transparent text-center border p-4 border-dark" style="box-shadow:0 0 2px 1px grey;">
                            <img src="images/logo.jpeg" style="width:200px;" class="my-2 rounded-circle"/>
                            <form method="post" autocomplete="off" action="saveuser.php">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-user-tie"></i></span>
                                        </div>
                                        <input type="text" id="regno" placeholder="Registration Number" name="regno" class="form-control">
                                        <input type="hidden" name="role" value="Student">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-user-tie"></i></span>
                                        </div>
                                        <input type="text" id="sname" placeholder="Student Name" name="sname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-user-tie"></i></span>
                                        </div>
                                        <input type="text" id="userid" readonly name="userid" class="form-control">
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
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success border-0 text-white">
                                                <i class="fas fa-key"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="cpwd" placeholder="Repeat Password" class="form-control">
                                    </div>
                                </div>
                                <input type="submit" id="btn" disabled value="Register Now" class="btn btn-success btn-block" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div

    </body>
</html>