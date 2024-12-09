<?php

require "connection.php";

$email=$_POST["e"];
$vcode=$_POST["v"];

if (empty($email)) {
    echo("Missing Email adress");
}elseif(empty($vcode)){
    echo("Please Enter Your Verification Code");
}else{

    $rs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."'AND 
    `student_verificatin`='".$vcode."' ");
    
    $n = $rs->num_rows;
    
    if ($n==1) {

        Database::iud("UPDATE `student` SET `verificatin_status`='1',`student_status`='1'");
        echo("success");
    
    }else{
        echo("Invalid Email or Verification Code");
    }
}


?>