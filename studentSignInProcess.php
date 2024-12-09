<?php
session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if (empty($email)) {
    echo ("Please enter your Email !!");
} elseif (strlen($email) > 100) {
    echo ("Email must have less than 100 characters !!");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!");
} elseif (empty($password)) {
    echo ("Please Enter your Password");
} elseif (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must have between 5-20 characters");
} else {

    $rs = Database::search("SELECT * FROM `student` WHERE `email`='" . $email . "' 
    AND `password`='" . $password . "'");
    $n = $rs->num_rows;

    if ($n == 1) {
        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;

        if ($d["verificatin_status"] == 1) {
            if ($rememberme == "true") {

                if ($d["registerd_date"] > time() + (60 * 60 * 24 * 30)) {
                    echo ("expired");
                } else {
                    setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                    setcookie("password", $password, time() + (60 * 60 * 24 * 365));
                    echo ("success");
                }
            } else {
                setcookie("email", "", -1);
                setcookie("password", "", -1);
                echo ("success");
            }
        } else {
            echo ("no");
        }
    } else {
        echo ("Invalid Email or Password");
    }
}
