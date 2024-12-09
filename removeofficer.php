<?php

require "connection.php";

if (isset($_GET["e"])) {
    
    $email = $_GET["e"];


    $trs = Database::search("SELECT * FROM `acadamic_officer` WHERE `email`='".$email."'");
    $tnum = $trs->num_rows;
    
    if ($tnum==1){
        Database::iud("DELETE FROM `aimg` WHERE `a_email`='".$email."'");
        Database::iud("DELETE FROM `acadamic_officer` WHERE `email`='".$email."'");
        echo("success");
    }else{
        echo("Acadamic Officer Not Found");
    }
    


   

}else{
    echo("Somthing Went Wrong");
}

?>