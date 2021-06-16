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
                                    <li><span class="bread-blod">View Balance Sheet</span>
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
                        <li class="active" style="margin-left: 299px"><a href="#description">View Total Revenue</a></li>
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
                                                            <input name="date" type="month" class="form-control" required="">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="sub" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $inc='';
                                                        $exp='';
                                                        $tot='';
                                                        if(isset($_POST['sub']))
                                                        {

                                                            $date=$_POST['date'];
                                                            //$next = date("Y-m", strtotime("+1 month",$date));

                                                            $sel=mysqli_query($con,"select sum(rv_income),sum(rv_expend),sum(rv_total) from revenue where rv_date LIKE'$date%'");
                                                            while ($rw=mysqli_fetch_array($sel))
                                                            {
                                                                $inc=$rw[0];
                                                                $exp=$rw[1];
                                                                $tot=$rw[2];
                                                            }

                                                        }
                                                        ?>

                                                        <div class="form-group">
                                                            <label>Income</label>
                                                            <input readonly class="form-control" value="<?php echo $inc?>" style="text-transform: capitalize;background-color:transparent;" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Expenditure</label>
                                                            <input readonly class="form-control" value="<?php echo $exp?>" style="text-transform: capitalize;background-color:transparent;" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Total</label>
                                                            <input readonly class="form-control" value="<?php echo $tot?>" style="text-transform: capitalize;background-color:transparent;" />
                                                        </div>
                                            </form>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                    </div>
                                                </div>


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
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="product-status-wrap">
                                                            <h4>Balance Sheet</h4>

                                                            <?php
                                                            if(isset($_POST['sub']))
                                                            {

                                                                $date=$_POST['date'];
                                                                $sel=mysqli_query($con,"select * from revenue where rv_date between '$date-01' and '$date-31' ");
//


                                                            ?>

                                                            <div class="asset-inner">
                                                                <table>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Date</th>
                                                                        <th>Income</th>
                                                                        <th>Expenditure</th>
                                                                        <th>Description</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                    <?php
                                                                    $i=1;
                                                                    while($ro=mysqli_fetch_array($sel)){
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $i ?></td>
                                                                            <td><?php echo date('d M Y',strtotime($ro['rv_date'])) ?></td>
                                                                            <td><?php echo $ro['rv_income'] ?></td>
                                                                            <td><?php echo $ro['rv_expend'] ?></td>
                                                                            <td><?php echo $ro['rv_descp'] ?></td>
                                                                            <td><?php echo $ro['rv_total'] ?></td>

                                                                        </tr>
                                                                        <?php
                                                                        $i++;    }  }?>
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



