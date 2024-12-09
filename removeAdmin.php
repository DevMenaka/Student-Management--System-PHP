<?php

require "connection.php";

if (isset($_GET["e"])) {
    
    $email = $_GET["e"];

    $trs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
    $tnum = $trs->num_rows;
    
    if ($tnum==1){
        Database::iud("DELETE FROM `admin_img` WHERE `admin_email`='".$email."'");
        Database::iud("DELETE FROM `admin` WHERE `email`='".$email."'");
        echo("success");
    }else{
        echo("Acadamic Officer Not Found");
    }
    


   

}else{
    echo("Somthing Went Wrong");
}

?>