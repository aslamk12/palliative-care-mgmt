<?php
session_start();
$aid=$_SESSION['aid'];
if(!$aid)
{
    header('location:logout.php');
}
include "../connection.php";
$eid=$_GET['eid'];
$sq=mysqli_query($con,"select * from equipments where eid='$eid'");
$ro=mysqli_fetch_array($sq);

$old=$ro['image'];

if(isset($_POST['sub']))
{
    $name=$_POST['name'];
    $stock=$_POST['stock'];
    $date=$_POST['date'];
    $img = $_FILES['img']['name'];

    if ($img == "") {
        $new = $old;
    } else {
        $new = $img;
    }

    $sql = mysqli_query($con, "update equipments set e_name='$name',e_stock='$stock',e_date='$date',image='$new' WHERE eid='$eid'");
    if ($sql) {
        move_uploaded_file($_FILES['img']['tmp_name'], '../facility/'.$new);
        echo "<script>alert('Details Updated')</script>";
        echo "<script>window.location.href='add_facility.php'</script>";
    } else {
        echo "<script>alert('Failed to Update')</script>";
        echo "<script>window.location.href='add_facility.php'</script>";

    }

}
?>
