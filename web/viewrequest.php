<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('vid'))) {

    $vid = $_POST['vid'];
    $status='assigned';

    $stmt = $conn->prepare("SELECT pid,pname,mobile,place,panchayath,ward,address,tid,eid,e_name FROM patient inner join transport on patient.pid=transport.patient inner join equipments on transport.equipment=equipments.eid where transport.volunteer=? and transport.tr_status=?");
    $stmt->bind_param("ss",$vid,$status);
    $stmt->execute();
    $stmt->bind_result( $pid,$pname,$mobile,$place,$panchayath,$ward,$address,$tid,$eid,$e_name);
    $request = array();
    while ($stmt->fetch()) {
        $temp = array();


        $temp['pid'] = $pid;
        $temp['tr_id'] = $tid;
        $temp['ward'] = $ward;
        $temp['eid'] = $eid;
        $temp['pname'] = $pname;
        $temp['pmobile'] = $mobile;
        $temp['pplace'] = $place;
        $temp['ppanchayath'] = $panchayath;
        $temp['paddress'] = $address;
        $temp['e_name'] = $e_name;




        array_push($request, $temp);
    }

    echo json_encode($request);
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
