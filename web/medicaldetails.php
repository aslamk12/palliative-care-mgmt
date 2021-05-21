<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('pid'))) {

    $pid = $_POST['pid'];


    $stmt = $conn->prepare("SELECT medical_report.disease,medical_report.medicines,patient.pname,nurse.name,nurse.mobile FROM medical_report inner join patient on medical_report.pid=patient.pid inner join assign_nurse on patient.pid=assign_nurse.patient inner join nurse on assign_nurse.nurse=nurse.nid where patient.pid=?");
    $stmt->bind_param("s",$pid);
    $stmt->execute();
    $stmt->bind_result( $disease,$medicine,$pname,$nurse,$ncontact);
    $patients = array();
    while ($stmt->fetch()) {
        $temp = array();

       
        $temp['pname'] = $pname;
        $temp['pdisease'] = $disease;
        $temp['nurse'] = $nurse;
        $temp['ncontact'] = $ncontact;
        $temp['medicine'] = $medicine;
        

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
