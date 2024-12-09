<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="self-study.png"/>
    <title>schoolEdu Admin Login</title>
</head>

<body style="background-color: #000000;background-image: linear-gradient(90deg,#000000 0%,#9FACE6 100%);">
    <div class="container-fluid">
        <div class="col-12" style="margin-top:300px;">
        <div class="col-12" id="boxA">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 mb-4 mt-0 text-center">
                    <h2 class="fw-bolder text-light ffs1">Admin Panel Login</h2>
                </div>
                <div class="col-lg-6 col-12">
                    <input type="text" class="form-control fw-bold bg-transparent text-light" placeholder="Enter Your Administration Email........" id="e"/>
                </div>
                <div class="col-lg-3 col-12 d-grid mt-lg-0 mt-2">
                    <button class="btn btn-primary" onclick="adminVerification();">Send Verification Code</button>
                </div>
            </div>
            <div class="col-12 mt-2">
            <div class="col-lg-12 col-12 d-grid text-center">
                <a href="index.php" class="btn-link text-warning" style="cursor: pointer;">Back To System Home Side</a>
            </div>
        </div>
        </div>
       
        <!--  -->
        <div class="col-12 d-none"id="boxB">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 mb-3 mt-0 text-center">
                    <h2 class="fw-bolder text-light ffs1">Verify My Administration</h2>
                </div>
                <div class="col-lg-6 col-12">
                    <input type="text" class="form-control fw-bold bg-transparent text-light" placeholder="Enter Your Verification Code........" id="acode"/>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-12 text-center mt-lg-3 mt-2">
                            <button class="btn btn-success" onclick="adminverify();">Conform My Administration</button>
                            <a href="adminLogin.php" class="btn btn-outline-light mt-lg-0 mt-md-0 mt-2">Back To Admin Login</a>
                        </div>
                    </div>
                </div>
                </div>
        <!--  -->
    </div>
    
    <div class="col-12 fixed-bottom d-none d-lg-block">
            <p class="text-center">&copy;2022 Menaka Siriwardhana || All Right Reserved</p>
        </div>
</div>
    <script src="script.js"></script>
</body>

</html>