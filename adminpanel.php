<?php require "connection.php";
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
                    <!--  -->
                    <div class="col-lg-2 col-4 container-fluid" style="height:100vh;background-color:#02010E;">
                        <div class="mt-1 mb-3 text-center">
                            <h2 class="fw-bold atext fs-1 text-warning">schoolEdu</h2>
                        </div>
                        <div class="mt-3 border-bottom border-white"></div>

                        <div class="mt-3">
                            <nav class="nav flex-column fs-5">
                                <a class="nav-link" href="manageadmin.php">Manage Admin</a>
                                <a class="nav-link" href="manageTeachers.php">Manage Teachers</a>
                                <a class="nav-link" href="manageAcadmicOfficers.php">Acadamic Officers</a>
                                <a class="nav-link" href="manageStudents.php">Manage Students</a>
                            </nav>
                        </div>
                        <div class=" col-1 mb-3 d-grid fixed-bottom">
                            <div class="row justify-content-center text-center">
                                <button class="btn btn-danger" onclick="AdminLogOut();"> Admin Log Out</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-10 col-8" id="panelBox">
                        <div class="row">
                            <div class="col-12 border-bottom border-danger">
                                <div class="row mt-3 mb-3">
                                    <div class="col-4">
                                        <h2 class="fw-bolder text-white">Dashbord</h2>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h1 class="fw-bolder text-white">Admin Panel</h1>
                                    </div>
                                    <div class="col-4" style="cursor: pointer;">
                                        <div class="text-end">
                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Update Profile">
                                                <?php

                                                $details_rs = Database::search("SELECT * FROM `admin`");
                                                $adminnum = $details_rs->num_rows;
                                                $admindata = $details_rs->fetch_assoc();

                                                $image_rs = Database::search("SELECT * FROM `admin_img` WHERE `admin_email`='" . $admindata["email"] . "'");
                                                $image_data = $image_rs->fetch_assoc();

                                                if (empty($image_data["code"])) {

                                                ?>
                                                    <img src="resorce/studentProfile/profile-icon-9.png" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="AdminporofileSwitch();" />
                                                <?php

                                                } else {
                                                ?>

                                                    <img src="<?php echo $image_data["code"]; ?>" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="AdminporofileSwitch();" />

                                                <?php
                                                }

                                                ?> <span class="fw-bolder fs-5"><?php echo $admindata["fname"] . " " . $admindata["lname"] ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Dashboard box-->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row justify-content-center">
                                        <div class="mt-1 col-2 rounded border border-primary" style="background-color:#C1CBEA;">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 mt-2">
                                                        <div class="text-center">
                                                            <h5 class=" fw-bold"><?php echo $adminnum ?></h5>
                                                            <label class="fw-bold">Administers</label>
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
                                        <div class="mt-1 col-2 offset-1 rounded border border-primary" style="background-color:#30508C;">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 mt-2">
                                                        <div class="text-center">
                                                            <?php
                                                            $t_rs = Database::search("SELECT * FROM `teacher`");
                                                            $tnum = $t_rs->num_rows;
                                                            ?>
                                                            <h5 class=" fw-bold text-white"><?php echo $tnum ?></h5>
                                                            <label class="fw-bold text-white">Teachers</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="text-center mt-1 mb-1">
                                                            <img src="resorce/panal viwe/teacher.png" style="height:60px; width: 60px; border-radius: 100%;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mt-1 col-2 offset-1 rounded border border-primary" style="background-color:#102035;">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 mt-2">
                                                        <div class="text-center">
                                                            <?php
                                                            $a_rs = Database::search("SELECT * FROM `acadamic_officer`");
                                                            $anum = $a_rs->num_rows;
                                                            ?>
                                                            <h5 class=" fw-bold text-white"><?php echo $anum ?></h5>
                                                            <label class="fw-bold text-white">Acd.Officers</label>
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
                                        <div class="mt-1 col-2 offset-1 rounded border border-primary" style="background-color:#707E8C">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <div class="text-center mt-2">
                                                            <?php
                                                            $s_rs = Database::search("SELECT * FROM `student`");
                                                            $snum = $s_rs->num_rows;
                                                            ?>
                                                            <h5 class=" fw-bold text-white"><?php echo $snum?></h5>
                                                            <label class="fw-bold text-white">Students</label>
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
                                <div class="col-12">
                                    <div class="row justify-content-center">
                                        <div class="col-4 rounded mt-5 text-center">
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="card" style="width: 18rem;height:250px;">
                                                        <img src="resorce/panal viwe/member-icon-8.jpg" class="card-img-top" style="height:250px;" />
                                                        <div class="card-body">
                                                            <?php
                                                            $t=($snum+$anum+$tnum+$adminnum);
                                                            ?>
                                                            <h4 class="card-title fw-bolder">Total Members</h4>
                                                            <p class="card-text fs-4 fw-bolder"><?php echo $t?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 rounded mt-5 text-center">
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="card" style="width: 18rem;height:250px;">
                                                        <img src="resorce/panal viwe/ra.jpg" class="card-img-top" style="height:140px;" />
                                                        <div class="card-body">
                                                            <h4 class="card-title fw-bolder">Number of Assignments Issued</h4>
                                                            <p class="card-text fs-4 fw-bold">12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 rounded mt-5 text-center">
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="card" style="width: 18rem;">
                                                        <img src="resorce/panal viwe/best results.png" class="card-img-top" style="height:150px;" />
                                                        <div class="card-body">
                                                            <h4 class="card-title fw-bolder">Best Results</h4>
                                                            <p class="card-text fs-4">100</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="row justify-content-center">
                                        <div class="col-4 rounded mt-5 text-center">
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="card" style="width: 18rem;height:250px;">
                                                        <img src="resorce/panal viwe/submit.png" class="card-img-top" style="height:150px;" />
                                                        <div class="card-body">
                                                            <h4 class="card-title fw-bolder"> Count of Submitted answer sheets</h4>
                                                            <p class="card-text fs-4 fw-bolder">120</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 rounded mt-5 text-center">
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="card" style="width: 18rem;height:250px;">
                                                        <img src="resorce/panal viwe/bst score.png" class="card-img-top" style="height:150px;" />
                                                        <div class="card-body">
                                                            <h4 class="card-title fw-bolder">75+ Results</h4>
                                                            <p class="card-text fs-4 fw-bold">20</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 rounded mt-5 text-center">
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                    <div class="card" style="width: 18rem;">
                                                        <img src="resorce/panal viwe/f.jpg" class="card-img-top" style="height:150px;" />
                                                        <div class="card-body">
                                                            <h4 class="card-title fw-bolder">Lowest Mark</h4>
                                                            <p class="card-text fs-4 fw-bold">10</p>
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
                    <!--  -->
                    <div class="col-lg-10 col-8 d-none" id="AdminProfile">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-4 bg-black">
                                        <div class=" col-8 d-grid mt-1">
                                            <a href="adminpanel.php" class="fw-bolder btn btn-danger text-white" onclick="AdminporofileSwitch();"><i class="bi bi-arrow-left-circle-fill"></i> Back To Admin Panel</a>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center bg-black">
                                        <h2 class="fw-bolder text-white">Admin Profile</h2>
                                    </div>
                                    <div class="col-4 text-center bg-black"></div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <div class="col-12">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <?php

                                                if (empty($image_data["code"])) {

                                                ?>
                                                    <img src="resorce/studentProfile/profile-icon-9.png" class="rounded mt-5" style="width: 150px;" id="viwe" onclick="AdminporofileSwitch();" />
                                                <?php

                                                } else {
                                                ?>

                                                    <img src="<?php echo $image_data["code"]; ?>" class="rounded mt-5" style="width: 150px;" id="viwe" onclick="AdminporofileSwitch();" />

                                                <?php
                                                }

                                                ?>
                                                <input type="file" class="d-none" id="pro" accept="image/*" />
                                                <label for="pro" class="btn btn-primary mt-2" onclick="changeAdminImage();">Update Profile Image</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 mt-4">
                                <div class="row justify-content-center">
                                    <div class="col-4 ">
                                        <label for="exampleFormControlInput1" class="form-label text-white fs-4">First Name</label>
                                        <input type="text" value="<?php echo $admindata["fname"]; ?>" class="form-control bg-transparent text-white fs-5" id="f">
                                    </div>
                                    <div class="col-4">
                                        <label for="exampleFormControlInput1" class="form-label text-white fs-4">Last Name</label>
                                        <input type="text" value="<?php echo $admindata["lname"]; ?>" class="form-control bg-transparent text-white fs-5" id="l">
                                    </div>
                                    <div class="col-8 mt-2">
                                        <label for="exampleFormControlInput1" class="form-label text-white fs-4">Email address</label>
                                        <input type="email" value="<?php echo $admindata["email"]; ?>" class="form-control text-white fs-5 bg-transparent" id="e">
                                    </div>
                                    <div class="col-8 mt-2">
                                        <label for="exampleFormControlInput1" class="form-label text-white fs-4">Mobile Number</label>
                                        <input type="text" value="<?php echo $admindata["mobile"]; ?>" class="form-control bg-transparent text-white fs-5 bg-transparent text-white fs-4" id="m">
                                    </div>
                                    <div class="col-8 mt-4 d-grid">
                                        <button class="btn btn-success" onclick="AdminprofileUpdate();">Update Admin Profile</button>
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
</body>

</html>