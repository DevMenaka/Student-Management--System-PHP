<?php

require "connection.php";
$fname = $_POST["fn"];
$lname = $_POST["ln"];
$mobile = $_POST["m"];
$email = $_POST["e"];



$data_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");
$data_num = $data_rs->num_rows;

if ($data_num == 1) {


    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];


        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } elseif ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } elseif ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } elseif ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }
            $file_name = "resorce/studentProfile/" . $email . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `admin_img` WHERE  
            `admin_email`='" . $email. "'");
            $image_num = $image_rs->num_rows;

            if ($image_num == 1) {
                Database::iud("UPDATE `admin_img` SET `code`='" . $file_name . "' 
                WHERE `admin_email`='" . $email . "'");
            } else {
                Database::iud("INSERT INTO `admin_img` (`code`,`admin_email`)
                    VALUES('" . $file_name . "','" . $email . "')");
            }
        }
    }

    Database::iud("UPDATE `admin` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "',
    `status_id`='1',`update_id`='1'");

    echo ("success");
} else {
    echo ("Please Login first");
}
?>
