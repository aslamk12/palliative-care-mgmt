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
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
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
$nrs=mysqli_query($con,"select * from nurse");
$vol=mysqli_query($con,"select * from volunteer");
$eqp=mysqli_query($con,"select * from equipments");
$pat=mysqli_query($con,"select * from patient");

?>

    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <style>
                    h1, h2, h3, h4, h5, h6 {
                        margin: 0 0 10px;
                        font-weight: 700;
                    }
                </style>

                <a href="add_nurse.php">
                <div class="col-lg-3" style="width: 20%;">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5> Registered</h5>
                            <h2>Nurse :<span class="counter" style="color: #006DF0"><?php echo $count_nrs=mysqli_num_rows($nrs); ?></span> </h2>
                        </div>
                    </div>
                </div></a>

                <a href="add_facility.php">
                <div class="col-lg-3" style="width: 20%;">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Registered </h5>
                            <h2>Equipments :<span class="counter" style="color: #933EC5"><?php echo $count_wrk=mysqli_num_rows($eqp) ?></span> </h2>
                        </div>
                    </div>
                </div></a>

                <a href="manage_volunteer.php">
                <div class="col-lg-3" style="width: 20%;">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Registered </h5>
                            <h2>Volunteers :<span class="counter" style="color: #65b12d"><?php echo $count_vol=mysqli_num_rows($vol) ?></span> </h2>
                        </div>
                    </div>
                </div></a>

                <a href="view_patient.php">
                <div class="col-lg-3" style="width: 20%;">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Registered </h5>
                            <h2>Patients :<span class="counter" style="color:#ffb463 "><?php echo $count_pat=mysqli_num_rows($pat) ?></span></h2>
                        </div>
                    </div>
                </div></a>



            </div>
        </div>
    </div>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="w3-content w3-section" style="max-width:900px">
                        <img class="mySlides" src="img/banner/ban3.jpg" style="width:100%;height: 30em;">
                        <img class="mySlides" src="img/banner/ban2.jpg" style="width:100%;height: 30em;">
                        <img class="mySlides" src="img/banner/ban1.png" style="width:100%;height: 30em;">

                    </div>
                </div>
                <script>
                    var myIndex = 0;
                    carousel();

                    function carousel() {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        myIndex++;
                        if (myIndex > x.length) {myIndex = 1}
                        x[myIndex-1].style.display = "block";
                        setTimeout(carousel, 2000); // Change image every 2 seconds
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<!--    ====================================================================-->


</div>
<!-- jquery
      ============================================ -->
<script src="js/vendor/jquery-1.12.4.min.js"></script>
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
<!-- counterup JS
    ============================================ -->
<script src="js/counterup/jquery.counterup.min.js"></script>
<script src="js/counterup/waypoints.min.js"></script>
<script src="js/counterup/counterup-active.js"></script>
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
<script src="js/sparkline/sparkline-active.js"></script>
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
<!-- tawk chat JS
    ============================================ -->
<!--<script src="js/tawk-chat.js"></script>-->
</body>

</html>