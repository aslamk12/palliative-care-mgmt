<?php
include "header.php";

$nurs=mysqli_query($con,"select * from nurse inner join login on nurse.mobile=login.uname where login.status='approved'");

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
                                <li><span class="bread-blod">View report</span></li>
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
                    <h4>View report</h4>

                    <div class="asset-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline13-list">
                                    <form action="view_rep_nurse.php">
                                        <f class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <div class="form-group-inner">
                                                    <label>Select Nurse</label>
                                                    <select name="nurse"  class="form-control" id="select2">
                                                        <option disabled selected>~ Select Nurse ~</option>
                                                        <?php while ($rw_nur=mysqli_fetch_array($nurs)){ ?>
                                                            <option value="<?php echo $rw_nur[0]?>"><?php echo $rw_nur[1] ?></option>
                                                        <?php }?>

                                                    </select>
                                                </div>


                                                <br/>
                                                <br/>
                                                <center><button id="select" type="submit" name="select" class="btn btn-primary waves-effect waves-light" style="text-transform: uppercase">SELECT</button></center>
                                            </div>
                                    </form>
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
<?php

