<?php
include "header.php";
?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">All Patient</span>
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

<div class="widget-program-box mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <style>
                .hpanel:hover{
                    border: 3px solid blue;
                }
            </style>
            <?php
            $sq=mysqli_query($con,"select * from registration");
            if(mysqli_num_rows($sq)==0) {
                echo "<h2 style='margin-left: 35%;color:blueviolet;font-family: Times;font-style: italic;font-size: 39px;'>No details to show</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
            }
            else {

                $sql = mysqli_query($con, "select * from registration ORDER BY ward");
                while ($row = mysqli_fetch_array($sql)) {
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="width: 32%;">
                        <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30" style="">
                            <style>
                                .text-center {
                                    text-align: left;
                                }
                            </style>
                            <div class="panel-body">
                                <div class="social-media-in">
                                    Nurse<a href="assign_nrs_pat.php?pid=<?php echo $row['id'] ?>"
                                            style="margin-top: -33%;margin-left: -35%;background: cadetblue;"><i
                                            class="fa fa-user-plus"></i></a><br>

                                    Asha-worker<a href="assign_ash_pat.php?pid=<?php echo $row['id'] ?>"
                                                  style="margin-top: -33%;margin-left: -35%;"><i
                                            class="fa fa-user-plus"></i></a><br>
                                    Volunteer<a href="assign_vol_pat.php?pid=<?php echo $row['id'] ?>"
                                                style="margin-top: -33%;margin-left: -35%;background-color: #ff1493"><i
                                            class="fa fa-user-plus"></i></a>

                                </div>
                                <div class="text-center content-box">
                                    <img alt="logo" class="img-circle m-b" src="img/patient/log.png" style="width: 70px;height: auto">
                                    <h2 class="m-b-xs" style="text-transform: capitalize"><?php echo $row['name'] ?></h2>

                                    <p class="font-bold text-warning">ward :<?php echo $row['ward'] ?></p>
                                    <p class="font-bold text-warning" style="text-transform: uppercase">apl/bpl : <?php echo $row['apl_bpl'] ?></p>

                                    <div class="m icon-box">
                                        <i class="fas fa-user-nurse"></i>
                                    </div>
                                    <p class="small mg-t-box" style="text-align: justify;text-transform: capitalize">
                                        Address: <?php
                                        echo $row['address'];
                                        echo " ,<br>";
                                        echo $row['place'];
                                        echo "<br> Ph : ";
                                        echo $row['contact']
                                        ?>
                                    </p>
                                    <?php
                                    $pid=$row['id'];
                                    $re_nrs=mysqli_query($con,"select * from report_nurse WHERE pat='$pid'");
                                    $c_nrs=mysqli_num_rows($re_nrs);
                                    $re_ash=mysqli_query($con,"select * from report_worker WHERE pat='$pid'");
                                    $c_ash=mysqli_num_rows($re_ash);
                                    $re_vol=mysqli_query($con,"select * from report_volunteer WHERE pat='$pid'");
                                    $c_vol=mysqli_num_rows($re_vol);
                                    if($c_nrs>0 || $c_ash>0 || $c_vol>0) {
                                        ?>
                                        <a href="view_medical_report.php?pid=<?php echo $row['id'] ?>"
                                           style="color:white" class="btn btn-warning widget-btn-3 btn-sm">view reports
                                            of staff</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>

</body>

</html>