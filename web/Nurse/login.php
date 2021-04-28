<?php
session_start();
include "../connection.php";
if(isset($_POST['sub'])) {
    $type ='nurse';
    $mobile = $_POST['mobile'];
    $pss = $_POST['password'];



        $sel = "select * from login where uname='$mobile' and password='$pss' and type='$type'";
        $sq = mysqli_query($con, $sel);
        $count = mysqli_num_rows($sq);
        if ($count == 1) {
            $row = mysqli_fetch_array($sq);
            $nmob = $mobile;
            $_SESSION['nrs_mob'] = $nmob;

            echo "<script>alert('SUCCESS')</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Error')</script>";
            echo "<script>window.location.href='../login/staff/index.php'</script>";

        }

}
?>
