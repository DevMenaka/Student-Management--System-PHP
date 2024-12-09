var av;

function adminVerification() {

    var email = document.getElementById("e");

    var f = new FormData();

    f.append("e", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alert("Verification Code Send Your Email Please Check Your Inbox");
                var boxA = document.getElementById("boxA");
                var boxB = document.getElementById("boxB");

                boxA.classList.toggle("d-none");
                boxB.classList.toggle("d-none");
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "adminLoginProcess.php", true);
    r.send(f);
}

function adminverify() {
    var verification = document.getElementById("acode");
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminpanel.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "verifyAdmin.php?v=" + verification.value, true);
    r.send();
}

function studentReg() {
    var f = document.getElementById("fname");
    var m = document.getElementById("mname");
    var l = document.getElementById("lname");
    var nwi = document.getElementById("nwi");
    var e = document.getElementById("email");
    var mn = document.getElementById("mobile");
    var b = document.getElementById("birth");
    var g = document.getElementById("g");
    var nic = document.getElementById("nic");
    var ms = document.getElementById("ms");
    var ns = document.getElementById("ns");
    var pw = document.getElementById("pw");

    var form = new FormData;
    form.append("f", f.value);
    form.append("m", m.value);
    form.append("l", l.value);
    form.append("nwi", nwi.value);
    form.append("e", e.value);
    form.append("mn", mn.value);
    form.append("b", b.value);
    form.append("g", g.value);
    form.append("nic", nic.value);
    form.append("ms", ms.value);
    form.append("ns", ns.value);
    form.append("pw", pw.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t=="success") {
                alert("Registerd Success");
                window.location="studentSignin.php";
            }else{
                alert(t);
            }
            
        }
    }
    r.open("POST", "studentSignUpProcess.php", true);
    r.send(form);
}

var sm;

function SsignIn() {
    var email = document.getElementById("e1");
    var password = document.getElementById("pw2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();

    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "studentPortal.php";
            } else if (t == "no") {
                var m = document.getElementById("vModel");
                sm = new bootstrap.Modal(m);
                sm.show();
            } else if(t=="expired") {
                alert("Your free trial period of the Remember option has expired. Please pay the applicable amount and re-enable the option.");
            }else{
                alert(t);
            }
        }
    };

    r.open("POST", "studentSignInProcess.php", true);
    r.send(f);

}

function studentVedrfy() {
    var email = document.getElementById("e1");
    var vcode = document.getElementById("sv");

    var f = new FormData();
    f.append("e", email.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "success") {

                sm.hide();
                alert("Verified");
                window.location = "studentPortal.php";

            } else
                alert(t);
        }

    };

    r.open("POST", "studentVerifyProcess.php", true);
    r.send(f);

}

function sforgotPassword() {

    var email = document.getElementById("e1");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                var boxA = document.getElementById("signInBox");
                var boxB = document.getElementById("resetPw");

                boxA.classList.toggle("d-none");
                boxB.classList.toggle("d-none");
            } else {
                alert(t);
            }
        }
    };


    r.open("GET", "sfogotPasswordProcess.php?e=" + email.value, true);
    r.send();


}
function resetSpw() {
    var email = document.getElementById("e1");
    var np = document.getElementById("npi");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "success") {

                alert("Your password has been successfully reset");
                window.location = "studentSignin.php";

            } else
                alert(t);
        }

    };

    r.open("POST", "resetSPassword.php", true);
    r.send(f);

}

function SendScode() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    };


    r.open("GET", "sendStudentVerificationCode.php?e=" + email.value, true);
    r.send();

}
function changeImage() {
    var viwe = document.getElementById("viweImage");
    var file = document.getElementById("profileimg");

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        viwe.src = url;
    }
}

function updateSprofile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mname = document.getElementById("mname");
    var mobile = document.getElementById("mno");
    var mstatus = document.getElementById("ms");
    var n = document.getElementById("ns");
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("mn", mname.value);
    f.append("m", mobile.value);
    f.append("ms", mstatus.value);
    f.append("n", n.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure don't want to update Profile Image?");

        if (confirmation) {
            alert("you have select any image");
        }

    } else {
        f.append("image", image.files[0]);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "updateStudentProfile.php", true);
    r.send(f);
}
function signout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "studentSignin.php";
            } else {
                alert(t);
            }
        }

    };

    r.open("GET", "ssignoutprocess.php", true);
    r.send();

}

var bm;

function sendRegisterForm() {
    var m = document.getElementById("regModel");
    bm = new bootstrap.Modal(m);
    bm.show();
}

function sendRegForm() {
    var email = document.getElementById("Aemail");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("A registration form has been sent to the concerned student.");
                bm.hide();
            } else {
                alert(t);
            }
        }
    };


    r.open("GET", "sendRegForm.php?e=" + email.value, true);
    r.send();
}
var am;
function acdamicloginsend() {
    var m = document.getElementById("acdModel");
    am = new bootstrap.Modal(m);
    am.show();
}
function sendAinvite() {

    var email = document.getElementById("officermail");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Acadamic Login has been sent to the concerned Officer.");
                am.hide();
                window.location.reload();
            } else {
                alert(t);
            }
        }
    };


    r.open("GET", "acadamicInvitation.php?e=" + email.value, true);
    r.send();

}

