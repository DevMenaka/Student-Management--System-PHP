<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
if (isset($_GET["e"])) {

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `teacher` WHERE `email`='" . $email . "'");
    $n = $rs->num_rows;

    if($n > 0 ){
        echo("Teacher With the same Email already exists.");
    }else{

    for ($y = 0; $y< $n; $y++) {  
         $n=0;
    }
    if ($n == 0) {
        $link = "http://localhost/osms/teacherLogin.php";
        $code = uniqid();
        $user_name=uniqid('user');
        $password = "123";
        
        Database::iud("INSERT INTO `teacher`
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
        $mail->setFrom('projecteshop8@gmail.com', 'Teacher Login');
        $mail->addReplyTo('projecteshop8@gmail.com', 'Teacher Login');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'schoolEdu Teacher Verification Code';
        $bodyContent = '<h1 style="color:black">Login Form - ' . $link . '<br>Your Verification code is:- ' . $code . '<br/>
            user Name is - ' . $user_name . '<br/> password is - ' . $password . '</h1>';
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'Success';
        }
    } else if ($n == 1) {
        echo ("Teacher With the same Email already exists.");
    } else {
        echo ("Please Enter Your Email");
    }
}
}
