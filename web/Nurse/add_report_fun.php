<?php
session_start();
$nmob=$_SESSION['nrs_mob'];
if(!$nmob)
{
    header('location:logout.php');
}
//$pid=$_GET['p'];
$pid=$_GET['pid'];
include "../connection.php";
$nm=mysqli_query($con,"select * from nurse where mobile='$nmob' ");
while ($rw4=mysqli_fetch_array($nm))
{
    $nid=$rw4['nid'];
}
if(isset($_POST['sub']))
{
    $medicine=$_POST['medicine'];
    $report=$_POST['report'];
    $now=date('Y-m-d');
    $cm=date('M');

    $chk=mysqli_query($con,"select * from work_report where nurse='$nid' and patient='$pid' and date='$now'");
    if(mysqli_num_rows($chk)>3)
    {
        echo "<script>alert('Already added')</script>";
        echo "<script>window.location.href='view_patientlist.php'</script>";
    }
    else {
        $sq = mysqli_query($con, "insert into work_report(nurse,patient,date,medicines,report) values('$nid','$pid','$now','$medicine','$report')");
        if ($sq) {
            echo "<script>alert('Report Added')</script>";
            echo "<script>window.location.href='view_patientlist.php'</script>";
        }
    }
}
?>