<?php
require "connection.php";

$email=$_POST["e"];
$grade = $_POST["g"];

if ($grade==0) {
    echo ("Please Select a Student Grade!!");
}else{

$srs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."'");
$snum = $srs->num_rows;

if ($snum > 0){
    $sdata = $srs->fetch_assoc();
    Database::iud("UPDATE `student` SET `grade_id`='".$grade."' WHERE `email`='".$email."' ");
    echo("Student Grade Is Updated");
}else{

    echo("something went wrong please try again");

}
}





?>
