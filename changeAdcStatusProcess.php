<?php

require "connection.php";

$email = $_GET["e"];

$rs = Database::search("SELECT * FROM `acadamic_officer` WHERE `email`='".$email."'");
$tnum = $rs->num_rows;

if ($tnum == 1){

    $tdata = $rs->fetch_assoc();
    $status = $tdata["status_id"];

    if ($status==1){

        Database::iud("UPDATE `acadamic_officer` SET `status_id`='2' WHERE `email`='".$email."'");
        echo("deactivated");
        
    }else if($status == 2){
        Database::iud("UPDATE `acadamic_officer` SET `status_id`='1' WHERE `email`='".$email."'");
        echo("activated");
    }

    
}else{
    echo("Something Went Wrong.Plese Try Agin Later");
}

?>