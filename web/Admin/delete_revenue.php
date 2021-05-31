<?php
//session_start();
//$aid=$_SESSION['aid'];
//if(!$aid)
//{
//    header('location:logout.php');
//}
include "../connection.php";

$rv_id=$_GET['rvid'];
$del=mysqli_query($con,"delete from revenue where rv_id='$rv_id'");
if($del)
{
    echo "<script>alert('Deleted')</script>";
    echo "<script>window.location.href='add_revenue.php'</script>";
}
?>

