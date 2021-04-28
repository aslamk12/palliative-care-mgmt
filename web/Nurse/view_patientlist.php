<?php
include "header.php";
//session_start();
//$nmob=$_SESSION['nrs_mob'];
//$nm=mysqli_query($con,"select * from login where login_id='$nid' ");
//while ($rw4=mysqli_fetch_array($nm))
//{
//    $nmob=$rw4['uname'];
//}
echo $nmob;
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
                                <li><span class="bread-blod">Assigned Patients</span>
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

<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <?php
                    $sq=mysqli_query($con,"select * from patient INNER JOIN assign_nurse ON patient.pid=assign_nurse.patient inner join nurse ON assign_nurse.nurse=nurse.nid where nurse.mobile='$nmob'");
                    if(mysqli_num_rows($sq)==0){
                        echo "<h2 style='margin-left: 35%;color:seagreen;font-family: Times;font-style: italic;font-size: 39px;'>No details to show</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                    }else {
                        ?>
                        <h4>Assigned Patient List</h4>
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Patient Name</th>
                                <th>Gender</th>
                                <th>Disease</th>
                                <th>Assigned Date</th>
                                <th data-field="view">View</th>
                                <th data-field="action">Report</th></tr>
                            <?php
                            $i = 1;
                            $sq=mysqli_query($con,"select * from patient INNER JOIN assign_nurse ON patient.pid=assign_nurse.patient inner join nurse ON assign_nurse.nurse=nurse.nid where nurse.mobile='$nmob'");
                            while ($ro = mysqli_fetch_array($sq)) {
                                ?>
                                <tr style="text-transform: capitalize">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $ro['pname'] ?></td>
                                    <td><?php echo $ro['gender'] ?></td>
                                    <td><?php echo $ro['disease'] ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($ro['assigned_on'])) ?></td>
                                    <td>
                                        <a href="viewmore_ass.php?id=<?php echo $ro['ass_nid'] ?>"
                                           data-toggle="tooltip" title="View" class="pd-setting-ed" style="padding: 6px 7px;
color:
#333;
font-size: 22px;
border-radius: 3px;
border: 1px solid
rgba(0,0,0,.12);
background:
#f5f5f5;">
                                            <i class="fa fa-eye" aria-hidden="true" style="font-size: 27px;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="add_report.php?aid=<?php echo $ro['ass_nid'] ?>"
                                           data-toggle="tooltip" title="View" class="pd-setting-ed" style="padding: 6px 7px;
color:
#333;
font-size: 22px;
border-radius: 3px;
border: 1px solid
rgba(0,0,0,.12);
background:
#f5f5f5;">
                                            <i class="fa fa-search-plus" style="font-size: 27px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>


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
