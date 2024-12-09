<?php

require "connection.php";

$email = $_GET["e"];

$rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
$snum = $rs->num_rows;

if ($snum == 1){

    $sdata = $rs->fetch_assoc();
    $status = $sdata["status_id"];

    if ($status==1){

        Database::iud("UPDATE `admin` SET `status_id`='2' WHERE `email`='".$email."'");
        echo("deactivated");
        
    }else if($status == 2){
        Database::iud("UPDATE `admin` SET `status_id`='1' WHERE `email`='".$email."'");
        echo("activated");
    }

    
}else{
    echo("Something Went Wrong.Plese Try Agin Later");
}

?>