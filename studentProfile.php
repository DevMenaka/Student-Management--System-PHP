<?php require "connection.php";
session_start();

if (isset($_SESSION["u"])) {
    $data = $_SESSION["u"];
    $email = $_SESSION["u"]["email"];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="icon" href="self-study.png" />
        <title>schoolEdu Student Profile</title>
    </head>

    <body style="background-color: #000000;background-image: linear-gradient(90deg,#000000 0%,#9FACE6 100%);">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-4 bg-black">
                            <div class=" col-2 d-grid mt-1">
                                <a href="studentPortal.php" class="fw-bolder btn btn-danger text-white"><i class="bi bi-arrow-left-circle-fill"></i> Back</a>
                            </div>
                        </div>
                        <div class="col-4 text-center bg-black">
                            <h2 class="fw-bolder text-white">Student Profile</h2>
                        </div>
                        <div class="col-4 text-center bg-black"></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center">

                        <?php

                        $details_rs = Database::search("SELECT * FROM `student` INNER JOIN `gender` ON 
                gender.id=student.gender_id WHERE `email`='" . $email . "'");

                        $image_rs = Database::search("SELECT * FROM `sprofile_image` WHERE `student_email`='" . $email . "'");

                        $data = $details_rs->fetch_assoc();
                        $image_data = $image_rs->fetch_assoc();
                        ?>
                        <div class="col-3 mt-5">
                            <div class="row justify-content-center">
                                <div class="col-12 mt-3">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            <div class="col-12">
                                                <div class="d-flex flex-column align-items-center text-center">

                                                    <?php

                                                    if (empty($image_data["code"])) {

                                                    ?>
                                                        <img src="resorce/studentProfile/profile-icon-9.png" class="rounded mt-5" style="width: 250px;" id="viweImage" />
                                                    <?php

                                                    } else {
                                                    ?>

                                                        <img src="<?php echo $image_data["code"] ?>" class="rounded mt-5" style="width: 150px;" id="viweImage" />

                                                    <?php
                                                    }

                                                    ?>

                                                    <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                                    <label for="profileimg" class="btn btn-primary mt-2" onclick="changeImage();">Update Profile Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-9 mt-3">
                            <div class="row justify-content-center g-3">
                                <div class="col-3 ">
                                    <label for="exampleFormControlInput1" class="form-label text-white">First Name</label>
                                    <input type="text" value="<?php echo $data["fname"]; ?>" class="form-control bg-transparent text-white" id="fname">
                                </div>
                                <div class="col-3">
                                    <label for="exampleFormControlInput1" class="form-label text-white">Middle Name</label>
                                    <input type="text" value="<?php echo $data["mname"]; ?>" class="form-control bg-transparent text-white " id="mname">
                                </div>
                                <div class="col-3">
                                    <label for="exampleFormControlInput1" class="form-label text-white">Last Name</label>
                                    <input type="text" value="<?php echo $data["lname"]; ?>" class="form-control bg-transparent text-white" id="lname">
                                </div>
                                <div class="col-9">
                                    <label for="exampleFormControlInput1" class="form-label text-white">Name With Initials</label>
                                    <input type="text" value="<?php echo $data["name_with_Initials"]; ?>" class="form-control bg-transparent text-white" id="nwi">
                                </div>
                                <div class="col-9">
                                    <label for="exampleFormControlInput1" class="form-label text-white">Email</label>
                                    <input type="email" value="<?php echo $data["email"]; ?>" readonly class="form-control bg-transparent text-white">
                                </div>
                                <div class="col-9">
                                    <label for="exampleFormControlInput1" class="form-label text-white">Mobile Number</label>
                                    <input type="text" value="<?php echo $data["mobile"]; ?>" class="form-control bg-transparent text-white" id="mno">
                                </div>
                                <div class="col-5">
                                    <label for="exampleFormControlInput1" class="form-label text-white">Date Of Birth</label>
                                    <input type="email" value="<?php echo $data["date_of_birth"]; ?>" readonly class="form-control bg-transparent text-white">
                                </div>
                                <div class="col-4">
                                    <label class="form-label text-white">Gender</label>
                                    <input type="text" class="form-control bg-transparent text-white" readonly value="<?php echo $data["gender"]; ?>" />
                                </div>
                                <div class="col-9">
                                    <label for="exampleFormControlInput1" class="form-label text-white">NIC Number</label>
                                    <input value="<?php echo $data["nic"]; ?>" type="email" readonly class="form-control bg-transparent text-white">
                                </div>
                                <div class="col-5">
                                    <label class="form-label text-white">Marital Status</label>
                                    <select class="form-select bg-transparent text-white" id="ms">
                                                    <?php
                                                    $marital_status_rs = Database::search("SELECT * FROM `marital_status`");
                                                    $marital_status_num = $marital_status_rs->num_rows;
                                                    for ($x = 0; $x < $marital_status_num; $x++) {
                                                        $marital_status_data = $marital_status_rs->fetch_assoc();
                                                    ?>
                                                <option class="bg-black" value="<?php echo $marital_status_data["id"]; ?>" <?php
                                                if (!empty($data["nationality_id"])) {
                                                if ($marital_status_data["id"] == $data["marital_status_id"]) {
                                                  ?>selected<?php }
                                                    }?>><?php echo $marital_status_data["type"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                </select>
                                </div>
                                <div class="col-4">
                                    <label class="form-label text-white">Nationality</label>
                                    <select class="form-select bg-transparent text-white" id="ns">
                                                    <?php
                                                    $nationality_rs = Database::search("SELECT * FROM `nationality`");
                                                    $nationality_num = $nationality_rs->num_rows;
                                                    for ($x = 0; $x < $nationality_num; $x++) {
                                                        $nationality_data = $nationality_rs->fetch_assoc();
                                                    ?>
                                                <option class="bg-black" value="<?php echo $nationality_data["id"]; ?>" <?php
                                                if (!empty($data["nationality_id"])) {
                                                if ($nationality_data["id"] == $data["nationality_id"]) {
                                                  ?>selected<?php }
                                                    }?>><?php echo $nationality_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                </select>
                                </div>
                                
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4" id="vbox2">
                                            <div class="fs-3 bg-light fw-bolder text-success text-center">Verified Profile <i class="bi bi-person-check-fill fs-3 fw-bolder"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9 mt-4 d-grid">
                                    <button class="btn btn-success" onclick="updateSprofile();">Update Student Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>
<?php
}
?>