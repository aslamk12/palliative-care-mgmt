<?php
//session_start();
//$aid=$_SESSION['aid'];
//if(!$aid)
//{
//    header('location:logout.php');
//}
include "../connection.php";

$sp_id=$_GET['spid'];
$del=mysqli_query($con,"delete from sponsorship where sp_id='$sp_id'");
if($del)
{
    echo "<script>alert('Deleted')</script>";
    echo "<script>window.location.href='add_blooddonor.php'</script>";
}
?>

