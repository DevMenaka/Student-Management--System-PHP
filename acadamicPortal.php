<?php
require "connection.php";
session_start();

if (isset($_SESSION["u"])) {
    $data = $_SESSION["u"];
    $email = $_SESSION["u"]["email"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="icon" href="self-study.png" />
        <title>schoolEdu Acadamic</title>
    </head>

    <body style="background-color: #000000;background-image: linear-gradient(90deg,#000000 0%,#9FACE6 100%);">
        <div class="" id="ApBox">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="row">
                                    <div class="col-12 border-bottom bg-dark border-danger">
                                        <div class="row mt-3 mb-3">
                                            <div class="col-4" style="cursor: pointer;">
                                                <div class="text-start">
                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Update Student Profile">
                                                    <?php 
                                                        $image_rs = Database::search("SELECT * FROM `aimg` WHERE `a_email`='" . $email . "'");
                                                        $image_data = $image_rs->fetch_assoc(); 

                                                        if (empty($image_data["code"])) {

                                                        ?>
                                                            <img src="resorce/studentProfile/profile-icon-9.png" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="AporofileSwitch();" />
                                                        <?php

                                                        } else {
                                                        ?>

                                                            <img src="<?php echo $image_data["code"];?>" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="AporofileSwitch();"/>

                                                        <?php
                                                        }

                                                        ?>
                                                        <span class="fw-bolder fs-5 text-white"><?php echo $data["uname"]; ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-7 text-centert">
                                                <h1 class="fw-bolder text-white">SchoolEdu Acadamic Portal</h1>
                                            </div>
                                            <div class="col-1 text-start">
                                                <button class="btn btn-danger fw-bold" onclick="Asignout();">Logout</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Dashboard box-->
                                <div class="col-12" id="boxb">
                                    <div class="row">

                                        <div class="col-12 mt-5">
                                            <div class="row justify-content-center">
                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                            <button class="accordion-button fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                Assignments
                                                            </button>
                                                        </h2>
                                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                            <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="row justify-content-center">
                                                                    </div>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-2 bg-body">
                                                                                    <div class="text-center">
                                                                                        <label class="fw-bold">Assignment id</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2 bg-body">
                                                                                    <div class="text-center">
                                                                                        <label class="fw-bold">Subject</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2 bg-body">
                                                                                    <div class="text-center">
                                                                                        <label class="fw-bold">Teacher_id</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-3 bg-body">
                                                                                    <div class="text-center">
                                                                                        <label class="fw-bold">Student_id</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-3 bg-body">
                                                                                    <div class="text-center">
                                                                                        <label class="fw-bold">Marks</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-12">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-2 bg-body">
                                                                                    <div class="text-center">
                                                                                        <span>1</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2 bg-body">
                                                                                    <div class="text-center">
                                                                                        <span>oop</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-2 bg-body">
                                                                                    <div class="text-center">
                                                                                        <label class="fw-bold">2022.12.27</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-3 bg-body">
                                                                                    <div class="text-center">
                                                                                        <label class="fw-bold">2022.12.31</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-3 bg-body">
                                                                                    <div class="text-center">
                                                                                        <span class="badge bg-success btn fw-bolder mb-2">15</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 bg-body">
                                                                                <div class="text-end">
                                                                                    <button class="btn btn-danger fw-bolder mb-2 mt-5">Issue Assignment Marks</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion mt-4" id="accordionExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingOne">
                                                            <button class="accordion-button fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                View lesson notes
                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="col-12">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-1 bg-body">
                                                                            <div class="text-center">
                                                                                <label class="fw-bold">Subject id</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 bg-body">
                                                                            <div class="text-center">
                                                                                <label class="fw-bold">Subject</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-3 bg-body">
                                                                            <div class="text-center">
                                                                                <label class="fw-bold">Lesson</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 bg-body">
                                                                            <div class="text-center">
                                                                                <label class="fw-bold">Download PDF</label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-1 bg-body">
                                                                            <div class="text-center">
                                                                                <label class="fw-bold">1</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 bg-body">
                                                                            <div class="text-center">
                                                                                <label class="fw-bold">web</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-3 bg-body">
                                                                            <div class="text-center">
                                                                                <label class="fw-bold">Html</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4 bg-body">
                                                                            <div class="text-center">
                                                                                <span class="badge bg-primary btn fw-bolder mb-2">Download</span>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <div class="col-12 mt-5 mb-2">
                                                    <div class="row">
                                                        <div class=" offset-1 col-2">
                                                            <div class="row">
                                                                <button class="btn btn-info fw-bolder" onclick="sendRegisterForm();">Send Student Register Form <i class="bi bi-send-fill"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1" style="background-color:#C1CBEA;">
                                                    <div class="text-center mt-2 mb-2">
                                                        <label class="fw-bold">#</label>
                                                    </div>
                                                </div>
                                                <div class="col-4" style="background-color:#C1CBEA;">
                                                    <div class="text-center">
                                                        <label class="fw-bold mt-2 mb-2">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-4" style="background-color:#C1CBEA;">
                                                    <div class="text-center mt-2 mb-2">
                                                        <label class="fw-bold">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-1" style="background-color:#C1CBEA;">
                                                    <div class="text-center mt-2 mb-2"></div>
                                                </div>
                                                <div class="col-1" style="background-color:#C1CBEA;">
                                                    <div class="text-center mt-2 mb-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                        $s_rs = Database::search("SELECT * FROM `student`");
                                        $s_num = $s_rs->num_rows;

                                        for ($y = 0; $y < $s_num; $y++) {
                                            $sdata = $s_rs->fetch_assoc();

                                        ?>
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="col-1" style="background-color:#C1CBEA;">
                                                        <div class="text-center mt-2 mb-2">
                                                            <label class="fw-bold"><?php echo $y ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-5" style="background-color:#C1CBEA;">
                                                        <div class="text-center d-grid">
                                                            <input value="<?php echo $sdata["email"]; ?>" class="fw-bold mt-2 mb-2 border-primary bg-transparent text-center" id="email2" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-3" style="background-color:#C1CBEA;">
                                                        <div class="text-center mt-2 mb-2">
                                                            <label class="fw-bold"><?php echo $sdata["fname"] . " " . $sdata["lname"]; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2" style="background-color:#C1CBEA;">
                                                        <div class="text-center mt-2 mb-2">
                                                            <div class="text-center">
                                                                <span class="badge bg-primary btn fw-bolder mb-2" onclick="SendScode();">Send Veryfication</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal" tabindex="-1" id="regModel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Send Student Register Form</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">

                                            <div class="col-12">
                                                <label class="form-lable">Enter the applicant's email</label>
                                                <input type="text" class="form-control" id="Aemail" />

                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="sendRegForm();">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="d-none" id="pofileBox">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-4 bg-black">
                        <div class=" col-2 d-grid mt-1">
                            <button onclick="AporofileSwitch();" class="fw-bolder btn btn-danger text-white"><i class="bi bi-arrow-left-circle-fill"></i> Back</button>
                        </div>
                    </div>
                    <div class="col-4 text-center bg-black">
                        <h2 class="fw-bolder text-white">Acadamic Officer Profile</h2>
                    </div>
                    <div class="col-4 text-center bg-black"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-2 mt-5">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <div class="col-12">
                                            <div class="d-flex flex-column align-items-center text-center">

                                                <?php

                                                if (empty($image_data["code"])) {

                                                ?>
                                                    <img src="resorce/studentProfile/profile-icon-9.png" class="rounded mt-5" style="width: 150px;" id="viwe" />
                                                <?php

                                                } else {
                                                ?>

                                                    <img src="<?php echo $image_data["code"]; ?>" class="rounded mt-5" style="width: 150px;" id="viwe" />

                                                <?php
                                                }

                                                ?>

                                                <input type="file" class="d-none" id="pro" accept="image/*" />
                                                <label for="pro" class="btn btn-primary mt-2" onclick="changeAImage();">Update Profile Image</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-10 mt-5">
                        <div class="row justify-content-center g-4">
                            <div class="col-10 mt-5 ">
                                <label for="exampleFormControlInput1" class="form-label text-white">User Name</label>
                                <input type="text" value="<?php echo $data["uname"]; ?>" class="form-control bg-transparent text-white" id="un">
                            </div>
                            <div class="col-5 ">
                                <label for="exampleFormControlInput1" class="form-label text-white">First Name</label>
                                <input type="text" value="<?php echo $data["fname"]; ?>" class="form-control bg-transparent text-white" id="fname">
                            </div>
                            <div class="col-5">
                                <label for="exampleFormControlInput1" class="form-label text-white">Last Name</label>
                                <input type="text" value="<?php echo $data["lname"]; ?>" class="form-control bg-transparent text-white" id="lname">
                            </div>
                            <div class="col-10">
                                <label for="exampleFormControlInput1" class="form-label text-white">Email</label>
                                <input type="email" disabled value="<?php echo $data["email"]; ?>" readonly class="form-control bg-transparent text-white" />
                            </div>
                            <div class="col-5">
                                <label for="exampleFormControlInput1" class="form-label text-white">Mobile Number</label>
                                <input type="text" value="<?php echo $data["mobile"]; ?>" class="form-control bg-transparent text-white" id="mno">
                            </div>
                            <div class="col-5">
                                <label class="form-label text-white">Gender</label>
                                <select class="form-select bg-transparent text-white" id="g">
                                    <?php
                                    $grs = Database::search("SELECT * FROM `gender`");
                                    $gn = $grs->num_rows;
                                    for ($g = 0; $g < $gn; $g++) {
                                        $gd = $grs->fetch_assoc();
                                    ?>
                                        <option class="bg-black" value="<?php echo $gd["id"]; ?>" <?php
                                                                                                    if (!empty($data["gender_id"])) {
                                                                                                        if ($gd["id"] == $data["gender_id"]) {
                                                                                                    ?>selected<?php }
                                                                                                                    } ?>><?php echo $gd["gender"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="exampleFormControlInput1" class="form-label text-white">NIC Number</label>
                                <input type="text" value="<?php echo $data["nic"]; ?>" id="nic" class="form-control bg-transparent text-white">
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
                                                                                                                                } ?>><?php echo $marital_status_data["type"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-10">
                                <label for="exampleFormControlInput1" class="form-label text-white">Change Pssword</label>
                                <input type="password" value="<?php echo $data["password"]; ?>" class="form-control bg-transparent text-white" id="pw">
                            </div>
                            <div class="col-10 mt-5 d-grid">
                                <button class="btn btn-success" onclick="AprofileUpdate();">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php
}
?>