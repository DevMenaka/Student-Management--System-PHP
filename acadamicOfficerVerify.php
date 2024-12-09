<?php

require "connection.php";

$user=$_POST["u"];
$vcode=$_POST["v"];

$email=$_GET["e"];


if(empty($user)){
    echo("Missing User Name");
}elseif (empty($email)){
    echo ("Please Enter Email");
}elseif (strlen($email) > 100) {
    echo ("Email must have less than 100 characters !!");
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!");
} elseif(empty($vcode)){
    echo("Please Enter Your Verification Code");
}else{

    $rs = Database::search("SELECT * FROM `acadamic_officer` WHERE `verification_code`='".$vcode."'AND 
    `email`='".$email."' ");
    
    $n = $rs->num_rows;
    
    if ($n==1) {

        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;

        Database::iud("UPDATE `acadamic_officer` SET `verification_code`='0',`verification_status`='1',`update_status`='2';");
        echo("success");
    
    }else{
        echo("Invalid User Name or Verification Code");
    }
}


?>