<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('pid','pmobile'))) {

    $mobile = $_POST['pmobile'];
    $status='approved';
    $type='patient';
    $pid='pid';

    $stmt = $conn->prepare("UPDATE  login SET status = ? WHERE uname = ? ");
    $stmt->bind_param("ss",$status,$mobile);
    
if ($stmt->execute()){
    $stmt = $conn->prepare("SELECT pid FROM patient where patient.mobile=?");
    $stmt->bind_param("s",$mobile);
    $stmt->execute();
    $stmt->bind_result( $pid);
    $patients = array();
    while ($stmt->fetch()) {
        $temp = array();

        
        $temp['pid'] = $pid; 

        array_push($patients, $temp);
    }

    echo json_encode($patients);
}
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
