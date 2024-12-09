<?php
session_start();
require "connection.php";

$user = $_POST["u"];
$password = $_POST["pw"];
$rememberme = $_POST["rme"];

if (empty($user)) {
    echo ("Please enter your User Name !!");
} elseif (strlen($user) > 30) {
    echo ("User Name must have less than 50 characters !!");
} elseif (empty($password)) {
    echo ("Please Enter your Password");
}else {

    $rs = Database::search("SELECT * FROM `teacher` WHERE `uname`='" . $user . "' 
    AND `password`='" .$password."'");
    $n = $rs->num_rows;

    if ($n == 1) {
        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;

        if ($d["verification_status"] == 1) {
              echo ("success");
              if ($rememberme == "true") {

                setcookie("user", $user, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {
                setcookie("user", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo ("no");
        }

        
    } else {
        echo ("Invalid Email or Password");
    }
}
?>