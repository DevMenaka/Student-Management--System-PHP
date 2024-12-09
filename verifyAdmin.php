<?php

session_start();
require "connection.php";

if(isset($_GET["v"])){

    $v = $_GET["v"];

    $admin = Database::search("SELECT * FROM `admin` WHERE `unic_code`='".$v."'");
    $num = $admin->num_rows;

    if ($num == 1) {
        $data = $admin->fetch_assoc();
        $_SESSION["au"] = $data;
        echo("success");

    }else{
        echo("Invalid Verification");
    }
    Database::iud("UPDATE `admin` SET `unic_code`='0'");

}else{
    echo("Plese enter your Verification");
}

?>