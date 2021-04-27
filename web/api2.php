<?php

require_once 'DBconnect.php';

$response = array();

if (isset($_GET['apicall']))
{
    switch ($_GET['apicall'])
    {
        case 'signup':

         if(isTheseParametersAvailable(array('pname','dob','gender','address','place','pincode','panchayath','ward','disease','mobile','password')))
            {
                $pname = $_POST['pname'];
                $dob = $_POST['dob'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $place = $_POST['place'];
                $pincode = $_POST['pincode'];
                $panchayath = $_POST['panchayath'];
                $ward = $_POST['ward'];
                $disease = $_POST['disease'];
                $mobile = $_POST['mobile'];
                $password = $_POST['password'];
                $type="patient";
                $status="pending";

                $stmt = $conn->prepare("SELECT * from patient where mobile = ?");
                $stmt->bind_param("s",$mobile);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0)
                {
                    $response['error'] = true;
                    $response['message'] = 'User Already Registered';
                    $stmt->close();
                }
                else
                {
                    $stmt = $conn->prepare("INSERT INTO patient ( pname,mobile,dob,gender,place,panchayath,ward,address,pincode,disease ) VALUES (?,?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("ssssssssss",$pname,$mobile,$dob,$gender,$place,$panchayath,$ward,$address,$pincode,$disease);
                    $stmt1 = $conn->prepare("INSERT INTO login (uname,password,type,status) VALUES (?,?,?,?)");
                    $stmt1->bind_param("ssss",$mobile,$password,$type,$status);


                    if ($stmt->execute() && $stmt1->execute() )
                    {
                        $stmt = $conn->prepare("SELECT pid, pname, mobile,  dob, gender, place, panchayath, ward, address, pincode, disease from patient where mobile=?" );
                        $stmt->bind_param("s",$mobile);
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
                        $response['message'] = 'Patient registered Successfully';
                        $response['user'] = $user;
                    }
                }
            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';

            }
            break;
           case "login":
            if (isTheseParametersAvailable(array('mobile','password')))
            {
                $mobile = $_POST['mobile'];
                $password = $_POST['password'];
                $stmt = $conn->prepare("SELECT * from login where uname = ? and password=?");
                $stmt->bind_param("ss",$mobile,$password);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0)
                {
                    $stmt1 = $conn->prepare("SELECT pid, pname, mobile,  dob, gender, place, panchayath, ward, address, pincode, disease from patient where mobile=?" );
                    $stmt1->bind_param("s",$mobile);
                    $stmt1->execute();
                    $stmt1->bind_result($pid,$pname, $mobile,  $dob, $gender, $place, $panchayath, $ward, $address, $pincode, $disease);
                    $stmt1->fetch();

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

                    $response['error'] = false;
                    $response['message'] = 'Succesfully logged in';
                    $response['user'] = $user;
                    $stmt1->close();
                    $stmt->close();
                }
                else{
                    $response['error'] = true;
                    $response['message'] = 'No user found';
                    $stmt->close();
                }

            }
            break;
        default:
            $response['error'] = true;
            $response['message'] = 'Invalid operation Called';
    }

}
else
{
    $response['error'] = true;
    $response['message'] = 'Invalid API Call';
}

echo json_encode($response);

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
