<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign up</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/style.css">
</head>

<body>
    <!-- Start: Navbar Centered Links -->
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="jello" href="login.html">Log in</a></li>
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="tada" href="signup.html">Sign up</a></li>
                </ul><a class="btn btn-primary shadow" role="button" data-bss-hover-animate="pulse" href="login.html">Log in</a>
        </div>
    </nav><!-- End: Navbar Centered Links -->
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">hi
                        <?php session_start();
                        echo $_SESSION['fName'] . " " . $_SESSION['lName'] ?>
                    </p>
                    <h2 class="fw-bold">Sign up completation</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <form method="post" action="registreComplete.php" enctype="multipart/form-data">
                                <div class="mb-3"><input class="form-control" name="pict" accept=".jpeg,.png,.jpg" required type="File"></div>
                                <div class="mb-3"><input name="birthday" class="form-control" required type="date" value="2000-01-01" min="1966-01-01" max="2009-01-01"></div>
                                <div class="mb-3"><input name="location" class="form-control" required type="text" placeholder="Current Address: City, Street"></div>
                                <div class="mb-3"><input name="phoneNumber" class="form-control" required type="tel" pattern="^[0-9]{9}$" placeholder="Phone Number ex: 661555898"></div>
                                <div class="mb-3">
                                    <select id="promo" name="promo" class="form-control" required>
                                        <optgroup label="Informatique">
                                            <option value="Graduate">Graduated</option>
                                            <option value="First Year">1 Year</option>
                                            <option value="Second Year">2 Year</option>
                                            <option value="Third Year">3 Year</option>
                                            <option value="TMW">TMW</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary shadow d-block w-100" data-bss-hover-animate="jello" type="submit">Finish sign up</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="../assets/js/bold-and-bright.js"></script>
</body>

</html>