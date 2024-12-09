<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    if (empty($email)) {
        echo ("Please enter Email !!");
    } elseif (strlen($email) > 100) {
        echo ("Email must have less than 100 characters !!");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo ("Invalid Email !!");
    }else{

    $rs = Database::search("SELECT * FROM `acadamic_officer` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n>0 ){
        echo("Officer With the same Email already exists.");
    }else
     
    $link = "http://localhost/osms/acadamicOfficerLogin.php";
    $user_name=uniqid('user');
    $password="123";
    $code = uniqid();

    Database::iud("INSERT INTO `acadamic_officer`
    (`email`,`uname`,`password`,`verification_code`,`status_id`,`verification_status`) VALUES
    ('" . $email . "','" . $user_name . "','" . $password . "','" . $code . "','2','2')");


        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'projecteshop8@gmail.com';
            $mail->Password = 'otlgibgxuhmyfhky';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('projecteshop8@gmail.com', 'SchoolEdu Acadamic Login');
            $mail->addReplyTo('projecteshop8@gmail.com', 'SchoolEdu Acadamic Login');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'SchoolEdu Acadamic Login';
            $bodyContent = '<h1 style="color:green">Login Form - '.$link.'<br>Your Verification code is:- '.$code.'<br/>
            user Name is - '.$user_name.'<br/> password is - '.$password.'</h1>';
            $mail->Body= $bodyContent;

            if (!$mail->send()) {
                echo 'Registration Form sending failed';
            } else {
                echo 'Success';
            }
        }
    }

?>