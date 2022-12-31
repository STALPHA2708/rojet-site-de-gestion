<?php
session_start();
if (!isset($_SESSION["id"])) {
    $_SESSION["id"] = $_GET['id'];
}
$id = $_SESSION["id"];
require("connect.php");
$sql = "SELECT * FROM students WHERE idStd='$id'";
$exe = mysqli_query($connect, $sql);
$row = array();
$row = mysqli_fetch_assoc($exe);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile Editing</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=79ce12dbe70c189de86bb63b9da0df1f">
    <link rel="stylesheet" href="assets/css/Nunito.css?h=1110dfe21bd6c9fe3b5d714283297020">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <style>
        textarea {
            resize: none;
        }

        .margtop {
            margin-top: 18px;
        }

        #promo {
            display: inline;
            transform: translate(-10px, 10px);
        }
    </style>
</head>

<body>
    <!-- Start: Navbar Centered Links -->
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="jello" href="class.php">My Class</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="tada" href="cv.php">CV</a></li>
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="tada" href="#">Edit Profile</a></li>
                </ul>
                </ul>
                <a class="btn .btn-dark shadow" role="button" data-bss-hover-animate="pulse" href="class.php">Back</a>
        </div>
        </div>
    </nav><!-- End: Navbar Centered Links -->
    <form action="changeInfo.php" method="post" enctype="multipart/form-data">
        <section class="py-5">
            <div id="wrapper">
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <div class="container-fluid">
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <div class="card mb-3">
                                        <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="../assets/img/all/<?php echo $row["pict"] ?>" width="160" height="160">
                                            <div class="mb-3"><input class="form-control btn" name="pict" accept=".jpeg,.png,.jpg" type="File"></div>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-4 margtop">
                                        <div class="card-header py-3">
                                            <h6 class="text-primary fw-bold m-0">Languages</h6>
                                        </div>
                                        <div class="card-body margtop">
                                            <h4 class="small fw-bold">Arabic<span class="float-end">
                                                    <select name="ar" class="form-control" required>
                                                        <option <?php if ($row['ar'] == "Native") echo "selected" ?>>Native</option>
                                                        <option <?php if ($row['ar'] == "Excellent") echo "selected" ?>>Excellent</option>
                                                        <option <?php if ($row['ar'] == "Good") echo "selected" ?>>Good</option>
                                                        <option <?php if ($row['ar'] == "Not bad") echo "selected" ?>>Not bad</option>
                                                        <option <?php if ($row['ar'] == "Beginner") echo "selected" ?>>Beginner</option>
                                                    </select>
                                                </span></h4>
                                        </div>
                                        <div class="card-body margtop">
                                            <h4 class="small fw-bold">French<span class="float-end">
                                                    <select name="fr" class="form-control" required>
                                                        <option <?php if ($row['fr'] == "Native") echo "selected" ?>>Native</option>
                                                        <option <?php if ($row['fr'] == "Excellent") echo "selected" ?>>Excellent</option>
                                                        <option <?php if ($row['fr'] == "Good") echo "selected" ?>>Good</option>
                                                        <option <?php if ($row['fr'] == "Not bad") echo "selected" ?>>Not bad</option>
                                                        <option <?php if ($row['fr'] == "Beginner") echo "selected" ?>>Beginner</option>
                                                    </select>
                                                </span></h4>
                                        </div>
                                        <div class="card-body margtop">
                                            <h4 class="small fw-bold">English<span class="float-end">
                                                    <select name="eng" class="form-control" required>
                                                        <option <?php if ($row['eng'] == "Native") echo "selected" ?>>Native</option>
                                                        <option <?php if ($row['eng'] == "Excellent") echo "selected" ?>>Excellent</option>
                                                        <option <?php if ($row['eng'] == "Good") echo "selected" ?>>Good</option>
                                                        <option <?php if ($row['eng'] == "Not bad") echo "selected" ?>>Not bad</option>
                                                        <option <?php if ($row['eng'] == "Beginner") echo "selected" ?>>Beginner</option>
                                                    </select>
                                                </span></h4>
                                        </div>
                                        <div class="mb-3"></div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" value="<?php echo $row['mail'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="birthday"><strong>Birthday</strong></label><input class="form-control" type="date" value="<?php echo $row['birthday'] ?>" id="birthday" name="birthday" required></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="promo"><strong>Promotion</strong><select id="promo" name="promo" class="form-control" required>
                                                                        <optgroup label="Informatique">
                                                                            <option <?php if ($row['promotion'] == "Graduated") echo "selected" ?>>Graduated</option>
                                                                            <option value="First Year" <?php if ($row['promotion'] == "First Year") echo "selected" ?>>1 Year</option>
                                                                            <option value="Second Year" <?php if ($row['promotion'] == "Second Year") echo "selected" ?>>2 Year</option>
                                                                            <option value="Third Year" <?php if ($row['promotion'] == "Third Year") echo "selected" ?>>3 Year</option>
                                                                            <option <?php if ($row['promotion'] == "TMW") echo "selected" ?>>TMW</option>
                                                                        </optgroup>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" value="<?php echo ucwords($row['firstName']) ?>" id="first_name" name="fName" required></div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" value="<?php echo strtoupper($row['famillyName']) ?>" id="last_name" name="lName" required></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" value="<?php echo $row['location'] ?>" name="location" required></div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3"><label class="form-label" for="phoneNumber"><strong>Phone number</strong><br></label><input class="form-control" type="text" id="phoneNumber" value="+212<?php echo $row['phoneNumber'] ?>" name="phoneNumber" required></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow" style="margin-bottom: 15px;">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Links</p>
                            </div>
                            <div class="card-body">
                                <div class="mb-3"><label class="form-label" for="cv"><strong>CV Link</strong></label><input class="form-control" required type="url" id="cv" name="cv" value="<?php echo $row["cv"] ?>"></div>
                                <div class="mb-3"><label class="form-label" for="github"><strong>Github Link</strong></label><input class="form-control" type="url" id="github" required name="github" value="<?php echo $row["github"] ?>"></div>
                                <div class="mb-3"><label class="form-label" for="linkedin"><strong>linkedIn Link</strong></label><input class="form-control" type="url" id="linkedin" required name="linkedin" value="<?php echo $row["linkedin"] ?>"></div>
                            </div>
                        </div>
                        <div class="card shadow" style="margin-bottom: 15px;">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Bio</p>
                            </div>
                            <div class="card-body">
                                <div class="mb-3"><label class="form-label" for="bio"><strong>Short description</strong></label>
                                    <textarea class="form-control" name="bio" id="bio" rows="3" minlength="15" maxlength="120" required><?php echo $row["bio"] ?></textarea>
                                </div>
                            </div>
                            <div class="card shadow" style="margin-bottom: 15px;">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Education</p>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3"><label class="form-label" for="bachelor"><strong>Bachelor</strong></label>
                                        <select id="bachelor" name="bachelor" class="form-control" required>
                                            <optgroup label="Year">
                                                <option <?php if ($row['bachelor'] == "2019") echo "selected" ?>>2019</option>
                                                <option <?php if ($row['bachelor'] == "2020") echo "selected" ?>>2020</option>
                                                <option <?php if ($row['bachelor'] == "2021") echo "selected" ?>>2021</option>
                                                <option <?php if ($row['bachelor'] == "2022") echo "selected" ?>>2022</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <?php if ($row["promotion"] == "Third Year") { ?>
                                        <div class="mb-3"><label class="form-label" for="deug"><strong>Deug</strong></label>
                                            <select id="deug" name="deug" class="form-control" required>
                                                <option <?php if ($row['deug'] == "2021") echo "selected" ?>>2021</option>
                                                <option <?php if ($row['deug'] == "2022") echo "selected" ?>>2022</option>
                                            </select>
                                        </div>
                                    <?php } ?>
                                    <?php if ($row["promotion"] == "Graduated") { ?>
                                        <div class="mb-3"><label class="form-label" for="license"><strong>License</strong></label>
                                            <select id="license" name="license" class="form-control" required>
                                                <option>2022</option>
                                            </select>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card shadow" style="margin-bottom: 15px;">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Log in Settings</p>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3"><label class="form-label" for="npasswd"><strong>New password</strong></label><input class="form-control" type="password" id="npasswd" name="npasswd"></div>
                                </div>
                            </div>
                            <div class="card shadow mb-5">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Forum Settings</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3"><label class="form-label" for="passwd"><strong>Current password</strong></label><input class="form-control" type="password" id="passwd" name="passwd" required></div>
                                        </div>
                                        <div class="col fw-semibold text-center d-flex d-md-flex flex-row flex-grow-1 justify-content-center align-items-center align-self-center justify-content-md-center align-items-md-center"><button class="btn btn-primary" type="submit">Save Settings</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
            </div>
        </section>
    </form>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/bold-and-bright.js"></script>
</body>

</html>