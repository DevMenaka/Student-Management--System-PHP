<?php
require "connection.php";
session_start();
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

$gmail = $_POST["e"];


use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["e"])){
    $gmail = $_POST["e"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$gmail."'");
    $admin_num = $admin_rs->num_rows;

    if ($admin_num > 0){
        $code = uniqid();

        Database::iud("UPDATE `admin` SET `unic_code`='".$code."'WHERE `email`='".$gmail."'");

        $d = $admin_rs->fetch_assoc();
        $_SESSION["u"] = $d;

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'projecteshop8@gmail.com';
            $mail->Password = 'otlgibgxuhmyfhky';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('projecteshop8@gmail.com', 'Administration Verification');
            $mail->addReplyTo('projecteshop8@gmail.com', 'Administration Verefication');
            $mail->addAddress($gmail);
            $mail->isHTML(true);
            $mail->Subject = 'schoolEdu Administration Verification Code';
            $bodyContent = '<h1 style="color:red">schoolEdu Admin Verification code is '.$code.'</h1>';
            $mail->Body= $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }

    }else{
        echo("You are not a valid user");
    }

}else{
    echo("Email field not be empty.");
}

?>