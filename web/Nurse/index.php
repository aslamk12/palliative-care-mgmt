<?php
include "header.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcome-heading">

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <ul class="breadcome-menu">
                                <li><a href="index.php">Home</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
//$alt=mysqli_query($con,"select * from alert_notification inner join asha_worker on alert_notification.ashwrkr=asha_worker.ash_id");
//$ass=mysqli_query($con,"select * from assign_nurse INNER JOIN registration ON assign_nurse.pat=registration.id where nurse='1'");
//$fac=mysqli_query($con,"select distinct(facility_request.req_id) from facility_request INNER JOIN registration on facility_request.user_id=registration.id INNER JOIN assign_nurse on facility_request.user_id=assign_nurse.pat WHERE reply='Waiting' AND assign_nurse.nurse='$nid'");
//$ser=mysqli_query($con,"select distinct(service.sid) from service INNER JOIN registration on service.userid=registration.id INNER JOIN assign_nurse on service.userid=assign_nurse.pat WHERE assign_nurse.nurse='$nid'");
?>
<div class="section-admin container-fluid" >
    <div class="row admin text-center">
        <div class="col-md-12" style="margin-top: -62px;">
            <div class="row">
                <style>
                    .ass:hover{color:#24caa1; }
                    .fac:hover{color:#eb4b4b;}
                    .ser:hover{color:#2eb7f3;}
                    .alr:hover{color:#805bbe;}
                </style>

                <a href="ass_pat_view.php" class="ass">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                            <h4 class="text-left text-uppercase" style="font-size: 19px;"><b>Assigned Patients</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-9 cus-gh-hd-pro">
                                    <h2 class="text-left no-margin" style="color:#24caa1"><?php //echo $c1=mysqli_num_rows($ass) ?></h2>
                                </div>
                            </div>
                        </div>
                    </div></a>







            </div>
        </div>
    </div>
</div>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid" style="background-image: url(img/55.jpg); background-repeat: no-repeat;">
        <img src="">
        <div class="row">
            <div class="col-lg-6" style="margin-left: 250px">
                <div class="product-sales-chart" style="height: 930px;   ">

                </div>
            </div>
        </div>
    </div>
</div>




<!-- jquery
    ============================================ -->
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="js/metisMenu/metisMenu.min.js"></script>
<script src="js/metisMenu/metisMenu-active.js"></script>
<!-- morrisjs JS
    ============================================ -->
<script src="js/morrisjs/raphael-min.js"></script>
<script src="js/morrisjs/morris.js"></script>
<script src="js/morrisjs/morris-active.js"></script>
<!-- morrisjs JS
    ============================================ -->
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<script src="js/sparkline/jquery.charts-sparkline.js"></script>
<!-- calendar JS
    ============================================ -->
<script src="js/calendar/moment.min.js"></script>
<script src="js/calendar/fullcalendar.min.js"></script>
<script src="js/calendar/fullcalendar-active.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>
</body>

</html>