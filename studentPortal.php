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
        <title>schoolEdu Admin Panel</title>
    </head>

    <body style="background-color: #000000;background-image: linear-gradient(90deg,#000000 0%,#9FACE6 100%);">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-12 border-bottom bg-dark border-danger">
                                    <div class="row mt-3 mb-3">
                                        <div class="col-3" style="cursor: pointer;" onclick='window.location="studentProfile.php"'>
                                            <div class="text-start">
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Update Student Profile">
                                                    <?php
                                                    $Profile_image_rs = Database::search("SELECT * FROM `sprofile_image` WHERE `student_email`='" . $email . "' ");
                                                    $Profile_image_num = $Profile_image_rs->num_rows;
                                                    $Profile_image_data = $Profile_image_rs->fetch_assoc();

                                                    if ($Profile_image_num == 1) {
                                                    ?>
                                                        <img src="<?php echo $Profile_image_data["code"]; ?>" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick='window.location="studentProfile.php";' />

                                                    <?php

                                                    } else {

                                                    ?>

                                                        <img src="resorce/studentProfile/profile-icon-9.png" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick='window.location="studentProfile.php";' />

                                                    <?php

                                                    }

                                                    ?>
                                                    <span class="fw-bolder fs-5 text-white"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-4 text-start">
                                            <h1 class="fw-bolder text-white">SchoolEdu Student Portal</h1>
                                        </div>
                                        <?php
                                        $grs = Database::search("SELECT * FROM `grade` WHERE `id`= '" . $data["grade_id"] . "' ");
                                        $gradedata = $grs->fetch_assoc();
                                        ?>
                                        <div class="col-2 text-start">
                                            <?php if (0 < $data["grade_id"]) {
                                            ?>
                                                <h2><span class="badge bg-primary"><?php echo $gradedata["name"]; ?></span></h2>

                                            <?php
                                            } else {
                                            ?>
                                                <h2><span class="badge bg-primary">Grade Pending</span></h2>

                                            <?php
                                            } ?>
                                        </div>
                                        <div class="col-3 text-end">
                                            <button class="btn btn-danger fw-bold" onclick="signout();">Logout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Dashboard box-->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row justify-content-center">
                                            <div class="col-4" style="background-color:#C1CBEA;">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 mt-2">
                                                            <div class="text-center">
                                                                <h5 class=" fw-bold">30</h5>
                                                                <label class="fw-bold">Available Assignments</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 ">
                                                            <div class="text-center mt-1 mb-1">
                                                                <img src="resorce/panal viwe/admin.jpg" style="height:60px; width: 60px; border-radius: 100%;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4" style="background-color:#102035;">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6 mt-2">
                                                            <div class="text-center">
                                                                <h5 class=" fw-bold text-white">30</h5>
                                                                <label class="fw-bold text-white">Submitted Assignments Count</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="text-center mt-1 mb-1">
                                                                <img src="resorce/panal viwe/acd officer.webp" style="height:60px; width: 60px; border-radius: 100%;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4" style="background-color:#707E8C">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6 ">
                                                            <div class="text-center mt-2">
                                                                <h5 class=" fw-bold text-white">30</h5>
                                                                <label class="fw-bold text-white">Total Mark</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="text-center mt-1 mb-1">
                                                                <img src="resorce/panal viwe/students.webp" style="height:60px; width: 60px; border-radius: 100%;" />
                                                            </div>
                                                        </div>
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
                                                                            <div class="col-1 bg-body"></div>
                                                                            <div class="col-1 bg-body"></div>
                                                                            <div class="col-2 bg-body">
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
                                                                            <div class="col-2 bg-body">
                                                                                <div class="text-center">
                                                                                    <label class="fw-bold">2022.12.31</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-1 bg-body">
                                                                                <div class="text-center">
                                                                                    <span class="badge bg-primary btn fw-bolder mb-2">Download</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-1 bg-body">
                                                                                <div class="text-center">
                                                                                    <span class="badge bg-success btn fw-bolder mb-2">Upload</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-2 bg-body">
                                                                                <div class="text-center">
                                                                                    <span class="badge bg-success btn fw-bolder mb-2">15</span>
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="script.js"></script>
                    <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php

} ?>