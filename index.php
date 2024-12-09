<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <title>Student Login</title>
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
                                        <div class="col-12 hlogo"></div>
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
                                        <div class="col-10 border-bottom border-2 border-light mb-5">
                                            <p class="title2 text-light">Select Your Role In The System</p>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <div class="row justify-content-center">
                                                <div class="col-3 mt-2 text-center">
                                                <img src="resorce/student.png" style="height:80px; width: 80px; border-radius: 100%; cursor: pointer;" onclick='window.location="studentSignin.php";' />
                                                <p class="form-label text-white fs-5">Student</p>
                                                </div>
                                                <div class="col-3 mt-2 text-center">
                                                <img src="resorce/teacher (2).png" style="height:80px; width: 80px; border-radius: 100%; cursor: pointer;" onclick='window.location="teacherLogin.php";' />
                                                <p class="form-label text-warning fs-5">Teacher</p>
                                                </div>
                                                <div class="col-3 mt-2 text-center">
                                                <img src="resorce/acd.png" style="height:80px; width: 80px; border-radius: 100%; cursor: pointer;" onclick='window.location="acadamicOfficerLogin.php";' />
                                                <p class="form-label text-info fs-5">Acadamic Officer</p>
                                                </div>
                                                <div class="col-3 mt-2 text-center">
                                                <img src="resorce/admin.png" style="height:80px; width: 80px; border-radius: 100%; cursor: pointer;" onclick='window.location="adminLogin.php";' />
                                                <p class="form-label text-danger fw-bolder fs-5">Admin</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 fixed-bottom d-none d-lg-block">
                                    <p class="text-center text-secondary">&copy;2022 studentEdu.lk || All Right Reserved</p>
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
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>