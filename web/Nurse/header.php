<?php
//session_start();
//$nid=$_SESSION['nrs_id'];
//if(!$nid)
{
 //   header('location:logout.php');
}
include "../connection.php";
//$z=mysqli_query($con,"select * from nurse WHERE nrs_id='$nid'");
//$rz=mysqli_fetch_array($z);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nurse | Palliative Center</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../Admin/img/fav.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.php"><img class="main-logo" src="../Admin/img/logo/logo2.png" alt="" style="width: 158px;margin-left: -24px;margin-top: -18px;"/></a>
            <strong><img src="../Admin/img/logo/logo2.png" alt="" /></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">

                    <li><a title="Home" href="index.php" aria-expanded="false"><i class="fa big-icon fa-home icon-wrap"></i><span class="mini-click-non">Home</span></a></li>

                    <li><a title="Assigned patients" href="ass_pat_view.php" aria-expanded="false"><i class="fa fa-users icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Assigned Patients</span></a></li>

                    <li><a title="facility request" href="facility_request.php" aria-expanded="false"><i class="fa fa-user-plus icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Facility Request</span></a></li>

                    <li><a title="service request" href="service_request.php" aria-expanded="false"><i class="fa fa-user-plus icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Service Request</span></a></li>

                    <li>
                        <a class="has-arrow" href="" aria-expanded="false"><i class="fa big-icon fa-bell icon-wrap"></i> <span class="mini-click-non">Alert Notification</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Add alert msgs" href="add_notification.php"><i class="fa fa-arrow-right sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Add Details</span></a></li>
                            <li><a title="View alert msgs" href="view_notification.php"><i class="fa fa-arrow-right sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">View Details</span></a></li>
                        </ul>
                    </li>
        </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">
                                        <ul class="nav navbar-nav mai-top-nav">
                                            <li class="nav-item"><a href="#" class="nav-link"></a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link"></a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link"></a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <span class="admin-name" style="text-transform: capitalize"><?php echo $rz['nrs_name'] ?></span>
                                                    <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                                </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn" style="margin-left: -17px;width: 5px;">
<!--                                                    <li><a href="profile.php"><span class="fa fa-user author-log-ic"></span>My Profile</a></li>-->
                                                    <li><a href="logout.php"><span class="fa fa-sign-out author-log-ic"></span>Log Out</a></li>
                                                </ul>
                                            </li>

                                            <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
