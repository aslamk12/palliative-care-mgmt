<?php

require_once 'DBconnect.php';

$response = array();

if (isset($_GET['apicall']))
{
    switch ($_GET['apicall'])
    {
        case 'signup':

            if (isTheseParametersAvailable(array('fullname','mobile','place','dob','panchayath','address','password')))
            {
                $full_name = $_POST['fullname'];
                $mobile = $_POST['mobile'];
                $place = $_POST['place'];
                $dob = $_POST['dob'];
                $panchayath = $_POST['panchayath'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $type="volunteer";
                $status="pending";

                $stmt = $conn->prepare("SELECT * from volunteer where mobile = ?");
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
                    $stmt = $conn->prepare("INSERT INTO volunteer ( name,mobile,dob,place,panchayath,address ) VALUES (?,?,?,?,?,?)");
                    $stmt->bind_param("ssssss",$full_name,$mobile,$dob,$place,$panchayath,$address);
                    $stmt1 = $conn->prepare("INSERT INTO login (uname,password,type,status) VALUES (?,?,?,?)");
                    $stmt1->bind_param("ssss",$mobile,$password,$type,$status);


                    if ($stmt->execute() && $stmt1->execute() )
                    {
                        $stmt = $conn->prepare("SELECT vid, name, mobile,  dob, place, panchayath, address from volunteer where mobile=?" );
                        $stmt->bind_param("s",$mobile);
                        $stmt->execute();
                        $stmt->bind_result($vid,$full_name, $mobile,  $dob, $place, $panchayath, $address);
                        $stmt->fetch();

                        $user = array
                        (
                            'vid'=>$vid,
                            'name'=>$full_name,
                            'mobile'=>$mobile,
                            'place'=>$place,
                            'dob'=>$dob,
                            'panchayath'=>$panchayath,
                            'address'=>$address,
                        );

                        $stmt->close();

                        $response['error']= false;
                        $response['message'] = 'Volunteer registered Successfully';
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
                    $stmt1 = $conn->prepare("SELECT vid, name, mobile, dob, place, panchayath, address from volunteer where mobile=?" );
                    $stmt1->bind_param("s",$mobile);
                    $stmt1->execute();
                    $stmt1->bind_result($vid,$name, $mobile, $dob, $place, $panchayath, $address);
                    $stmt1->fetch();

                    $user = array
                    (
                        'vid'=>$vid,
                        'fullname'=>$name,
                        'mobile'=>$mobile,
                        'place'=>$place,
                        'dob'=>$dob,
                        'panchayath'=>$panchayath,
                        'address'=>$address,
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
             case 'editprofile':

            if (isTheseParametersAvailable(array('name','place','panchayath','address','vid')))
            {
                $name = $_POST['name'];
                $place = $_POST['place'];
                $panchayath=$_POST['panchayath'];
                $address=$_POST['address'];
                $vid=$_POST['vid'];


                    $stmt = $conn->prepare("UPDATE  volunteer SET name = ?, place = ?, panchayath = ?, address = ? WHERE vid = ? ");
                    $stmt->bind_param("sssss",$name,$place,$panchayath,$address,$vid);


                    if ($stmt->execute())
                    {
                    $stmt = $conn->prepare("SELECT vid, name, mobile, dob, place, panchayath, address from volunteer where vid=?" );
                    $stmt->bind_param("s",$vid);
                    $stmt->execute();
                    $stmt->bind_result($vid,$name, $mobile, $dob, $place, $panchayath, $address);
                    $stmt->fetch();

                    $user = array
                    (
                        'vid'=>$vid,
                        'fullname'=>$name,
                        'mobile'=>$mobile,
                        'place'=>$place,
                        'dob'=>$dob,
                        'panchayath'=>$panchayath,
                        'address'=>$address,
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
            break;
            case 'editpass':

            if (isTheseParametersAvailable(array('password','mobile')))
            {
                $password = $_POST['password'];
                $mobile = $_POST['mobile'];



                $stmt = $conn->prepare("UPDATE  login SET password = ? WHERE uname = ? ");
                $stmt->bind_param("ss",$password,$mobile);


                if ($stmt->execute())
                {
                    $stmt = $conn->prepare("SELECT vid, name, mobile, dob, place, panchayath, address from volunteer where mobile=?" );
                    $stmt->bind_param("s",$mobile);
                    $stmt->execute();
                    $stmt->bind_result($vid,$name, $mobile, $dob, $place, $panchayath, $address);
                    $stmt->fetch();

                    $user = array
                    (
                        'vid'=>$vid,
                        'fullname'=>$name,
                        'mobile'=>$mobile,
                        'place'=>$place,
                        'dob'=>$dob,
                        'panchayath'=>$panchayath,
                        'address'=>$address,
                    );

                    $stmt->close();

                    $response['error']= false;
                    $response['message'] = 'Password Changed Successfully';
                    $response['user'] = $user;
                }
            }

            else
            {
                $response['error'] = true;
                $response['message'] = 'required parameters are not available';

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
