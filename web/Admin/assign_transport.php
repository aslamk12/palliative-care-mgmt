<?php
include "header.php";
$k=$_GET['id'];
$nm1=mysqli_query($con,"select * from patient inner join equipment_request on patient.pid=equipment_request.patient where equipment_request.req_id='$k' ");
while ($rw4=mysqli_fetch_array($nm1))
{
    $pname=$rw4['pname'];
    $pid=$rw4['pid'];
}
$nm2=mysqli_query($con,"select * from equipments inner join equipment_request on equipments.eid=equipment_request.equipment where equipment_request.req_id='$k' ");
while ($rw5=mysqli_fetch_array($nm2))
{
    $ename=$rw5['e_name'];
    $eid=$rw5['eid'];
}
$vol=mysqli_query($con,"select * from volunteer inner join login on volunteer.mobile=login.uname where login.status='approved'");

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
                                <li>Equipment</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Assign Trabsport</span></li>
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
                    <h4>Assign Transport</h4>

                    <div class="asset-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline13-list">
                                    <form method="post">
                                        <f class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <div class="form-group-inner">
                                                    <label>Patient ID</label>
                                                    <input readonly class="form-control" value="<?php echo $pid?>" style="text-transform: capitalize;background-color:transparent;" />
                                                </div>
                                                <div class="form-group-inner">
                                                    <label>Patient Name</label>
                                                    <input readonly class="form-control" value="<?php echo $pname?>" style="text-transform: capitalize;background-color:transparent;" />
                                                </div>
                                                <div class="form-group-inner">
                                                    <label>Equipment Name</label>
                                                    <input readonly class="form-control" value="<?php echo $ename?>" style="text-transform: capitalize;background-color:transparent;" />
                                                </div>
                                                <select name="volunteer"  class="form-control" id="select1">
                                                    <option disabled selected>~ Select Volunteer ~</option>
                                                    <?php while ($rw_vol=mysqli_fetch_array($vol)){ ?>
                                                        <option value="<?php echo $rw_vol[0]?>"><?php echo $rw_vol[1] ?></option>
                                                    <?php }?>

                                                </select>
                                                <br/>
                                                <br/>
                                                <center><button id="send" type="submit" name="assign" class="btn btn-primary waves-effect waves-light" style="text-transform: uppercase">ASSIGN</button></center>
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
if(isset($_POST['assign']))
{
    $volunteer=$_POST['volunteer'];

    $aDate = date('Y-m-d');
    $sts= 'assigned';


    $ins="insert into transport (equipment,patient,volunteer,request_id,tr_status,tr_assdate) values('$eid','$pid','$volunteer','$k','$sts','$aDate')";
    $sq=mysqli_query($con,$ins);
    if($sq)
    {
        $upt=mysqli_query($con,"update equipment_request set status='assigned' where req_id='$k'");

        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location.href='view_equiprequest.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='view_equiprequest.php'</script>";
    }
} ?>

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

