<?php
include "header.php";
$k=$_GET['id'];
$nm=mysqli_query($con,"select * from patient where mobile='$k' ");
while ($rw4=mysqli_fetch_array($nm))
{
    $name=$rw4['pname'];
}
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
                                <li><span class="bread-blod">Assign Nurse</span></li>
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
                    <h4>Assign Nurse</h4>

                    <div class="asset-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline13-list">
                                    <form method="post">
                                        <f class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <div class="form-group-inner">
                                                    <label>Patient Name</label>
                                                    <input readonly class="form-control" value="<?php echo $name?>" style="text-transform: capitalize;background-color:transparent;" />
                                                </div>
                                                <select name="nurse"  class="form-control" id="select1">
                                                    <option disabled selected>~ Select Nurse ~</option>
                                                    <?php while ($rw_nur=mysqli_fetch_array($nurs)){ ?>
                                                        <option value="<?php echo $rw_nur[0]?>"><?php echo $rw_nur[1] ?></option>
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
    $nurse=$_POST['nurse'];

    $aDate = date('Y-m-d');
    $sts= 'assigned';
    $sel=mysqli_query($con,"select * from login where uname='$k' and type='patient'");
    while ($rw=mysqli_fetch_array($sel))
    {
        $l_id=$rw['login_id'];
    }
    $sel2=mysqli_query($con,"select * from patient where mobile='$k'");
    $rw1=mysqli_fetch_array($sel2);
    $patient=$rw1['pid'];

    $sel3=mysqli_query($con,"select * from assign_nurse where pid='$k'");
    $sq=mysqli_query($con,$sel);
    $count=mysqli_num_rows($sq);
    if(count==1) {
        $rw2 = mysqli_fetch_array($sel3);
        $sts1 = $rw2['ass_status'];
    }
    else{
        $sts1="";
    }
    if($sts1=='assigned')
    {
        echo "<script>alert('Already assigned')</script>";
        echo "<script>window.location.href='view_patient.php'</script>";
    }
    else {

        $ins = "insert into assign_nurse (nurse,patient,assigned_on,ass_status) values('$nurse','$patient','$aDate','$sts')";
        $sq = mysqli_query($con, $ins);
        if ($sq) {
            echo "<script>alert('SUCCESS')</script>";
            echo "<script>window.location.href='view_patient.php'</script>";
        } else {
            echo "<script>alert('FAILED')</script>";
            echo "<script>window.location.href='view_patient.php'</script>";
        }
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
