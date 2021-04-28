<?php
include "header.php";
$k=$_GET['id'];
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
                                <li>Patient</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Assign Volunteer</span></li>
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
                        <h4>Assign Volunteer</h4>

                        <div class="asset-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        <form method="post">
                                            <f class="sparkline13-graph">
                                              <div class="datatable-dashv1-list custom-datatable-overright">
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
    $sts= 'pending';
    $sel=mysqli_query($con,"select * from login where uname='$k' and type='patient'");
    while ($rw=mysqli_fetch_array($sel))
    {
        $l_id=$rw['login_id'];
    }
    $sel2=mysqli_query($con,"select * from patient where mobile='$k'");
    $rw1=mysqli_fetch_array($sel2);
    $patient=$rw1['pid'];
    $ins="insert into assign_volunteer (volunteer,patient,assigned_on,ass_status) values('$volunteer','$patient','$aDate','$sts')";
    $sq=mysqli_query($con,$ins);
    if($sq)
    {
        $upt=mysqli_query($con,"update login set status='assigned' where login_id='$l_id'");

        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location.href='view_patient.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='view_patient.php'</script>";
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
<?php
if(isset($_POST['assign']))
{
    $volunteer=$_POST['volunteer'];
    $aDate = date('Y-m-d');
    $sel=mysqli_query($con,"select * from login where uname='$k' and type='patient'");
    while ($rw=mysqli_fetch_array($sel))
    {
        $l_id=$rw['login_id'];
    }
    $sel2=mysqli_query($con,"select * from patient where uname='$k'");
    while ($rw=mysqli_fetch_array($sel))
    {
        $patient=$rw['pid'];
    }
    $sq=mysqli_query($con,"insert into assign_volunteer (volunteer,patient,assigned_on) values('$volunteer','$patient','$aDate')");
    if($sq)
    {
        $upt=mysqli_query($con,"update login set status='assigned' where login_id='$l_id'");

        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location.href='view_patient.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='view_patient.php'</script>";
    }
} ?>
