<?php
include "header.php";
$sql=mysqli_query($con,"select * from revenue");
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
                                    <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Add Sponsorship</span>
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
                        <li class="active" style="margin-left: 299px"><a href="#description">Revenue</a></li>
                        <li><a href="#reviews"> View Details</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="" method="post" enctype="multipart/form-data" >
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
                                                        button{
                                                            width: 100px;
                                                        }
                                                    </style>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-left: 299px">

                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <input name="date" type="date" class="form-control" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Income</label>
                                                            <input name="income" type="number" class="form-control" placeholder="Income" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Expenditure</label>
                                                            <input name="expenditure" type="number" class="form-control" placeholder="Expenditure" required="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input name="descp" type="text" class="form-control" placeholder="Description" required="">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" name="sub" class="btn btn-primary waves-effect waves-light">Submit</button>
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
                                <?php
                                if(isset($_POST['sub']))
                                {
                                    $income=$_POST['income'];
                                    $expenditure=$_POST['expenditure'];
                                    $date=$_POST['date'];
                                    $descp=$_POST['descp'];
                                    $inc=(int)$income;
                                    $exp=(int)$expenditure;
                                    $total=$inc-$exp;


                                    $sql = mysqli_query($con, "insert into revenue(rv_date,rv_income,rv_expend,rv_descp,rv_total)VALUES ('$date','$income','$expenditure','$descp','$total')");
                                    if ($sql) {
                                        echo "<script>alert('Details Added')</script>";
                                        echo "<script>window.location.href='add_revenue.php'</script>";
                                    } else {
                                        echo "<script>alert('Error,Try again')</script>";
                                        echo "<script>window.location.href='add_revenue.php'</script>";

                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="product-status-wrap">
                                                            <h4>Revenue</h4>

                                                            <div class="asset-inner">
                                                                <table>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Date</th>
                                                                        <th>Income</th>
                                                                        <th>Expenditure</th>
                                                                        <th>Description</th>
                                                                        <th>Total</th>
                                                                        <th>Delete</th>
                                                                    </tr>
                                                                    <?php
                                                                    $i=1;
                                                                    while($ro=mysqli_fetch_array($sql)){
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $i ?></td>
                                                                            <td><?php echo date('d M Y',strtotime($ro['rv_date'])) ?></td>
                                                                            <td><?php echo $ro['rv_income'] ?></td>
                                                                            <td><?php echo $ro['rv_expend'] ?></td>
                                                                            <td><?php echo $ro['rv_descp'] ?></td>
                                                                            <td><?php echo $ro['rv_total'] ?></td>
                                                                            <td>
                                                                                <a href="delete_revenue.php?rvid=<?php echo $ro['rv_id'] ?>" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 40px"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                        $i++;    }  ?>
                                                                </table>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>



