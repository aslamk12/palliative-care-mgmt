<?php
include "header.php";

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
                                <li>Patient</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">View Equipment Request</span></li>
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
                <div class="product-status-wrap">
                    <?php
                    $sq=mysqli_query($con,"select * from equipment_request where status='pending'");
                    if(mysqli_num_rows($sq)==0){
                        echo "<h2 style='margin-left: 35%;color:coral;font-family: Times;font-style: italic;font-size: 39px;'>No details to show</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                    }else {
                        ?>
                        <h4>Equipment Request</h4>

                        <div class="asset-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">

                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true"
                                                       data-search="true">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="id">No</th>

                                                        <th data-field="pname" data-editable="true">Patient Name</th>
                                                        <th data-field="mobile" data-editable="true">Mobile</th>
                                                        <th data-field="place" data-editable="true">Place</th>
                                                        <th data-field="place" data-editable="true">Panchayath</th>
                                                        <th data-field="ename" data-editable="true">Equipment Name</th>
                                                        <th data-field="viewmore">View More</th>
                                                        <th data-field="assign">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody style="text-transform: capitalize">
                                                    <?php
                                                    $i = 1;
                                                    $view = mysqli_query($con, "select *from equipments inner join equipment_request on equipments.eid=equipment_request.equipment inner join patient on equipment_request.patient=patient.pid where equipment_request.status='pending' ");
                                                    while ($row = mysqli_fetch_array($view)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $row['pname'] ?></td>
                                                            <td><?php echo $row['mobile'] ?></td>
                                                            <td><?php echo $row['place'] ?></td>
                                                            <td><?php echo $row['panchayath'] ?></td>
                                                            <td><?php echo $row['e_name'] ?></td>
                                                            <td>
                                                                <a href="viewmore_request.php?id=<?php echo $row['req_id'] ?>"
                                                                   data-toggle="tooltip" title="Edit"
                                                                   class="pd-setting-ed"><img src="img/viewmore.png"
                                                                                              style="height: 40px;width: 39px;margin-left: -9px;"></a>
                                                            </td>
                                                            <td>
                                                                <a href="assign_transport.php?id=<?php echo $row['req_id'] ?>"
                                                                   data-toggle="tooltip" title="Edit"
                                                                   class="pd-setting-ed"><img src="img/add.png"
                                                                                              style="height: 40px;width: 39px;margin-left: -9px;"></a>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
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
                <div class="product-status-wrap">

                    <h4>Assigned Equipment Requests</h4>

                    <div class="asset-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline13-list">

                                    <div class="sparkline13-graph">
                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                            <table id="table" data-toggle="table" data-pagination="true"
                                                   data-search="true">
                                                <thead>
                                                <tr>
                                                    <th data-field="id">No</th>
                                                    <th data-field="pname" data-editable="true">Patient Name</th>
                                                    <th data-field="mobile" data-editable="true">Mobile</th>
                                                    <th data-field="place" data-editable="true">Place</th>
                                                    <th data-field="panchayath" data-editable="true">Panchayath</th>
                                                    <th data-field="address" data-editable="true">Address</th>
                                                    <th data-field="ename" data-editable="true">Equipment Name</th>
                                                    <th data-field="vname" data-editable="true">Assigned Volunteer</th>
                                                    <th data-field="status" data-editable="true">Status</th>



                                                </tr>
                                                </thead>
                                                <tbody style="text-transform: capitalize">
                                                <?php
                                                $i = 1;
                                                $view = mysqli_query($con, "select *from patient inner join transport on patient.pid=transport.patient inner join equipments on  transport.equipment=equipments.eid inner join volunteer on transport.volunteer=volunteer.vid where transport.tr_status='assigned' ");
                                                while ($row = mysqli_fetch_array($view)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row['pname'] ?></td>
                                                        <td><?php echo $row['mobile'] ?></td>
                                                        <td><?php echo $row['place'] ?></td>
                                                        <td><?php echo $row['panchayath'] ?></td>
                                                        <td><?php echo $row['address'] ?></td>
                                                        <td><?php echo $row['e_name'] ?></td>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['tr_status'] ?></td>



                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <?php

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>


</div>


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


