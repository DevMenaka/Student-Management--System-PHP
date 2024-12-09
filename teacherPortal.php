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
        <link rel="icon" href="self-study.png" />
        <title>schoolEdu Teacher Portal</title>
    </head>

    <body style="background-color: #000000;background-image: linear-gradient(90deg,#000000 0%,#9FACE6 100%);">

        <div class="container-fluid">
            <div class="row">
                <!--  -->
                <div class="col-12" id="portalBox">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-12 border-bottom bg-dark border-danger">
                                    <div class="row mt-3 mb-3">
                                        <div class="col-4" style="cursor: pointer;">
                                            <div class="text-start">
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Update Student Profile">
                                                    <?php 
                                                        $image_rs = Database::search("SELECT * FROM `tprofile_image` WHERE `teacher_email`='" . $email . "'");
                                                        $image_data = $image_rs->fetch_assoc(); 

                                                        if (empty($image_data["path"])) {

                                                        ?>
                                                            <img src="resorce/studentProfile/profile-icon-9.png" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="tporofileSwitch();" />
                                                        <?php

                                                        } else {
                                                        ?>

                                                            <img src="<?php echo $image_data["path"];?>" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="tporofileSwitch();" />

                                                        <?php
                                                        }

                                                        ?>
                                                    <span class="fw-bolder fs-5 text-white"><?php echo $data["uname"]; ?></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-7 text-start">
                                            <h1 class="fw-bolder text-white">schoolEdu Teacher Portal</h1>
                                        </div>
                                        <div class="col-1 text-start">
                                            <button class="btn btn-danger fw-bold" onclick="tsignout();">Logout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Dashboard box-->
                            <div class="col-12" id="boxb">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-6" style="background-color:#C1CBEA;">
                                                <div class="col-12 mt-2 mb-2">
                                                    <div class="text-center">
                                                        <input type="file" class="d-none" id="profileimg" accept="file/*" />
                                                        <label for="profileimg" class="btn btn-primary" onclick="uploadLessonNote();">Add lesson notes</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6" style="background-color:#102035;">
                                                <div class="col-12 mt-2 mb-2">
                                                    <div class="text-center">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                                                    <label class="fw-bold">Start Date</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-2 bg-body">
                                                                                <div class="text-center">
                                                                                    <label class="fw-bold">End Date</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-1 bg-body">
                                                                                <div class="text-center">
                                                                                    <label class="fw-bold">PDF Upload</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-1 bg-body"></div>
                                                                            <div class="col-2 bg-body"></div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-2 bg-body mt-2">
                                                                                <div class="text-center">
                                                                                    <input class="form-control" type="text" id="aid" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-2 bg-body mt-2">
                                                                                <div class="text-center">
                                                                                    <select class="form-select" id="subj">
                                                                                        <?php

                                                                                        $rs = Database::search("SELECT * FROM `subject`");
                                                                                        $n = $rs->num_rows;

                                                                                        for ($x; $x < $n; $x++) {
                                                                                            $d = $rs->fetch_assoc();

                                                                                            $id = $d["id"];
                                                                                            $sub = $d["subject"];

                                                                                        ?>

                                                                                            <option value="<?php echo $id; ?>"><?php echo $sub; ?></option>

                                                                                        <?php

                                                                                        }

                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-2 bg-body mt-2">
                                                                                <div class="text-center">
                                                                                    <input class="form-control" readonly type="date" id="sdate" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-2 bg-body mt-2">
                                                                                <div class="text-center">
                                                                                    <input class="form-control" type="date" id="edate" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-1 bg-body mt-2">
                                                                                <div class="text-center">
                                                                                    <input type="link" required class="d-none" id="profileimg" accept="image/*" />
                                                                                    <label for="profileimg" class="btn btn-primary fw-bolder" onclick="uploadAssigment();">Upload</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-2 bg-body mt-2">
                                                                                <div class="text-center d-grid">
                                                                                    <?php
                                                                                    $imgrs = Database::search("SELECT * FROM `assignments`");
                                                                                    $imgd = $imgrs->fetch_assoc();

                                                                                    if (empty($imgd["code"])) {

                                                                                    ?>
                                                                                        <img src="resorce/document-page-blank.png" style="width:50px;" id="viweImage" />
                                                                                    <?php

                                                                                    } else {
                                                                                    ?>

                                                                                        <img src="<?php echo $imgd["code"]; ?>" class="rounded" style="width: 150px;" id="viweImage" />

                                                                                    <?php
                                                                                    }

                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-1 bg-body mt-2">
                                                                                <div class="text-center d-grid">
                                                                                    <span class="btn bg-success btn fw-bolder mb-2" onclick="uploadasssgment();">Sbmit</span>
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
                                                                    <div class="col-2 bg-body mt-2">
                                                                        <div class="text-center">
                                                                            <input class="form-control" type="text" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 bg-body mt-2">
                                                                        <div class="text-center">
                                                                            <select class="form-select" id="subj">
                                                                                <?php

                                                                                $rs = Database::search("SELECT * FROM `subject`");
                                                                                $n = $rs->num_rows;

                                                                                for ($x; $x < $n; $x++) {
                                                                                    $d = $rs->fetch_assoc();

                                                                                    $id = $d["id"];
                                                                                    $sub = $d["subject"];

                                                                                ?>

                                                                                    <option value="<?php echo $id; ?>"><?php echo $sub; ?></option>

                                                                                <?php

                                                                                }

                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 bg-body mt-2">
                                                                        <div class="text-center">
                                                                            <input class="form-control" type="date" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 bg-body mt-2">
                                                                        <div class="text-center">
                                                                            <input class="form-control" type="date" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 bg-body mt-2">
                                                                        <div class="text-center">
                                                                            <input type="file" class="d-none" id="asigmentUpload" accept="file/*" />
                                                                            <label for="asigmentUpload" class="btn btn-primary fw-bolder" onclick="uploadAssigment();">Upload</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 bg-body mt-2">
                                                                        <div class="text-center d-grid">
                                                                            <span class="btn bg-info btn fw-bolder mb-2" id="viwestatus">Upload</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 bg-body mt-2">
                                                                        <div class="text-center d-grid">
                                                                            <span class="btn bg-success btn fw-bolder mb-2">Sbmit</span>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none" id="pofileBox">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-4 bg-black">
                                <div class=" col-2 d-grid mt-1">
                                    <a onclick="tporofileSwitch();" class="fw-bolder btn btn-danger text-white"><i class="bi bi-arrow-left-circle-fill"></i> Back</a>
                                </div>
                            </div>
                            <div class="col-4 text-center bg-black">
                                <h2 class="fw-bolder text-white">Teacher Profile</h2>
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

                                                        if (empty($image_data["path"])) {

                                                        ?>
                                                            <img src="resorce/studentProfile/profile-icon-9.png" class="rounded mt-5" style="width: 150px;" id="viwe" />
                                                        <?php

                                                        } else {
                                                        ?>

                                                            <img src="<?php echo $image_data["path"];?>" class="rounded mt-5" style="width: 150px;" id="viwe" />

                                                        <?php
                                                        }

                                                        ?>

                                                        <input type="file" class="d-none" id="pro" accept="image/*" />
                                                        <label for="pro" class="btn btn-primary mt-2" onclick="changeTImage();">Update Profile Image</label>
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
                                        <input type="text" value="<?php echo $data["moblie"];?>" class="form-control bg-transparent text-white" id="mno">
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
                                        <button class="btn btn-success" onclick="TprofileUpdate();">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="script.js"></script>
                <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php
}

?>