<?php require "connection.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="icon" href="self-study.png" />
    <title>schoolEdu Admin Panel</title>
</head>

<body style="background-color: #000000;background-image: linear-gradient(90deg,#000000 0%,#9FACE6 100%);">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-4 mt-2 fw-bold text-light">
                        <a href="adminpanel.php" class="btn btn-outline-secondary fw-bold"><i class="bi bi-arrow-left"></i> Go To Dashboard</a>
                    </div>
                    <div class="col-4 mt-2 text-light text-center">
                        <h2 class="fw-bold">Manage Students</h2>
                    </div>
                </div>
            </div>
            <!-- Admin box-->
            <div class="col-12 mt-3">
                <div class="row justify-content-center">
                    <div class="col-11 rounded">
                        <div class="col-12 border-bottom border-info bg-gradient mt-3">
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label class="text-warning fs-3">#</label>
                                </div>
                                <div class="col-3 text-start">
                                    <label class="text-warning fs-3">Profile</label>
                                </div>
                                <div class="col-2 text-center">
                                    <label class="text-warning fs-3"> SET Grade</label>
                                </div>
                                <div class="col-1 text-center"></div>
                                <div class="col-3 text-center">
                                    <label class="text-warning fs-3">Status</label>
                                </div>
                                <div class="col-1 text-center"></div>
                                <div class="col-1 text-cente"></div>
                            </div>
                        </div>
                        <?php
                        $srs = Database::search("SELECT * FROM `student`");
                        $snum = $srs->num_rows;

                        for ($x = 0; $x < $snum; $x++) {
                            $sdata = $srs->fetch_assoc();

                            $count = $x + 1;

                        ?>
                            <div class="col-12 bg-gradient mb-2">
                                <div class="row">
                                    <div class="col-1 text-center">
                                        <label class="text-warning fs-4 mt-3 fw-bold text-white"><?php echo $count ?></label>
                                    </div>
                                    <div class="col-3 text-start">
                                        <label class="text-warning fs-4 mt-2">
                                            <?php
                                            $image_rs = Database::search("SELECT * FROM `sprofile_image` WHERE `student_email`='" . $sdata["email"] . "'");
                                            $image_data = $image_rs->fetch_assoc();


                                            if (empty($image_data["code"])) {

                                            ?>
                                                <img src="resorce/studentProfile/profile-icon-9.png" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="tporofileSwitch();" />
                                            <?php

                                            } else {
                                            ?>

                                                <img src="<?php echo $image_data["code"]; ?>" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="tporofileSwitch();" />

                                            <?php
                                            }
                                            ?>
                                            <input disabled class="fw-bolder bg-transparent border-0 fw-bold text-white" value="<?php echo $sdata["email"]; ?>" />
                                        </label>
                                    </div>
                                    <div class="col-2 text-start mt-3">
                                        <div class="input-group">
                                            <select class="form-select bg-transparent text-white" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <option class="bg-black" value="0">Select Grade</option>
                                                <?php

                                                $grs = Database::search("SELECT*FROM `grade`");
                                                $gnum = $grs->num_rows;

                                                for ($x = 0; $x < $gnum; $x++) {
                                                    $gdata = $grs->fetch_assoc();

                                                ?>
                                                    <option class="bg-black" value="<?php echo $gdata["id"]; ?>"><?php echo $gdata["name"]; ?></option>
                                                <?php

                                                }

                                                ?>
                                            </select>
                                            <button class="btn text-white btn-outline-primary" type="button" onclick='setGrade("<?php echo $sdata["email"]; ?>");'>Button</button>
                                        </div>
                                    </div>
                                    <div class="col-1 text-center">
                                        <?php
                                        $gdrs = Database::search("SELECT*FROM `grade` WHERE `id`='" . $sdata["grade_id"] . "'");
                                        $gddata = $gdrs->fetch_assoc();
                                        ?>
                                        <label class="text-warning fs-4 mt-3 fw-bold text-white"><?php echo $gddata["name"]; ?></label>
                                    </div>
                                    <div class="col-1 text-center mt-3">
                                        <button class="btn btn-info fw-bold"><i class="bi bi-pencil-square"></i> results</button>
                                    </div>
                                    <div class="col-1 text-center">
                                        <label class="text-warning fs-4 mt-3 fw-bold text-white"><?php
                                                                                                    $srs = Database::search("SELECT*FROM `status` WHERE `id`='" . $sdata["student_status"] . "'");
                                                                                                    $ssdata = $srs->fetch_assoc();
                                                                                                    echo $ssdata["status"]; ?></label>
                                    </div>
                                    <div class="col-2 mt-3 text-center">
                                        <?php

                                        if ($ssdata["id"] == 1) {
                                        ?>
                                            <button class="btn btn-warning fw-bold" onclick='changeSstatus("<?php echo $sdata["email"]; ?>");'><i class="bi bi-person-x-fill"></i> Deactivate</button>

                                        <?php
                                        } else {
                                        ?>
                                            <button class="btn btn-success fw-bold" onclick='changeSstatus("<?php echo $sdata["email"]; ?>");'><i class="bi bi-person-check-fill"></i> Activate</button>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-1 text-center mt-3">
                                        <button class="btn btn-danger fw-bold" onclick='Sremove("<?php echo $sdata["email"]; ?>");'><i class="bi bi-trash"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
            <script src="script.js"></script>
</body>

</html>