function acadamicFLogin() {
    var email = document.getElementById("e");
    var np = document.getElementById("v");
    var rnp = document.getElementById("u");
    var vcode = document.getElementById("p");

    var f = new FormData();
    f.append("e", email.value);
    f.append("v", np.value);
    f.append("u", rnp.value);
    f.append("p", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "success") {
                alert("You have been successfully registered in the system. Please click on the profile picture and update your information!!");
                window.location = "acadamicPortal.php";
            } else
                alert(t);
        }
    }
    r.open("POST", "acadamicFirstLogin.php", true);
    r.send(f);
}

function uploadAssigment() {
    var viwe = document.getElementById("viweImage");
    var file = document.getElementById("profileimg");

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        viwe.src = url;
    }
}
function uploadasssgment() {
    var aid = document.getElementById("aid");
    var subject = document.getElementById("subj");
    var sdate = document.getElementById("sdate");
    var edate = document.getElementById("edate");
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("aid", aid.value);
    f.append("subject", subject.value);
    f.append("sdate", sdate.value);
    f.append("edate", edate.value);


    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure don't want to update Profile Image?");

        if (confirmation) {
            alert("you have select any image");
        }

    } else {
        f.append("image", image.files[0]);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "uploadAssigment.php", true);
    r.send(f);
}
var Tm;
function Teactherloginsend() {
    var m = document.getElementById("TModel");
    Tm = new bootstrap.Modal(m);
    Tm.show();
}

function sendTeachinvite() {

    var email = document.getElementById("teachermail");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Teacher Login has been sent to the concerned person.");
                window.location.reload();
                Tm.hide();
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "teachersinvite.php?e=" + email.value, true);
    r.send();

}
function TeacherLogin() {
    var uname = document.getElementById("un");
    var password = document.getElementById("pw");
    var rme = document.getElementById("rememberme");
    var f = new FormData();

    f.append("u", uname.value);
    f.append("pw", password.value);
    f.append("rme", rme.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "teacherPortal.php";
            } else if (t == "no") {
                var m = document.getElementById("vModel");
                Tm = new bootstrap.Modal(m);
                Tm.show();
            }
        }
    }

    r.open("POST", "teacherLoginProcess.php", true);
    r.send(f);
}

function teacherVedrfy() {
    var user = document.getElementById("un");
    var vcode = document.getElementById("tv");
    var email = document.getElementById("e");

    var f = new FormData();
    f.append("u", user.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "success") {
                alert("Your account has been successfully verified. Please update your teacher profile");
                window.location = "teacherPortal.php";

            } else
                alert(t);
        }

    };

    r.open("POST", "teacherVerifyProcess.php?e=" + email.value, true);
    r.send(f);

}
function tporofileSwitch() {
    var boxA = document.getElementById("portalBox");
    var boxB = document.getElementById("pofileBox");

    boxA.classList.toggle("d-none");
    boxB.classList.toggle("d-none");
}

function tsignout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "teacherLogin.php";
            } else {
                alert(t);
            }
        }

    };

    r.open("GET", "ssignoutprocess.php", true);
    r.send();

}

function changestatus(email) {

    var email = email;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                alert("Deactivated");
                window.location.reload();

            } else if (t == "activated") {

                alert("Activated");
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changeStatusProcess.php?e=" + email, true);
    r.send();
}

function RemoveTeacher(email) {

    var e = email;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            window.location.reload();
        }
    }

    r.open("GET", "removeTeacher.php?e=" + e, true);
    r.send();

}

function changeADstatus(email) {
    var email = email;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                alert("Deactivated");
                window.location.reload();

            } else if (t == "activated") {

                alert("Activated");
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changeAdcStatusProcess.php?e=" + email, true);
    r.send();
}
function Removeofficer(email) {
    var email = email;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Acadamic Officer Is Removed");
                window.location.reload();
            }

        }
    }

    r.open("GET", "removeofficer.php?e=" + email, true);
    r.send();

}
function changeTImage() {
    var viwe = document.getElementById("viwe");
    var file = document.getElementById("pro");

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        viwe.src = url;
    }
}
function TprofileUpdate() {
    var uname = document.getElementById("un");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mno");
    var nic = document.getElementById("nic");
    var gender = document.getElementById("g");
    var pw = document.getElementById("pw");
    var marital = document.getElementById("ms");
    var image = document.getElementById("pro");

    var f = new FormData();
    f.append("un", uname.value);
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("nic", nic.value);
    f.append("g", gender.value);
    f.append("p", pw.value);
    f.append("mar", marital.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure don't want to update Profile Image?");

        if (confirmation) {
            alert("you have select any image");
        }

    } else {
        f.append("image", image.files[0]);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
            window.location = "teacherLogin.php";
        }
    }

    r.open("POST", "updateTeacherProfileProcess.php", true);
    r.send(f);
}

