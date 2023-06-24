<?php
// session start if to link this file's direct info and lines with other files with the command
session_start();
// to connect with the data base
include 'databaseConn.php';
// requets data from the registration form
if (isset($_POST['loginBtn'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);

    $uniIdKey = mysqli_real_escape_string($db, $_POST['hotel']);

    $password = (md5($_POST['password']));//encryption

    $user_check_query = "SELECT * FROM dbTableName WHERE email = '$email' LIMIT 1 ";
    $result =mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    $userRows = mysqli_num_rows($result);
    
    $dbPassword = $user['pass_word'];
    $verify = $user['verify'];
    $amount = $user['amt'];
    
    // $pay = $user['pay'];
    
    $paytime = $user['paidDate'];
    $curr_time = date('Y-m-d H:i:s');

    $currTime = strtotime($curr_time);
    $payTime = strtotime($paytime);
    $timeDiff = $currTime - $payTime;
    $diff = floor($timeDiff/(60)); //minutes

    $_SESSION['firstname_login'] = $user['firstName'];
    $_SESSION['lastname_login'] = $user['lastName'];
        

    if($userRows == 1){
        if($password == $dbPassword){
            if($verify == 1){
                if($timeDiff < 172800 ){
                    if($amount >= 20){
                        header("location: Hotel?hotel=$uniIdKey");
                    }else{
                        header("location: Confirmation?acts=$uniIdKey");
                    }
                }else{
                    $_Query = "UPDATE dbTableName SET amt = '0', paidDate = '0', phonePaid = '0', payCode = '0' WHERE email = '$email' LIMIT 1";
                    $resultQuery =mysqli_query($db, $_Query);
                    header("location:Confirmation?acts=$uniIdKey");
                }
            }else{
                header("location: Login?hostel=$uniIdKey");//verify
            }
        }else{
            header("location: Login?hostel=$uniIdKey");//incorrect credentials
        }
    }else{
        //echo "This email id has already regitered.";
        header('location:Register?signup=Email');
        exit();
    }
}
?>