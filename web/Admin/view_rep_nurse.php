<?php
include "header.php";

$n=$_GET['nurse'];

?>
<!-- Mobile Menu end -->
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
                                <li><a href="view_facility.php">Report</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Nurse</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php
                $view1=mysqli_query($con,"SELECT * FROM nurse INNER JOIN work_report ON nurse.nid=work_report.nurse inner join patient on work_report.patient=patient.pid WHERE nurse.nid='$n'");
                $num1=mysqli_num_rows($view1);
                if($num1==0) {
                    echo "<h1 style='margin-left: 15%;margin-top: 5%;color:darkgreen;font-size: 2.5pc;font-family: initial;'>No Reports to show </h1><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                }else{
                    $rw=mysqli_fetch_array($view1);
                    ?>
                    <div class="product-status-wrap">
                        <h4>Report of <p style="text-transform: capitalize;margin-left: 164px;margin-top: -21px;"><?php echo $rw['name'] ?></p></h4>

                        <div class="asset-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">

                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="id">#</th>
                                                        <th data-field="patient" data-editable="true">Patient</th>
                                                        <th data-field="prescription" data-editable="true">Prescription</th>
                                                        <th data-field="report" data-editable="true">Report</th>
                                                        <th data-field="date" data-editable="true">Reported Date</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody style="text-transform: capitalize">
                                                    <?php
                                                    $i=1;
                                                    $view=mysqli_query($con,"SELECT * FROM nurse INNER JOIN work_report ON nurse.nid=work_report.nurse inner join patient on work_report.patient=patient.pid WHERE nurse.nid='$n'");
                                                    while($row1=mysqli_fetch_array($view))
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $row1['pname'] ?> <p style="text-transform: none;margin-left: 52px;margin-top: -19px;">in ward <?php echo $row1['ward'] ?></p></td>
                                                            <td><?php echo $row1['medicines'] ?></td>
                                                            <td><?php echo $row1['report'] ?></td>
                                                            <td><?php echo date('d/m/y',strtotime($row1['date'])) ?></td>
                                                            <td></td>

                                                        </tr>
                                                        <?php
                                                        $i++;    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <a href="view_reports.php">
                                                <img src="img/Back.png" style="float: right">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <?php
                }
                ?>
            </div>

        </div>
    </div>
</div>

<?php
include "footer.php";
?>



<!-- main JS
    ============================================ -->
<!--<script src="js/main.js"></script>-->
<!-- tawk chat JS
 data table JS
    ============================================ -->
<script src="js/data-table/bootstrap-table.js"></script>
<script src="js/data-table/tableExport.js"></script>
<script src="js/data-table/data-table-active.js"></script>
<script src="js/data-table/bootstrap-table-editable.js"></script>
<script src="js/data-table/bootstrap-editable.js"></script>
<script src="js/data-table/bootstrap-table-resizable.js"></script>
<script src="js/data-table/colResizable-1.5.source.js"></script>
<script src="js/data-table/bootstrap-table-export.js"></script>
<!--  editable JS
    ============================================ -->
<script src="js/editable/jquery.mockjax.js"></script>
<script src="js/editable/mock-active.js"></script>
<script src="js/editable/select2.js"></script>
<script src="js/editable/moment.min.js"></script>
<script src="js/editable/bootstrap-datetimepicker.js"></script>
<script src="js/editable/bootstrap-editable.js"></script>
<script src="js/editable/xediable-active.js"></script>
<!-- Chart JS
    ============================================ -->
<!--<script src="js/tawk-chat.js"></script>-->
</body>

</html>
