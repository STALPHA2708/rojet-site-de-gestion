<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        .pad-top {
            padding-top: 50px;
        }
    </style>
</head>

<body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;">
    <!-- Start: Navbar Centered Links -->
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <?php
                if (!isset($_SESSION["id"])) {
                ?>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" data-bss-hover-animate="jello" href="login.html">Log in</a></li>
                        <li class="nav-item"><a class="nav-link" data-bss-hover-animate="tada" href="signup.html">Sign up</a></li>
                    </ul><a class="btn btn-primary shadow" role="button" data-bss-hover-animate="pulse" href="signup.html">Sign up</a>
                <?php
                } else {
                ?>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" data-bss-hover-animate="jello" href="class.php">My class</a></li>
                        <li class="nav-item"><a class="nav-link" data-bss-hover-animate="tada" href="profile.php">Edit Profile</a></li>
                    </ul><a class="btn btn-danger shadow" role="button" data-bss-hover-animate="pulse" href="logout.php">log out</a>
                <?php
                }
                ?>  
        </div>
    </nav><!-- End: Navbar Centered Links -->
    <header class="bg-primary-gradient">
        <!-- Start: Hero Clean Reverse -->
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <p class="fw-bold text-success mb-2"></p>
                        <h1 class="display-4 fw-bold text-center" data-aos="fade-down" data-aos-duration="200">Welcome to ...... <br>What are you waiting for <a href="signup.html">sign up</a> right now</h1>
                    </div>
                </div>
                <div class="col-12 col-lg-10 mx-auto pad-top">
                    <div class="position-relative" style="display: flex;flex-wrap: wrap;justify-content: flex-end;">
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-15%, 35%, 0);"><img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.8" src="../assets/img/exemple/01.png"></div>
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-5%, 20%, 0);"><img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.4" src="../assets/img/exemple/02.png"></div>
                    </div>
                </div>
            </div>
        </div><!-- End: Hero Clean Reverse -->
    </header>
    <section></section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/bold-and-bright.js"></script>
</body>

</html>