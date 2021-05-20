<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('pid','eid'))) {
    $pid = $_POST['pid'];
    $eid = $_POST['eid'];
    
    $status="pending";
   


    $stmt = $conn->prepare("INSERT INTO equipment_request (patient,equipment,status) VALUES (?,?,?)");
    $stmt->bind_param("sss",$pid,$eid,$status);
    if ($stmt->execute() )
    {
        $stmt1 = $conn->prepare("SELECT req_id from equipment_request where patient=? and status=?" );
        $stmt1->bind_param("ss",$pid,$status);
        $stmt1->execute();
        $stmt1->bind_result($req_id);

        $sendreq = array();
        while($stmt1->fetch()) {
            $temp=array();
            $temp['req_id']=$req_id;
            array_push($sendreq,$temp);
        }
        echo json_encode($sendreq);

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
