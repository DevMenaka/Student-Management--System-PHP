<?php

require "connection.php";

$email=$_POST["e"];
$np=$_POST["n"];
$rnp=$_POST["r"];
$vcode=$_POST["v"];

if (empty($email)) {
    echo("Missing Email adress");
}elseif(empty($np)){
    echo("Please Insert a New Password");
}elseif(strlen($np)<5||strlen($np)>20){
     echo ("invalid Password");
}elseif(empty($rnp)){
    echo ("Please Re-type your New Password");
}elseif($np!=$rnp){
    echo("Password does not matched");
}elseif(empty($vcode)){
    echo("Please Enter Your Verification Code");
}else{

    $rs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."'AND 
    `reset_pw_verification`='".$vcode."' ");
    
    $n = $rs->num_rows;
    
    if ($n==1) {

        Database::iud("UPDATE `student` SET `password`='".$np."' WHERE `email`='".$email."' ");
        echo("success");
    
    }else{
        echo("Invalid Email or Verification Code");
    }
}


?>