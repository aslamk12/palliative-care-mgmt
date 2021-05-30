<?php
session_start();
$nmob=$_SESSION['nrs_mob'];
if(!$nmob)
{
    header('location:logout.php');
}
include "../connection.php";

$z=mysqli_query($con,"select * from nurse WHERE mobile='$nmob'");
$rz=mysqli_fetch_array($z);
//$z1=mysqli_query($con,"select * from login WHERE mobile='$nmob'");
//$sz=mysqli_fetch_array($z1);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $place = $_POST['place'];
    $password = $_POST['password'];
    $address = $_POST['address'];


    $update = "update nurse set name='$name',gender='$gender',dob='$dob',place='$place',address='$address' WHERE mobile='$nmob'";
    $result = mysqli_query($con, $update);
    $update1 = "update login set password='$password' WHERE mobile='$nmob'";
    $result1 = mysqli_query($con, $update1);
    if ($result) {
        if ($result1) {

            echo "<script>alert('Profile Updated')</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Error')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
}

?>