var avm;

function AeacherLogin() {
    var uname = document.getElementById("un");
    var password = document.getElementById("pw");
    var rme = document.getElementById("rememberme");

    var f = new FormData();

    f.append("u", uname.value);
    f.append("pw", password.value);
    f.append("rme", rme.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "acadamicPortal.php";
            } else if (t == "no") {
                var m = document.getElementById("AvModel");
                avm = new bootstrap.Modal(m);
                avm.show();
            }
        }
    }

    r.open("POST", "acadamicOfficerLoginProcess.php", true);
    r.send(f);
}

function AeacherVedrfy() {
    var user = document.getElementById("un");
    var vcode = document.getElementById("tv");
    var email = document.getElementById("e");

    var f = new FormData();
    f.append("u", user.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "success") {
                alert("Your account has been successfully verified. Please update your Acdamic Officer profile");
                window.location = "acadamicPortal.php";

            } else
                alert(t);
        }

    };

    r.open("POST", "acadamicOfficerVerify.php?e=" + email.value, true);
    r.send(f);

}
function AporofileSwitch() {
    var boxA = document.getElementById("ApBox");
    var boxB = document.getElementById("pofileBox");

    boxA.classList.toggle("d-none");
    boxB.classList.toggle("d-none");
}
function changeAImage() {
    var viwe = document.getElementById("viwe");
    var file = document.getElementById("pro");

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        viwe.src = url;
    }
}

function AprofileUpdate() {
    var uname = document.getElementById("un");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mno");
    var nic = document.getElementById("nic");
    var gender = document.getElementById("g");
    var pw = document.getElementById("pw");
    var marital = document.getElementById("ms");
    var image = document.getElementById("pro");

    var f = new FormData();
    f.append("un", uname.value);
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("nic", nic.value);
    f.append("g", gender.value);
    f.append("p", pw.value);
    f.append("mar", marital.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure don't want to update Profile Image?");

        if (confirmation) {
            alert("you have select any image");
        }

    } else {
        f.append("image", image.files[0]);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
            window.location = "acadamicOfficerLogin.php";
        }
    }

    r.open("POST", "updateAcadamicProfileProcess.php", true);
    r.send(f);
}

function Asignout() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "acadamicOfficerLogin.php";
            } else {
                alert(t);
            }
        }

    };

    r.open("GET", "ssignoutprocess.php", true);
    r.send();

}

function changeSstatus(email) {
    var email = email;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                alert("Deactivated");
                window.location.reload();

            } else if (t == "activated") {

                alert("Activated");
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changeSstatusProcess.php?e=" + email, true);
    r.send();
}

function Sremove(email) {
    var email = email;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Student Is Removed");
                window.location.reload();
            }

        }
    }

    r.open("GET", "removestudents.php?e=" + email, true);
    r.send();

}

var adminm;
function Adminloginsend() {
    var m = document.getElementById("adminModel");
    adminm = new bootstrap.Modal(m);
    adminm.show();
}

function sendAdmininvite() {

    var email = document.getElementById("Adminmail");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Admin Login has been sent to the concerned person.");
                window.location.reload();
                adminm.hide();
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "admininvite.php?e=" + email.value, true);
    r.send();

}

function AdminporofileSwitch() {
    var boxA = document.getElementById("panelBox");
    var boxB = document.getElementById("AdminProfile");

    boxA.classList.toggle("d-none");
    boxB.classList.toggle("d-none");
}

function changeAdminImage() {
    var viwe = document.getElementById("viwe");
    var file = document.getElementById("pro");

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        viwe.src = url;
    }
}

function setGrade(email) {
    var email = email;
    var grade = document.getElementById("inputGroupSelect04");

    var f = new FormData()
    f.append("g", grade.value);
    f.append("e", email);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            window.location.reload();
        }
    }

    r.open("POST", "gradeUpdateProcess.php", true);
    r.send(f);
}

function AdminprofileUpdate() {
    var fname = document.getElementById("f");
    var lname = document.getElementById("l");
    var mobile = document.getElementById("m");
    var email = document.getElementById("e");
    var image = document.getElementById("pro");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("e", email.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure don't want to update Profile Image?");

        if (confirmation) {
            alert("you have select any image");
        }

    } else {
        f.append("image", image.files[0]);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
            window.location.reload();
        }
    }

    r.open("POST", "updateAdminProfileProcess.php", true);
    r.send(f);
    
}
function changeAdminstatus(email) {
    var email = email;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                alert("Deactivated");
                window.location.reload();

            } else if (t == "activated") {

                alert("Activated");
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "changeAdminstatusProcess.php?e=" + email, true);
    r.send();
}

function Adminremove(email) {
    var email = email;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Admin Is Removed");
                window.location.reload();
            }

        }
    }

    r.open("GET", "removeAdmin.php?e=" + email, true);
    r.send();

}
function AdminLogOut() {
    window.location = "index.php";
}