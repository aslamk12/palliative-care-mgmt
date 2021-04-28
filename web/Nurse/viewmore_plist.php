<?php
include "header.php";

$k=$_GET['id'];
$sq1=mysqli_query($con,"select * from patient inner join medical_report on patient.pid=medical_report.pid where patient.pid='$k'");
$ro1=mysqli_fetch_array($sq1);

?>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcome-heading">

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Patient</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Patient Details</span>
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
<!-- Basic Form Start -->
<div class="basic-form-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <div class="sparkline8-list mt-b-30" style="margin-left: 10%">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Patient Details</h1>

                        </div>
                    </div><br>
                    <div class="sparkline8-graph">
                        <div class="basic-login-form-ad">
                            <div class="row" >
                                <div class="col-lg-10">
                                    <div class="basic-login-inner">
                                        <form>
                                            <div class="form-group-inner">
                                                <label></label>

                                            </div>
                                            <div class="form-group-inner">
                                                <label>Name</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['pname']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Mobile</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['mobile']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Gender</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['gender']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Date of Birth</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['dob']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Place</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['place']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Panchayath</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['panchayath']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Ward</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['ward']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Address</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['address']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Disease</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['disease']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Medicines</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['medicines']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="form-group-inner">
                                                <label>Description</label>
                                                <input readonly class="form-control" value="<?php echo $ro1['description']?>" style="text-transform: capitalize;background-color:transparent;" />
                                            </div>
                                            <div class="profile-info-inner">
                                                <div class="profile-img">
                                                    <label>Medical Report</label>
                                                    <?php
                                                    if($ro1['report_image']=='') {
                                                        ?>
                                                        <img src="img/sponsor.png" alt=""
                                                             style="height: 235px;width: 220px;margin-left: 50px;"/>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <img src="../UPLOADS/<?php echo $ro1['report_image'] ?>" alt=""
                                                             style="height: 235px;width: 220px;margin-left: 50px;"/>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>


                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 ">
                                    <div class="basic-login-inner" style="margin-top: 4%;margin-left: 12%;">
                                        <a href="ass_pat_view.php" style="color:
#e12503;
font-size: 100px;
padding: 0px 70px;
display: block;
margin-top: -14%;"><i class="fa fa-angle-double-left big-icon" style="font-size: 51%;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>

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
<!-- touchspin JS
    ============================================ -->
<script src="js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="js/touchspin/touchspin-active.js"></script>
<!-- colorpicker JS
    ============================================ -->
<script src="js/colorpicker/jquery.spectrum.min.js"></script>
<script src="js/colorpicker/color-picker-active.js"></script>
<!-- datapicker JS
    ============================================ -->
<script src="js/datapicker/bootstrap-datepicker.js"></script>
<script src="js/datapicker/datepicker-active.js"></script>
<!-- input-mask JS
    ============================================ -->
<script src="js/input-mask/jasny-bootstrap.min.js"></script>
<!-- chosen JS
    ============================================ -->
<script src="js/chosen/chosen.jquery.js"></script>
<script src="js/chosen/chosen-active.js"></script>
<!-- select2 JS
    ============================================ -->
<script src="js/select2/select2.full.min.js"></script>
<script src="js/select2/select2-active.js"></script>
<!-- ionRangeSlider JS
    ============================================ -->
<script src="js/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script src="js/ionRangeSlider/ion.rangeSlider.active.js"></script>
<!-- rangle-slider JS
    ============================================ -->
<script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
<script src="js/rangle-slider/rangle-active.js"></script>
<!-- knob JS
    ============================================ -->
<script src="js/knob/jquery.knob.js"></script>
<script src="js/knob/knob-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="js/tab.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>
</body>

</html>

