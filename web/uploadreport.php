<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    require_once 'DBconnect.php';
    
    $image = $_POST['image'];
    $vid = $_POST['vid'];
    $pid = $_POST['pid'];
    $assv_id = $_POST['assv_id'];
    $disease = $_POST['disease'];
    $medicines = $_POST['medicines'];
    $descp = $_POST['descp'];

    $img_no = 1;

    $file_name = $pid . '_PATIENT_REPORT_' . $img_no;

    $path = "UPLOADS/$file_name.jpg";

    $actual_path = "http://192.168.42.232/santhwanam/$path";

    
    $sql = "insert into medical_report(pid,vid,disease,medicines,description,report_image) values ('$pid','$vid','$disease','$medicines','$descp','$actual_path') ";
        if (mysqli_query($conn, $sql)) {
            file_put_contents($path, base64_decode($image));
            echo "Successfully uploaded.";
            $img_no++;
        }
    

    mysqli_close($conn);
}
else
{
    echo "Error";
}
