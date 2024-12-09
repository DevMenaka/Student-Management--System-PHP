<?php

require "connection.php";

$fname = $_POST["f"];
$mname = $_POST["m"];
$lname = $_POST["l"];
$nwi = $_POST["nwi"];
$email = $_POST["e"];
$password = $_POST["pw"];
$mobile = $_POST["mn"];
$birth = $_POST["b"];
$nic = $_POST["nic"];
$marital  = $_POST["ms"];
$nationality = $_POST["ns"];
$gender = $_POST["g"];

if(empty($fname)) {
    echo("Please Enter Your First Name !!!");
}elseif(strlen($fname)>50){
    echo("First Name must have less than 50 characters");
}elseif(empty($lname)){
    echo("Please Enter Your Last Name !!!");
}elseif(strlen($lname)>50){
    echo("First Name must have less than 50 characters");
}elseif(empty($nwi)){
    echo("Please Enter Your Name With Initials !!!");
}elseif(empty($email)) {
    echo("Please Enter Your Email !!!");
}elseif(strlen($email)>100){
    echo("Email must have less than 100 characters");
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email !!!");
}elseif(empty($mobile)) {
    echo("Please Enter Your mobile !!!");
}elseif(strlen($mobile)!=10){
    echo("Mobile must have 10 characters");
}elseif(empty($birth)){
    echo("Please Enter Your BirthDay !!!");
}elseif(strlen($birth)==11){
    echo("Birth Day must have less than 10 characters");
}elseif(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo("Invalid Mobile !!!");
}elseif(empty($password)){
    echo("Please Enter Your Password !!!");
}elseif(strlen($password) <5 || strlen($password) > 20){
    echo("Password must be between 5-20 characters");
}elseif(empty($birth)){
    echo("Please Enter Your BirthDay !!!");
}else{
   
    $rs = Database::search("SELECT * FROM `student` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
    $n = $rs->num_rows; 

    if($n > 0 ){
        echo("User With the same Email or Mobile already exists.");
    }else{
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");
    

    Database::iud("INSERT INTO `student`
    (`fname`,`mname`,`lname`,`name_with_Initials`,`email`,`mobile`,`password`,`gender_id`,`nic`,`marital_status_id`,`nationality_id`,`verificatin_status`,`registerd_date`,`date_of_birth`) VALUES
    ('".$fname."','".$mname."','".$lname."','".$nwi."','".$email."','".$mobile."','".$password."','".$gender."','".$nic."','".$marital."','".$nationality."','2','".$date."','".$birth."')");

    echo "success";
    }

}
?>