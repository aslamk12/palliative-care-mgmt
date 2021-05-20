<?php
session_start();
$aid=$_SESSION['aid'];
if(!$aid)
{
    header('location:logout.php');
}
include "../connection.php";

$eid=$_GET['eid'];
$del=mysqli_query($con,"delete from equipments where eid='$eid'");
if($del)
{
    echo "<script>alert('Deleted')</script>";
    echo "<script>window.location.href='add_facility.php'</script>";
}
?>