<?php
include "header.php";
$sql=mysqli_query($con,"select * from nurse where nrs_id='$nid'");
$row=mysqli_fetch_array($sql);
?>
        <!-- Mobile Menu end -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list single-page-breadcome">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="breadcome-heading">

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <ul class="breadcome-menu">
                                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Profile</span>
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
    <!-- Password meter Start -->
    <div class="password-meter-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" style="margin-left: 245px;">
                    <div class="sparkline12-list responsive-mg-b-30" style="padding: 50px;">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Profile <span class="password-mt-none"></span></h1>
                            </div>
                        </div>
                        <form method="post" action="update_profile.php">
                            <style>
                                .pull-right {

                                    float: left !important;

                                }
                            </style>
                            <div class="sparkline12-graph">
                                <div class="form-group-inner">
                                    <label>Ward</label>
                                    <select name="ward" class="form-control">
                                        <?php
                                        for($i=1;$i<=25;$i++) {
                                            if ($i == $row['wardno']) {
                                                ?>
                                                <option value="<?php echo $i ?>" selected><?php echo $i ?></option>

                                            <?php
                                            } else {
                                                ?>

                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group-inner">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $row['nrs_name'] ?>" />
                                </div>

                                <div class="form-group-inner">
                                    <label>DOB</label>
                                    <input type="date" name="dob" class="form-control" value="<?php echo $row['nrs_dob'] ?>" max="<?php echo date('Y-12-31',strtotime('-18year')) ?>"/>
                                </div>

                                <div class="form-group-inner">
                                    <label>Gender</label><br>
                                    <?php
                                    if($row['nrs_gender']=='Female') {
                                        ?>
                                        Male :<input type="radio" class="radio-checked" value="Male" name="gender">
                                        Female :<input type="radio" class="radio-checked" value="Female" checked name="gender">
                                    <?php
                                    }else {
                                        ?>
                                        Male :<input type="radio" class="radio-checked" value="Male" checked name="gender">
                                        Female :<input type="radio" class="radio-checked" value="Female" name="gender">
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="form-group-inner">
                                    <label>Place</label>
                                    <input type="text" class="form-control" value="<?php echo $row['nrs_place'] ?>" name="place"/>
                                </div>

                                <div class="form-group-inner">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" value="<?php echo $row['nrs_contact'] ?>" name="contact" />
                                </div>

                                <div class="form-group-inner">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="<?php echo $row['nrs_email'] ?>" name="email" />
                                </div>


                                <div id="pwd-container1">

                                    <div class="form-group">
                                        <label for="password1">Password</label>
                                        <input type="password" class="form-control example1" id="password1" placeholder="Password" value="<?php echo $row['nrs_password'] ?>" name="password">
                                        <button type="button" id="eye" style="background-color:white;border-color:transparent;margin-left: 455px;margin-top: 0px;">
                                            <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" />
                                        </button>
                                        <script>
                                            function show() {
                                                var p = document.getElementById('password1');
                                                p.setAttribute('type', 'text');
                                            }

                                            function hide() {
                                                var p = document.getElementById('password1');
                                                p.setAttribute('type', 'password');
                                            }

                                            var pwShown = 0;

                                            document.getElementById("eye").addEventListener("click", function () {
                                                if (pwShown == 0) {
                                                    pwShown = 1;
                                                    show();
                                                } else {
                                                    pwShown = 0;
                                                    hide();
                                                }
                                            }, false);
                                        </script>
                                        <p style="margin-left: 27%;margin-top: -19px;font-style: italic;color:chocolate;">Its better to change the password for the security *</p>
                                    </div>

                                    <div class="form-group">
                                        <div class="pwstrength_viewport_progress"></div>
                                    </div>
                                </div>

                                <div class="login-btn-inner">
                                    <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit" name="update">Update Profile</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Password meter End-->
    <?php
    include "footer.php";
    ?>


<!-- mCustomScrollbar JS
    ============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="js/metisMenu/metisMenu.min.js"></script>
<script src="js/metisMenu/metisMenu-active.js"></script>
<!-- pwstrength JS
    ============================================ -->
<script src="js/password-meter/pwstrength-bootstrap.min.js"></script>
<script src="js/password-meter/zxcvbn.js"></script>
<script src="js/password-meter/password-meter-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="js/tab.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>
</body>

</html>