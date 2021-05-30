<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('tr_id','vid'))) {

    $tr_id = $_POST['tr_id'];
    $status='confirmed';
    
    $vid='vid';

    $stmt = $conn->prepare("UPDATE  transport SET tr_status = ? WHERE tid = ? ");
    $stmt->bind_param("ss",$status,$tr_id);
    
if ($stmt->execute()){
    $stmt = $conn->prepare("SELECT patient FROM transport WHERE tid = ?");
    $stmt->bind_param("s",$tr_id);
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
