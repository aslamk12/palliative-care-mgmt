<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('vid'))) {

    $vid = $_POST['vid'];
    $status='pending';

    $stmt = $conn->prepare("SELECT assv_id,pid,pname,gender,disease FROM assign_volunteer inner join patient on assign_volunteer.patient=patient.pid where assign_volunteer.volunteer=? and assign_volunteer.ass_status=?");
    $stmt->bind_param("ss",$vid,$status);
    $stmt->execute();
    $stmt->bind_result( $assv_id,$pid,$pname,$gender,$disease);
    $patients = array();
    while ($stmt->fetch()) {
        $temp = array();

        $temp['assv_id'] = $assv_id;
        $temp['pid'] = $pid;
        $temp['pname'] = $pname;
        $temp['pgender'] = $gender;
        $temp['pdisease'] = $disease;




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
