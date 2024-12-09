<?php require "connection.php" ?>
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
                    <div class="col-4bg-black">
                        <div class="col-12 logof"></div>
                        <div class="col-12">
                            <p class="text-center fs-5 text-warning title1">SchoolEdu</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-9 ">
                        <div class="row justify-content-center g-2">
                            <div class="col-3 ">
                                <label for="exampleFormControlInput1" class="form-label text-white">First Name</label>
                                <input type="text" class="form-control bg-transparent text-white" id="fname">
                            </div>
                            <div class="col-3">
                                <label for="exampleFormControlInput1" class="form-label text-white">Middle Name</label>
                                <input type="text" class="form-control bg-transparent text-white " id="mname">
                            </div>
                            <div class="col-3">
                                <label for="exampleFormControlInput1" class="form-label text-white">Last Name</label>
                                <input type="text" class="form-control bg-transparent text-white" id="lname">
                            </div>
                            <div class="col-9">
                                <label for="exampleFormControlInput1" class="form-label text-white">Name With Initials</label>
                                <input type="text" class="form-control bg-transparent text-white" id="nwi">
                            </div>
                            <div class="col-9">
                                <label for="exampleFormControlInput1" class="form-label text-white">Email</label>
                                <input type="email" class="form-control bg-transparent text-white" id="email">
                            </div>
                            <div class="col-9">
                                <label for="exampleFormControlInput1" class="form-label text-white">Mobile Number</label>
                                <input type="text" class="form-control bg-transparent text-white" id="mobile">
                            </div>
                            <div class="col-5">
                                <label for="exampleFormControlInput1" class="form-label text-white">Date Of Birth</label>
                                <input type="date" class="form-control bg-transparent text-white" id="birth">
                            </div>
                            <div class="col-4">
                                <label class="form-label text-white">Gender</label>
                                <select class="form-select bg-transparent text-white" id="g">
                                    <?php

                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $n = $rs->num_rows;

                                    for ($x; $x < $n; $x++) {
                                        $d = $rs->fetch_assoc();

                                    ?>

                                        <option class="bg-black" value="<?php echo $d["id"]; ?>"><?php echo $d["gender"]; ?></option>

                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-9">
                                <label for="exampleFormControlInput1" class="form-label text-white">NIC Number</label>
                                <input type="email" class="form-control bg-transparent text-white" id="nic">
                            </div>

                            <div class="col-5">
                                <label class="form-label text-white">Marital Status</label>
                                <select class="form-select bg-transparent text-white" id="ms">
                                    <?php

                                    $mrs = Database::search("SELECT * FROM `marital_status`");
                                    $m = $mrs->num_rows;

                                    for ($y; $y < $m; $y++) {
                                        $mt = $mrs->fetch_assoc();

                                    ?>

                                        <option class="bg-black" value="<?php echo $mt["id"]; ?>"><?php echo $mt["type"]; ?></option>

                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label text-white">Nationality</label>
                                <select class="form-select bg-transparent text-white" id="ns">
                                    <?php

                                    $nrs = Database::search("SELECT * FROM `nationality`");
                                    $n = $nrs->num_rows;

                                    for ($z; $z < $n; $z++) {
                                        $nt = $nrs->fetch_assoc();

                                    ?>

                                        <option class="bg-black" value="<?php echo $nt["id"]; ?>"><?php echo $nt["name"]; ?></option>

                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-9 ">
                                <label for="exampleFormControlInput1" class="form-label text-white">Password</label>
                                <input type="password" class="form-control bg-transparent text-white" id="pw">
                            </div>
                            <div class="col-9 mt-3 d-grid">
                                <button class="btn btn-success" onclick="studentReg();">Submit</button>
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