<?php
//session_start();
//$aid=$_SESSION['aid'];
//if(!$aid)
//{
//    header('location:logout.php');
//}
include "../connection.php";

$bd_id=$_GET['bdid'];
$del=mysqli_query($con,"delete from blooddonor where bd_id='$bd_id'");
if($del)
{
    echo "<script>alert('Deleted')</script>";
    echo "<script>window.location.href='add_blooddonor.php'</script>";
}
?>
