<?php
//session_start();
//$aid=$_SESSION['aid'];
//if(!$aid)
//{
//    header('location:logout.php');
//}
include "../connection.php";

if(isset($_POST['sub']))
{
    $name=$_POST['name'];
    $date=$_POST['date'];
    $gender=$_POST['gender'];
    $place=$_POST['place'];
    $mobile=$_POST['contact'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $type='nurse';
    $status='approved';


        $sq=mysqli_query($con,"select * from nurse WHERE mobile='$mobile'");
        $count=mysqli_num_rows($sq);
        if($count==0) {
            $lgn = mysqli_query($con, "insert into login( uname, password, type, status)VALUES ('$mobile','$password','$type','$status')");
            $sql = mysqli_query($con, "insert into nurse( name, mobile, gender, dob, place, address)VALUES ('$name','$mobile','$gender','$date','$place','$address')");
            if($lgn) {
                if ($sql) {
                    echo "<script>alert('Nurses Added')</script>";
                    echo "<script>window.location.href='add_nurse.php'</script>";
                } else {
                    echo "<script>alert('Error,Try again')</script>";
                    echo "<script>window.location.href='add_nurse.php'</script>";
                }
            }
        }else{
            echo "<script>alert('Already exist')</script>";
            echo "<script>window.location.href='add_nurse.php'</script>";
        }
    }else{
        echo "<script>alert('Invalid photo')</script>";
        echo "<script>window.location.href='add_nurse.php'</script>";

}
?>
