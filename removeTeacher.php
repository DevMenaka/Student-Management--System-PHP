<?php

require "connection.php";

if (isset($_GET["e"])) {
    $email = $_GET["e"];


    $trs = Database::search("SELECT * FROM `teacher` WHERE `email`='".$email."'");
    $tnum = $trs->num_rows;
    if ($tnum==1){
        Database::iud("DELETE FROM `tprofile_image` WHERE `teacher_email`='".$email."'");
        Database::iud("DELETE FROM `teacher` WHERE `email`='".$email."'");
        echo("Teacher Is Removed");
        
    }else{
        echo("Teacher Not Found");
    }
    


   

}else{
    echo("Somthing Went Wrong");
}

?>