<?php
include "../connection.php";
$k=$_GET['volid'];
$sel=mysqli_query($con,"select * from login where uname='$k'");
while ($rw=mysqli_fetch_array($sel))
{
    $l_id=$rw['login_id'];
}
$upt=mysqli_query($con,"update login set status='rejected' where login_id='$l_id'");
if($upt)
{

    echo "<script>window.location.href='send_msg.php'</script>";
}
else
{
    echo "<script>alert('FAILED')</script>";
    echo "<script>window.location.href='manage_volunteer.php'</script>";
}
?>


