<?php
include "header.php";
$k=$_GET['id'];
$sq1=mysqli_query($con,"select *from equipments inner join equipment_request on equipments.eid=equipment_request.equipment inner join patient on equipment_request.patient=patient.pid where equipment_request.req_id='$k'");
$ro1=mysqli_fetch_array($sq1);
?>
<div class="header-advance-area">
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
                                    <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Patient Details</span>
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
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="profile-info-inner">

                    <div class="profile-details-hr">
                        <div class="form-group-inner">
                            <label>Equipment Name</label>
                            <input readonly class="form-control" value="<?php echo $ro1['e_name']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Patient Name</label>
                            <input readonly class="form-control" value="<?php echo $ro1['pname']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Mobile</label>
                            <input readonly class="form-control" value="<?php echo $ro1['mobile']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Gender</label>
                            <input readonly class="form-control" value="<?php echo $ro1['gender']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Date of Birth</label>
                            <input readonly class="form-control" value="<?php echo $ro1['dob']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Place</label>
                            <input readonly class="form-control" value="<?php echo $ro1['place']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Panchayath</label>
                            <input readonly class="form-control" value="<?php echo $ro1['panchayath']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Ward</label>
                            <input readonly class="form-control" value="<?php echo $ro1['ward']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Address</label>
                            <input readonly class="form-control" value="<?php echo $ro1['address']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>
                        <div class="form-group-inner">
                            <label>Disease</label>
                            <input readonly class="form-control" value="<?php echo $ro1['disease']?>" style="text-transform: capitalize;background-color:transparent;" />
                        </div>

                        <div class="form-group-inner">
                            <label>Equipment Stock</label>
                            <input readonly class="form-control" value="<?php echo $ro1['e_stock']?>" style="text-transform: capitalize;background-color:transparent;" />
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
