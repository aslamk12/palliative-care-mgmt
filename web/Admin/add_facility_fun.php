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
    $stock=$_POST['stock'];
    $date=$_POST['date'];
    $descp=$_POST['description'];

    $Image=$_FILES['img']['name'];
    $images = explode('.',$Image);
    $extensionImage=end($images);
    $allowedExtsImage = array("jpeg", "jpg", "png");
    $time = Time();
    $certificate=$time.'.'.$extensionImage;

    if(in_array($extensionImage, $allowedExtsImage))
    {
        move_uploaded_file($_FILES['img']['tmp_name'], '../facility/'.$certificate);
        $Image=$_FILES['img']['name'];
        $images = explode('.',$Image);
        $extensionImage=end($images);
        $allowedExtsImage = array("jpeg", "jpg", "png");
        $time = Time();
        $facility_image=$time.'.'.$extensionImage;

        $sql = mysqli_query($con, "insert into equipments(e_name,e_stock,e_date,image,description)VALUES ('$name','$stock','$date','$facility_image','$descp')");
        if ($sql) {
            echo "<script>alert('Details Added')</script>";
            echo "<script>window.location.href='add_facility.php'</script>";
        } else {
            echo "<script>alert('Error,Try again')</script>";
            echo "<script>window.location.href='add_facility.php'</script>";

        }
    }
    else{
        echo "<script>alert('Invalid image')</script>";
        echo "<script>window.location.href='add_facility.php'</script>";
    }
}
?>
