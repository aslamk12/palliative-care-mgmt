<?php
//session_start();
//$aid=$_SESSION['aid'];
//if(!$aid)
//{
//    header('location:logout.php');
//}
include "../connection.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Santhwanam Palliative Clinic</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/fav.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
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
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
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
<!-- Start Left menu area -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.php"><img class="main-logo" src="img/logo/logo3.png" alt="" style="width: 158px;margin-left: -24px;margin-top: -18px;"/></a>
            <strong><a href="index.php"><img src="img/logo/logo3.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">

                    <li class="active"><a  href="index.php"><span class="educate-icon educate-home icon-wrap"></span><span class="mini-click-non">Home</span></a></li>

                   <!-- <li>
                        <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Sponsor</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Sponsor Request" href="view_sponsor_request.php"><span class="mini-sub-pro">Sponsor Request</span></a></li>
                            <li><a title="Approved Sponsors" href="view_sponsor.php"><span class="mini-sub-pro">Sponsor Details</span></a></li>
                        </ul>
                    </li>-->

                   <!-- <li>
                        <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Course & Class</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Courses & class" href="add_course.php"><span class="mini-sub-pro">Add Details</span></a></li>
                            <li><a title="View Courses" href="view_course.php"><span class="mini-sub-pro">View Course</span></a></li>
                            <li><a title="View Class" href="view_class.php"><span class="mini-sub-pro">View Class</span></a></li>
                        </ul>
                    </li>-->

                    <li>
                        <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Staffs</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="add/view Nurse" href="add_nurse.php"><span class="mini-sub-pro">Add Nurse</span></a></li>
                            <li><a title="view Volunteer" href="manage_volunteer.php"><span class="mini-sub-pro">View Volunteer</span></a></li>
                        </ul>
                    </li>
                    <li><a title="Add Equipments" href="add_facility.php"><span class="educate-icon educate-event icon-wrap sub-icon-mg"></span><span class="mini-click-non">Equipments</span></a></li>

                    <li>
                        <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Patient</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Patient's Facility Request" href="view_patient.php"><span class="mini-sub-pro">View Request</span></a></li>
                            <li><a title="Patient's Service Request" href="view_app_patient.php"><span class="mini-sub-pro">Assign Nurse</span></a></li>
                        </ul>
                    </li>

                    <li><a title="Equipment Request" href="view_equiprequest.php"><span class="educate-icon educate-event icon-wrap sub-icon-mg"></span><span class="mini-click-non">Equipment Requests</span></a></li>

                    <li>
                        <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Add More</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Blood donors list" href="add_blooddonor.php"><span class="mini-sub-pro">Blood Donors List</span></a></li>
                            <li><a title="Training Classes" href="add_tutorials.php"><span class="mini-sub-pro">Training Classes</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Revenue</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Sponserships" href="report_select.php"><span class="mini-sub-pro">Sponserships</span></a></li>
                            <li><a title="Add revenue" href="view_service_req.php"><span class="mini-sub-pro">Add Revenue</span></a></li>
                        </ul>
                    </li>

                    <li><a title="Satff Reports" href="report_select.php"><span class="educate-icon educate-library icon-wrap sub-icon-mg"></span><span class="mini-click-non">Reports</span></a></li>

                    <li>
                        <a  href="logout.php" aria-expanded="false"><span class="educate-icon educate-settings icon-wrap"></span> <span class="mini-click-non">Logout</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>

<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.php"><img class="main-logo"  alt="" /></a>
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
                                            <i class="educate-icon educate-nav"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">
                                        <div id="Settings" class="tab-pane fade"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

