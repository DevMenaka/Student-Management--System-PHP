<?php

require "connection.php";

if (isset($_GET["e"])) {
    
    $email = $_GET["e"];

    $trs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."'");
    $tnum = $trs->num_rows;
    
    if ($tnum==1){
        Database::iud("DELETE FROM `sprofile_image` WHERE `student_email`='".$email."'");
        Database::iud("DELETE FROM `student` WHERE `email`='".$email."'");
        echo("success");
    }else{
        echo("Acadamic Officer Not Found");
    }
    


   

}else{
    echo("Somthing Went Wrong");
}

?>