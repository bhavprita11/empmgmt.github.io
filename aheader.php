<?php include_once 'dbfun.php'; ?>
<!DOCTYPE html>
<html>
    <head runat="server">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Dashboard</title>
        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/all.css" rel="stylesheet" />
        <link href="css/adminlte.css" rel="stylesheet" />
        <link href="css/OverlayScrollbars.css" rel="stylesheet" />
        <link rel="icon" href="images/logo.png" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
        <script src="js/jquery-3.4.1.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/all.js"></script>
        <script src="js/adminlte.js"></script>
        <script src="js/jquery.overlayScrollbars.js"></script>  
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <style>
            body {
                background-color: aliceblue;
            }
            marquee ul {
                padding: 0;
            }

            marquee ul li {
                border-bottom: 1px solid black;
                background-color: skyblue;
                padding: 4px;
                margin-bottom: 2px;
            }

            marquee ul li:hover {
                background-color: aqua;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">        
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <h5 class="text-center text-uppercase" style="width:100%;">Employee Management System(BSPTCL)</h5>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell fas-shake animated"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Accounts</span>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i>Logout            
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" data-target="#changepwd" data-toggle="modal" class="dropdown-item">
                            <i class="fas fa-key mr-2"></i>Change Password           
                        </a>
                    </div>
                </li>

            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="AdminHome.php" class="brand-link">
                <img src="images/logo.jpeg" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Administrator</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">               

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="AdminHome.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>                        
                        <li class="nav-item">
                            <a href="departments.php" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Departments                                    
                                </p>
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="staffs.php" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Staffs                                    
                                </p>
                            </a>                            
                        </li>                       
                        <li class="nav-item">
                            <a href="attendance.php" class="nav-link">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    Attendance                                    
                                </p>
                            </a>                            
                        </li>                        
                        <li class="nav-item">
                            <a href="leaves.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Leaves                                    
                                </p>
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="attendancereport.php" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Attendance Report                                    
                                </p>
                            </a>                            
                        </li>
                        <li class="nav-item">
                            <a href="users.php" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Users                                    
                                </p>
                            </a>                            
                        </li>

                        <li class="nav-item">
                            <a href="mail.php" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Mails                                    
                                </p>
                            </a>                            
                        </li>    
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <?php include_once 'msg.php'; ?>