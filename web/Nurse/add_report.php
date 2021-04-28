<?php
include "header.php";
$k=$_GET['aid'];
$ss="select * from assign_nurse INNER JOIN patient ON assign_nurse.patient=patient.pid where patient.pid='$k'";
$sq=mysqli_query($con,$ss);
$row=mysqli_fetch_array($sq);
?>
<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcome-heading"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Work Report</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Add & View</span>
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
<!-- Single pro tab start-->
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i> Add Report</a></li>
                            <li><a href="#reviews"><i class="fa fa-table" aria-hidden="true"></i> View Reports</a></li>
                            <!--                                <li><a href="#INFORMATION"><i class="fa fa-commenting" aria-hidden="true"></i> Review</a></li>-->
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">

                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <form method="post" action="add_report_fun.php?pid=<?php echo $k ?>&p=<?php echo $row['pid'] ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Patient Name</span>
                                                    <input type="text" class="form-control" value="<?php echo $row['pname'] ?>" style="text=transform: capitalize;">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Place </span>
                                                    <input type="text" class="form-control" value="<?php echo $row['place'] ?>"style="text=transform: capitalize;">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Medicines</span>
                                                    <textarea name="medicine" class="form-control" required=""></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Report</span>
                                                    <textarea name="report" class="form-control" required=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                <button type="submit" name="sub" class="btn btn-primary waves-effect waves-light m-r-10">Save
                                                </button>
                                                <button type="reset" class="btn btn-warning waves-effect waves-light">Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="product-tab-list tab-pane fade" id="reviews">
                                <div class="product-status mg-tb-15">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <?php
                                            $view=mysqli_query($con,"select * from work_report INNER JOIN patient ON work_report.patient=patient.pid where patient.pid='$k'");
                                            $count=mysqli_num_rows($view);
                                            if($count==0)
                                            {
                                                ?>
                                                <h2 style='margin-left: 35%;color:mediumvioletred;font-family: Times;font-style: italic;font-size: 39px;'>No details to show</h2>
                                                <?php
                                            }else {
                                                ?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="product-status-wrap">
                                                        <h4>Work Report</h4>
                                                        <table style="text-transform: capitalize">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Patient Name</th>
                                                                <th>Reported Date</th>
                                                                <th>Prescription</th>
                                                                <th>Report</th>
                                                                <th>Edit</th>
                                                                <!--                                                                    <th>Add more</th>-->
                                                            </tr>
                                                            <?php
                                                            $i=1;
                                                            while($row=mysqli_fetch_array($view)) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $i?></td>
                                                                    <td><?php echo $row['pname'] ?></td>
                                                                    <td><?php echo date('d/m/Y',strtotime($row['date'])) ?></td>
                                                                    <td><?php echo $row['medicines']?></td>
                                                                    <td><?php echo $row['report'] ?></td>
                                                                    <td>
                                                                        <a href="edit_report.php?id=<?php echo $row['wrid'] ?>" data-toggle="tooltip" title="Edit"
                                                                           class="pd-setting-ed" style="padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid;rgba(0,0,0,.12);background:#f5f5f5;">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                        </a>

                                                                    </td>
                                                                    <!--                                                                        <td>-->
                                                                    <!--                                                                            <a class="pd-setting" href="addmore_report.php"><i-->
                                                                    <!--                                                                                    class="fa fa-plus"-->
                                                                    <!--                                                                                    aria-hidden="true"></i></a>-->
                                                                    <!--                                                                        </td>-->


                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </table>

                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
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
</div>
<?php
include "footer.php";
?>

