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
                                <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Add Nurse</span>
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
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Add Nurse</a></li>
                        <li><a href="#reviews"> View Nurse</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="review-content-section">
                                        <form method="post" id="add-department" action="add_nurse_fun.php" class="add-department" autocomplete="off" enctype="multipart/form-data">
                                            <div class="row">
                                                <style>
                                                    label{
                                                        text-transform: capitalize;
                                                    }
                                                    .form-control {
                                                        background-color: #FFFFFF;
                                                        background-image: none;
                                                        border: 1px solid #e5e6e7;
                                                        border-radius: 1px;
                                                        color: inherit;
                                                        display: block;
                                                        padding: 6px 12px;
                                                        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                                                        width: 100%;
                                                        height: 40px;
                                                        box-shadow: none;
                                                        margin-left: 100px;
                                                        margin-top: -24px;
                                                    }
                                                    .add-department .form-group {
                                                        margin: 17px 5px;
                                                    }
                                                </style>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


                                                    <div class="form-group">
                                                        <label>full name</label>
                                                        <input name="name" type="text" class="form-control" placeholder="Name" style="text-transform: capitalize">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>date of birth</label>
                                                        <input name="date" type="date" class="form-control" max="<?php echo date('Y-01-01',strtotime('-18year')) ?>" required="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        Male &nbsp;&nbsp;<input name="gender" type="radio"  value="Male">&nbsp;&nbsp;&nbsp;&nbsp;
                                                        Female &nbsp;&nbsp;<input name="gender" type="radio" value="Female" checked>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>place</label>
                                                        <input name="place" type="text" class="form-control" placeholder="Place" required="" style="text-transform: capitalize">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>contact</label>
                                                        <input name="contact" type="text" onkeypress="javascript:return isNumber(event)" maxlength="10" i class="form-control" placeholder="Contact" required="" style="text-transform: capitalize">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input name="address" type="text" class="form-control" placeholder="address" required="" style="text-transform: capitalize">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>password</label>
                                                        <input name="password" type="text" class="form-control" placeholder="Password" value="12345678" readonly style="background-color: transparent">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit" name="sub" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        <script>
                                            function isNumber(evt) {
                                                var iKeyCode = (evt.which) ? evt.which : evt.keyCode
                                                if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                                                    return false;

                                                return true;
                                            }
                                        </script>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <style>
                                    .datatable-dashv1-list .form-control {
                                        height: 35px;
                                        width: 250px;
                                    }
                                    .pull-right {
                                        margin-left: 15px;
                                    }
                                </style>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php
                                    $sq=mysqli_query($con,"select * from nurse");
                                    if(mysqli_num_rows($sq)==0){
                                        echo "<h2 style='margin-left: 35%;color:crimson;font-family: Times;font-style: italic;font-size: 39px;'>No details to show</h2><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                                    }else {
                                        ?>
                                        <div class="sparkline13-list">
                                            <div class="sparkline13-hd">
                                                <div class="main-sparkline13-hd">
                                                    <h1>Nurse <span class="table-project-n">Details</span> Table</h1>
                                                </div>
                                                <div class="container">
                                                    <div class="row">
                                                        <table id="table" data-toggle="table" data-pagination="true">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Contact</th>
                                                                <th>Gender</th>
                                                                <th>Date of birth</th>
                                                                <th>Place</th>
                                                                <th>Address</th>
                                                                <th>&nbsp;</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody style="text-transform: capitalize">
                                                            <?php
                                                            $i = 1;
                                                            $view = mysqli_query($con, "select * from nurse");
                                                            while ($row = mysqli_fetch_array($view)) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $i ?></td>
                                                                    <td><?php echo $row['name'] ?></td>
                                                                    <td><?php echo $row['mobile'] ?></td>
                                                                    <td><?php echo $row['gender'] ?></td>
                                                                    <td><?php echo $row['dob'] ?></td>
                                                                    <td><?php echo $row['place'] ?></td>
                                                                    <td><?php echo $row['address'] ?></td>
                                                                    <td>
                                                                        <a href="delete_nurse.php?fid=<?php echo $row['nrs_id'] ?>"
                                                                           data-toggle="tooltip" title="Trash"
                                                                           class="pd-setting-ed"><i class="fa fa-trash-o"
                                                                                                    aria-hidden="true"
                                                                                                    style="font-size: 30px"></i></a>

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
<?php
include "footer.php";
?>
<!-- data table JS
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