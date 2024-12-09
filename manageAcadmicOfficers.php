<?php require "connection.php";?>
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
                        <h2 class="fw-bold">Manage Acadamic Officers</h2>
                    </div>
                    <div class="col-4 mt-2 text-end">
                        <button class="btn btn-light fw-bold" onclick="acdamicloginsend();"> Send invitation to Officers <i class="bi bi-person-plus-fill"></i></button>
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
                                <div class="col-6 text-start">
                                    <label class="text-warning fs-3">Profile</label>
                                </div>
                                <div class="col-2 text-center">
                                    <label class="text-warning fs-3">Status</label>
                                </div>
                                <div class="col-1 text-center"></div>
                                <div class="col-1 text-cente"></div>
                            </div>
                        </div>
                        <?php
                        $rs = Database::search("SELECT * FROM `acadamic_officer`");
                        $anum = $rs->num_rows;


                        for ($x = 0; $x < $anum; $x++) {
                            $adata = $rs->fetch_assoc();

                            $count = $x + 1;



                        ?>
                            <div class="col-12 bg-gradient mb-2">
                                <div class="row">
                                    <div class="col-1 text-center">
                                        <label class="text-warning fs-4 mt-3 fw-bold text-white"><?php echo $count; ?></label>
                                    </div>
                                    <div class="col-6 mt-2 mb-2 d-grid text-start">
                                        <div class="row">
                                            <div class="col-1">
                                            <?php 
                                                        $image_rs = Database::search("SELECT * FROM `aimg` WHERE `a_email`='" . $adata["email"] . "'");
                                                        $image_data = $image_rs->fetch_assoc(); 

                                                        if (empty($image_data["code"])) {

                                                        ?>
                                                            <img src="resorce/studentProfile/profile-icon-9.png" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="tporofileSwitch();" />
                                                        <?php

                                                        } else {
                                                        ?>

                                                            <img src="<?php echo $image_data["code"];?>" style="height:60px; width: 60px; border-radius: 100%; cursor: pointer;" onclick="tporofileSwitch();" />

                                                        <?php
                                                        }
                                                        ?>
                                            </div>
                                            <div class="col-9 d-grid">
                                                <input disabled class="fw-bolder fs-5 fw-bold bg-transparent border-0 text-white" id="e" value="<?php echo $adata["email"]; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <label class="text-warning fs-4 mt-3 fw-bold text-white"><?php
                                                                                                    $srs = Database::search("SELECT*FROM `status` WHERE `id`='" . $adata["status_id"] . "'");
                                                                                                    $sdata = $srs->fetch_assoc();
                                                                                                    echo $sdata["status"]; ?>
                                        </label>
                                    </div>
                                    <div class="col-2 text-center mt-3">
                                        <?php

                                        if ($sdata["id"]==1){
                                        ?>
                                            <button class="btn btn-warning fw-bold" onclick='changeADstatus("<?php echo $adata["email"];?>");'><i class="bi bi-person-x-fill"></i> Deactivate</button>

                                        <?php
                                        } else {
                                        ?>
                                            <button class="btn btn-success fw-bold" onclick='changeADstatus("<?php echo $adata["email"];?>");'><i class="bi bi-person-check-fill"></i> Activate</button>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-1 text-center mt-3">
                                        <button class="btn btn-danger fw-bold" onclick='Removeofficer("<?php echo $adata["email"];?>");'><i class="bi bi-trash"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="modal" tabindex="-1" id="acdModel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Send Acadamic Login</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">

                                        <div class="col-12">
                                            <label class="form-lable">Enter Officer email</label>
                                            <input type="text" class="form-control" id="officermail" />

                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="sendAinvite();">Send</button>
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