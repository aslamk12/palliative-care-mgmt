<?php
include "header.php";
$k=$_GET['volid'];
$nm=mysqli_query($con,"select * from volunteer where mobile='$k' ");
while ($rw4=mysqli_fetch_array($nm))
{
    $name=$rw4['name'];
}
$sel=mysqli_query($con,"select * from login where uname='$k'");
while ($rw=mysqli_fetch_array($sel))
{
    $l_id=$rw['login_id'];
}
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
                                <li>Volunteer</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Send Message</span></li>
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
                    <h4>Send Message</h4>

                    <div class="asset-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline13-list">
                                    <form method="post">
                                        <f class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <div class="form-group-inner">
                                                    <label>Volunteer Name</label>
                                                    <input readonly class="form-control" value="<?php echo $name?>" style="text-transform: capitalize;background-color:transparent;" />
                                                </div>
                                                <div class="form-group-inner">
                                                    <label>Volunteer Contact</label>
                                                    <input name="contact" type="text" class="form-control" value="<?php echo $k?>" placeholder="" required="">
<!--                                                    <input readonly class="form-control" name="contact" value="--><?php //echo $k?><!--" style="text-transform: capitalize;background-color:transparent;" />-->
                                                </div>
                                                <div class="form-group-inner">
                                                    <label> Message </label>
                                                    <input name="message" type="text" class="form-control" placeholder="Message" required="">
                                                </div>

                                                <br/>
                                                <br/>
                                                <center><button id="send" type="submit" name="send" class="btn btn-primary waves-effect waves-light" style="text-transform: uppercase">SEND</button></center>
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
if(isset($_POST['send'])) {
    $contact = $_POST['contact'];
    $msg = $_POST['message'];
    $upt=mysqli_query($con,"update login set status='rejected' where login_id='$l_id'");
    if($upt)
    {
        $api_url = 'https://www.fast2sms.com/dev/bulkV2?authorization=f5z8DAGiS7Q0exVjqrKvtnOo6Wg4RXdECJL3YIZmFpT2wNa9ku8g6EU1CdXO4JB90INDYaPRxcWflnT5&route=q&message='.rawurlencode($msg).'&language=english&flash=0&numbers='.$contact;
        $send = file_get_contents($api_url);
        echo "<script>window.location.href='manage_volunteer.php'</script>";
    }
    else
    {
        echo "<script>alert('FAILED')</script>";
        echo "<script>window.location.href='manage_volunteer.php'</script>";
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


