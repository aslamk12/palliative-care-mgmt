<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('vid'))) {

    $vid = $_POST['vid'];
    $status='pending';

    $stmt = $conn->prepare("SELECT assv_id,pid,pname,mobile,dob,gender,place,panchayath,ward,address FROM assign_volunteer inner join patient on assign_volunteer.patient=patient.pid where assign_volunteer.volunteer=? and assign_volunteer.ass_status=?");
    $stmt->bind_param("ss",$vid,$status);
    $stmt->execute();
    $stmt->bind_result( $assv_id,$pid,$pname,$mobile,$dob,$gender,$place,$panchayath,$ward,$address);
    $patients = array();
    while ($stmt->fetch()) {
        $temp = array();

        $temp['assv_id'] = $assv_id;
        $temp['pid'] = $pid;
        $temp['pname'] = $pname;
        $temp['pmobile'] = $mobile;
        $temp['pdob'] = $dob;
        $temp['pgender'] = $gender;
        $temp['pplace'] = $place;
        $temp['ppanchayath'] = $panchayath;   
        $temp['paddress'] = $address;        
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
