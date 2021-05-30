<?php
include "header.php";
$sql=mysqli_query($con,"select * from tutorials");
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
                                    <li><span class="bread-blod">Add Tutorials</span>
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
                        <li class="active" style="margin-left: 299px"><a href="#description">Tutorilas</a></li>
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
                                                            <label>Name</label>
                                                            <input name="name" type="text" class="form-control" placeholder="Name" required="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>url</label>
                                                            <input name="url" type="text" class="form-control" placeholder="URL" maxlength="" onkeypress="javascript:return isNumber(event)" required="">
                                                        </div>

<!--                                                        <div class="form-group res-mg-t-15">-->
<!--                                                            <label>image</label>-->
<!--                                                            <input name="img" type="file" class="form-control" required="">-->
<!--                                                        </div>-->
                                                        <div class="form-group">
                                                            <label>description</label>
                                                            <input name="description" type="text" class="form-control" placeholder="Description" required="">
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
                                        <?php
                                        if(isset($_POST['sub']))
                                        {
                                        $name=$_POST['name'];
                                        $url=$_POST['url'];
                                        $descp=$_POST['description'];

//                                            $Image=$_FILES['img']['name'];
//                                            $images = explode('.',$Image);
//                                            $extensionImage=end($images);
//                                            $allowedExtsImage = array("jpeg", "jpg", "png");
//                                            $time = Time();
//                                            $certificate=$time.'.'.$extensionImage;
//
//                                            if(in_array($extensionImage, $allowedExtsImage))
//                                            {
//                                                move_uploaded_file($_FILES['img']['tmp_name'], 'tutorials/'.$certificate);
//                                                $Image=$_FILES['img']['name'];
//                                                $images = explode('.',$Image);
//                                                $extensionImage=end($images);
//                                                $allowedExtsImage = array("jpeg", "jpg", "png");
//                                                $time = Time();
//                                                $tutorial_image=$time.'.'.$extensionImage;

                                                    $cat = mysqli_query($con, "insert into tutorilas(tut_name,tut_url,tut_description,image)values('$name','$url','$descp','')");
                                                    if ($cat) {
                                                        echo "<script>alert('SUCCESS')</script>";
                                                        echo "<script>window.location.href='add_tutorials.php'</script>";
                                                    } else {
                                                        echo "<script>alert('FAILED')</script>";
                                                        echo "<script>window.location.href='add_tutorials.php'</script>";
                                                    }
                                                //}

//                                            else
//                                            {
//                                                echo "<script>alert('Only jpg/ jpeg format allowed')</script>";
//                                                echo "<script>window.location.href='add_tutorials.php'</script>";
//                                            }
                                        }
                                        ?>
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
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="product-status-wrap">
                                                            <h4>Tutorial List</h4>

                                                            <div class="asset-inner">
                                                                <table>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Image</th>
                                                                        <th>Name of Tutorials</th>
                                                                        <th>URL</th>
                                                                        <th>Description</th>
                                                                        <th>Delete</th>
                                                                    </tr>
                                                                    <?php
                                                                    $i=1;
                                                                    while($ro=mysqli_fetch_array($sql)){
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $i ?></td>
                                                                            <td><img src="tutorials/<?php echo $ro['image'] ?>" alt="" /></td>
                                                                            <td><?php echo $ro['tut_name'] ?></td>
                                                                            <td><?php echo $ro['tut_url'] ?></td>

                                                                            <td><?php echo $ro['tut_description'] ?></td>

                                                                            <td>
                                                                                <a href="delete_facility.php?eid=<?php echo $ro['tut_id'] ?>" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 40px"></i></a>
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


