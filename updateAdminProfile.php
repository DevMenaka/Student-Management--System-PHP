<!-- <?php

// session_start();

// require "connection.php";

// if (isset($_SESSION["u"])){

//     $fname = $_POST["fn"];
//     $lname = $_POST["ln"];
//     $mname = $_POST["mn"];
//     $mobile = $_POST["m"];
//     $ms = $_POST["ms"];
//     $n = $_POST["n"];

//     if(isset($_FILES["image"])){
//         $image=$_FILES["image"];

//         $allowed_image_extentions = array("image/jpg","image/jpeg","image/png","image/svg+xml");
//         $file_ex=$image["type"];
    
       
//         if (!in_array($file_ex,$allowed_image_extentions)) {
//             echo("Please select a valid image.");
//         }else{

//             $new_file_extention;

//             if ($file_ex=="image/jpg"){
//                 $new_file_extention =".jpg";
//             }elseif($file_ex =="image/jpeg"){
//                 $new_file_extention =".jpeg";
//             }elseif($file_ex=="image/png"){
//                 $new_file_extention=".png";
//             }elseif($file_ex == "image/svg+xml"){
//                 $new_file_extention=".svg";
//             }
//             $file_name="resorce/studentProfile/".$_SESSION["u"]["fname"]."_".uniqid().$new_file_extention;

//             move_uploaded_file($image["tmp_name"],$file_name);

//             $image_rs = Database::search("SELECT * FROM `sprofile_image` WHERE  
//             `student_email`='".$_SESSION["u"]["email"]."'");
//             $image_num = $image_rs->num_rows;

//             if ($image_num == 1){
//                 Database::iud("UPDATE `sprofile_image` SET `code`='".$file_name."' 
//                 WHERE `student_email`='".$_SESSION["u"]["email"]."'");

//             }else{
//                     Database::iud("INSERT INTO `sprofile_image` (`code`,`student_email`)
//                     VALUES('".$file_name."','".$_SESSION["u"]["email"]."')");

//                 }
//         }

//     }

//     Database::iud("UPDATE `student` SET `fname`='".$fname."',`mname`='".$mname."',`lname`='".$lname."',`mobile`='".$mobile."',
//     `marital_status_id`='".$ms."',`nationality_id`='".$n."'
//     WHERE `email`='".$_SESSION["u"]["email"]."'");

//     echo("success");

// }else{
//     echo("Please Login first");
// }

?> -->