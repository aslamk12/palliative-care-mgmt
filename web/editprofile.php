<?php
require_once 'DBconnect.php';

$response = array();
if (isTheseParametersAvailable(array('pname','address','place','pincode','panchayath','ward','pid')))
            {
                $pname = $_POST['pname'];
                $address = $_POST['address'];
                $place = $_POST['place'];
                $pincode = $_POST['pincode'];
                $panchayath = $_POST['panchayath'];
                $ward = $_POST['ward'];
              
                $pid=$_POST['pid'];


                    $stmt = $conn->prepare("UPDATE  patient SET pname = ?, place = ?, panchayath = ?, ward = ?, address = ?,pincode = ? WHERE pid = ? ");
                    $stmt->bind_param("sssssss",$pname,$place,$panchayath,$ward,$address,$pincode,$pid);


                    if ($stmt->execute())
                    {
                         $stmt = $conn->prepare("SELECT pid, pname, mobile,  dob, gender, place, panchayath, ward, address, pincode, disease from patient where pid=?" );
                        $stmt->bind_param("s",$pid);
                        $stmt->execute();
                        $stmt->bind_result($pid,$pname, $mobile,  $dob, $gender, $place, $panchayath, $ward, $address, $pincode, $disease);
                        $stmt->fetch();

                        $user = array
                        (
                            'pid'=>$pid,
                            'pname'=>$pname,
                            'dob'=>$dob,
                            'gender'=>$gender,
                            'address'=>$address,
                            'place'=>$place,
                            'pincode'=>$pincode,
                            'panchayath'=>$panchayath,
                            'ward'=>$ward,
                            'mobile'=>$mobile,
                            'disease'=>$disease,
                        );

                        $stmt->close();

                        $response['error']= false;
                        $response['message'] = 'Profile Updated Successfully';
                        $response['user'] = $user;
                    }
                }

            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';

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
