<?php

session_start();

require "connection.php";
$aid = $_POST["aid"];
$sub = $_POST["subject"];
$nwi = $_POST["edate"];

if(empty($aid)) {
    echo("Please Enter Assignment id !!!");
}else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");
    
        

    Database::iud("INSERT INTO `assignments`
    (`assignments_id`,`subject_id`,`start_date`,`end_date`) VALUES
    ('".$aid."','".$sub."','".$date."','".$nwi."')");

    echo "success";
    }
    if(isset($_FILES["image"])){
        $image=$_FILES["image"];


        $allowed_image_extentions = array("link");
        $file_ex=$image["type"];
    
       
        if (!in_array($file_ex,$allowed_image_extentions)) {
            echo("Please select a valid image.");
        }else{

            $new_file_extention;

            if ($file_ex=="image/jpg"){
                $new_file_extention =".jpg";
            }elseif($file_ex=="image/jpeg"){
                $new_file_extention =".jpeg";
            }elseif($file_ex=="image/pdf"){
                $new_file_extention =".pdf";
            }
            $file_name="resorce/assigment".$_SESSION["u"]["fname"]."_".uniqid().$new_file_extention;

            move_uploaded_file($image["tmp_name"],$file_name);

            $image_rs = Database::search("SELECT * FROM `assigment_pdf` WHERE  
            `id`='".$aid."'");
            $image_num = $image_rs->num_rows;

            if ($image_num == 1){
                Database::iud("UPDATE `assigment_pdf` SET `code`='".$file_name."' 
                WHERE `id`='".$aid."'");

            }else{
                    Database::iud("INSERT INTO `assigment_pdf` (`code`,`id`)
                    VALUES('".$file_name."','".$aid."')");

                }
        }

    }



?>
