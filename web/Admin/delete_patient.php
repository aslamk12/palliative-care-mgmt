<?php
include "../connection.php";
$k=$_GET['id'];
$sel=mysqli_query($con,"select * from login where uname='$k'");
while ($rw=mysqli_fetch_array($sel))
{
    $l_id=$rw['login_id'];
}
$upt=mysqli_query($con,"delete from login where login_id='$l_id'");
$upt1=mysqli_query($con,"delete from patient where mobile='$k'");
if($upt&&$upt1)
{
    echo "<script>alert('Deleted')</script>";
    echo "<script>window.location.href='view_patient.php'</script>";
}
else
{
    echo "<script>alert('FAILED')</script>";
    echo "<script>window.location.href='view_patient.php'</script>";
}
?>