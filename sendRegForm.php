<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

        $link = urldecode("http://localhost/osms/studentRegisterForm.php");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'projecteshop8@gmail.com';
            $mail->Password = 'otlgibgxuhmyfhky';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('projecteshop8@gmail.com', 'SchoolEdu Student Registration Form');
            $mail->addReplyTo('projecteshop8@gmail.com', 'SchoolEdu Student Registration Form');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'SchoolEdu Student Registration Form';
            $bodyContent = '<h1 style="color:blue">Your Registration Form: - '.$link.'</h1>';
            $mail->Body= $bodyContent;

            if (!$mail->send()) {
                echo 'Registration Form sending failed';
            } else {
                echo 'Success';
            }

  
}

?>