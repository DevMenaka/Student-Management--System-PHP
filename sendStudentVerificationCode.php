<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $code = uniqid();

        Database::iud("UPDATE `student` SET `student_verificatin`='".$code."' WHERE 
        `email`='".$email."'");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'projecteshop8@gmail.com';
            $mail->Password = 'otlgibgxuhmyfhky';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('projecteshop8@gmail.com', 'Verification Code');
            $mail->addReplyTo('projecteshop8@gmail.com', 'Verification Code');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'schoolEdu Student Verification Code';
            $bodyContent = '<h1 style="color:blue">Your Verification code is - '.$code.'</h1>';
            $mail->Body= $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'A verification code has been sent to this student.';
            }

    }else{
        echo ("Please Enter Your Email");
    }

}

?>