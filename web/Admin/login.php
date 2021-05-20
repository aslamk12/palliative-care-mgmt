<?php
//session_start();
include "../connection.php";
if(isset($_POST['sub']))
{
    $eml=$_POST['mail'];
    $pss=$_POST['Password'];

    $sel="select * from login where uname='$eml' and password='$pss'";
    $sq=mysqli_query($con,$sel);
    $count=mysqli_num_rows($sq);
    if($count==1)
    {
       /* $row=mysqli_fetch_array($sq);
        $aid=$row['aid'];
        $_SESSION['aid']=$aid;*/

        echo "<script>alert('Welcome Admin')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
    else{
        echo "<script>alert('Invalid Username or Password')</script>";
        echo "<script>window.location.href='../login/admin/index.php'</script>";

    }

}
?>