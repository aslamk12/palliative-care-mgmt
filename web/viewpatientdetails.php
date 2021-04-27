<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('pid'))) {

    $pid = $_POST['pid'];
    $status='pending';

    $stmt = $conn->prepare("SELECT pname,mobile,dob,gender,place,panchayath,ward,address,disease FROM patient where patient.pid=?");
    $stmt->bind_param("s",$pid);
    $stmt->execute();
    $stmt->bind_result( $pname,$mobile,$dob,$gender,$place,$panchayath,$ward,$address,$disease);
    $patients = array();
    while ($stmt->fetch()) {
        $temp = array();

        //$temp['assv_id'] = $assv_id;
        $temp['pid'] = $pid;
        $temp['pname'] = $pname;
        $temp['pmobile'] = $mobile;
        $temp['pdob'] = $dob;
        $temp['pgender'] = $gender;
        $temp['pplace'] = $place;
        $temp['ppanchayath'] = $panchayath;   
        $temp['paddress'] = $address;
        $temp['pdisease'] = $disease;        
        $temp['pward'] = $ward;      

        array_push($patients, $temp);
    }

    echo json_encode($patients);
}
else
{
    echo json_encode("Error");
}


function isTheseParametersAvailable($params)
{
    foreach($params as $param)
    {
        if (!isset($_POST[$param]))
        {
            return false;
        }
    }

    return true;
}
