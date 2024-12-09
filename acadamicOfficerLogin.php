<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <title>Acadamic Login</title>
    <link rel="icon" href="self-study.png" />
</head>

<body style="background-color: #000000;background-image: linear-gradient(90deg,#000000 0%,#9FACE6 100%);">

    <div class="container-fluid d-flex justify-content-center">
        <div class="row align-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="col-12 mt-5 mt-lg-5 mb-lg-0 mb-5">
                            <div class="row g-4 justify-content-center">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 logo"></div>
                                        <div class="col-12">
                                            <p class="text-center text-warning title1">SchoolEdu</p>
                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="fs-5 text-primary">Start, switch, or advance your career with more than
                                                5,400 courses,Professional Certificates, and degrees from world-class universities
                                                and companies.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="12" id="signInBox">
                                    <div class="row justify-content-center">
                                        <div class="col-10 border-bottom border-light mb-5">
                                            <p class="title2 text-light">Acadamic Officers Log In</p>
                                        </div>
                                        <?php

                                        $user = "";
                                        $password = "";

                                        if (isset($_COOKIE["user"])) {
                                            $user = $_COOKIE["user"];
                                        }
                                        if (isset($_COOKIE["password"])) {
                                            $password = $_COOKIE["password"];
                                        }

                                        ?>
                                        <div class="col-10 mt-2">
                                            <label class="form-label fs-5 text-white">User Name</label>
                                            <input type="text" class="form-control bg-transparent text-white" id="un"/>
                                        </div>
                                        <div class="col-10 mt-2">
                                            <label class="form-label fs-5 text-white">Password</label>
                                            <input type="password" class="form-control bg-transparent text-white" id="pw"/>
                                        </div>

                                        <div class="col-5 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="rememberme" />
                                                <label class="form-check-label text-white">Remember Me</label>
                                            </div>
                                        </div>

                                        <div class="col-5 text-end mt-2">
                                            <a href="#" class="link-info" ondblclick="AforgotPassword();">Forgot Password</a>
                                        </div>

                                        <div class="col-10 col-lg-10 d-grid mt-2">
                                            <button class="btn btn-primary" ondblclick="AeacherLogin();">Log In</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 fixed-bottom d-none d-lg-block">
                                    <p class="text-center text-secondary">&copy;2022 studentEdu.lk || All Right Reserved</p>
                                </div>
                                <div class="12 d-none" id="resetPw">
                                    <div class="row justify-content-center">
                                        <div class="col-10 border-bottom border-light mb-5">
                                            <p class="title2 text-light">Reset Password</p>
                                        </div>
                                        <div class="col-5">
                                            <label class="form-label fs-5 text-white">Enter New Password</label>
                                            <input type="password" class="form-control bg-transparent text-white" id="npi" />
                                        </div>
                                        <div class="col-5">
                                            <label class="form-label fs-5 text-white">Conform Password</label>
                                            <input type="password" class="form-control bg-transparent text-white" id="rnp" />
                                        </div>
                                        <div class="col-10 mt-2">
                                            <label class="form-label fs-5 text-white">Enter Veryfication Code</label>
                                            <input type="text" class="form-control bg-transparent text-white" id="vc" />
                                        </div>
                                        <div class="col-10 col-lg-10 d-grid mt-2">
                                            <button class="btn btn-success fw-bold"onclick="aresetSpw();">Reset Password</button>
                                        </div>
                                        <div class="col-10 col-lg-10 d-grid mt-2">
                                            <a href="acadamicOfficerLogin.php" class="btn btn-outline-danger fw-bold">Back to Login</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-0 vh-100 d-lg-block d-none">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="resorce/img1.jpg" class="d-block vh-100 w-100" alt="..." />
                                </div>
                                <div class="carousel-item">
                                    <img src="resorce/img2.jpg" class="d-block vh-100 w-100 " alt="..." />
                                </div>
                                <div class="carousel-item">
                                    <img src="resorce/img3.jpg" class="d-block vh-100 w-100" alt="..." />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="AvModel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Acadamic Veryfication</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-12">
                                    <label class="form-lable">Enter Your Veryfication Code</label>
                                        <input type="text" class="form-control" id="tv" />
                                </div>
                                <div class="col-12">
                                    <label class="form-lable">Email</label>
                                        <input type="email" class="form-control" id="e" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="AeacherVedrfy();" >Verify</button>
                        </div>
                    </div>
                </div>
            </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>