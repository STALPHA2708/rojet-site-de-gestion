<?php

use Symfony\Component\Routing\Matcher\UrlMatcherInterface;

session_start();
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = $_SESSION["id"];
}
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
    <title>CV</title>
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
        .flex-ju-sp-bet {
            display: flex;
            justify-content: space-between;
        }

        .flex-ju-sp-ev {
            display: flex;
            justify-content: space-evenly;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .flex-start {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .text-largest {
            font-size: 32px;
        }

        .text-large {
            font-size: 26px;
        }

        .text-med {
            font-size: 22px;
        }

        .btn-dest {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        .pad-top {
            padding-top: 30px;
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
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="tada" href="#">CV</a></li>
                    <li class="nav-item"><a class="nav-link" data-bss-hover-animate="tada" href="profile.php">Edit Profile</a></li>
                </ul>
                </ul>
                <a class="btn btn-danger shadow" role="button" data-bss-hover-animate="pulse" href="logout.php">log out</a>
        </div>
        </div>
    </nav><!-- End: Navbar Centered Links -->
    <section class="py-5">
        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content" class="card-body text-center shadow">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="flex-center">
                                    <img class="rounded-circle mb-3 mt-4" src="../assets/img/all/<?php echo $row["pict"] ?>" width="160" height="160">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="flex-center">
                                    <p class="text text-largest m-0 text-primary fw-bold"><?php echo ucwords($row["firstName"]) . " " . strtoupper($row["famillyName"]); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-8">
                            <div class="col">
                                <div class="flex-center">
                                    <p class="text text-large m-0 fw-bold"><?php echo ucfirst($row["bio"]) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-8 btn-dest">
                            <?php if (!empty($row["github"])) { ?>
                                <div class="col-2 btn-dark">
                                    <a class="text text-large m-0 fw-bold" href="<?php echo ucfirst($row["github"]) ?>"><img class="rounded-circle mb-3 mt-4" src="../assets/img/svg/github.svg" width="30">Github</a>
                                </div>
                            <?php
                            }
                            ?>
                            <?php if (!empty($row["cv"])) { ?>
                                <div class="col-2 btn-dark">
                                    <a class="text text-large m-0 fw-bold" href="<?php echo ucfirst($row["cv"]) ?>"><img class="rounded-circle mb-3 mt-4" src="../assets/img/svg/user-solid.svg" width="30">CV</a>
                                </div>
                            <?php
                            }
                            ?>
                            <?php if (!empty($row["linkedin"])) { ?>
                                <div class="col-2 btn-dark">
                                    <a class="text text-large m-0 fw-bold" href="<?php echo ucfirst($row["linkedin"]) ?>">LinkedIn</a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row mb-12 pad-top">
                            <div class="col-1"></div>
                            <div class="col-5">
                                <div class="flex-center">
                                    <p class="text text-large m-0 fw-bold text-primary">Personel Info</p>
                                </div>
                                <div class="info flex-ju-sp-bet">
                                    <div class="titles">
                                        <p class="text text-med text-dark m-0 fw-bold">E-mail:</p>
                                        <p class="text text-med text-dark m-0 fw-bold">Phone number:</p>
                                        <p class="text text-med text-dark m-0 fw-bold">Adress:</p>
                                    </div>
                                    <div class="information">
                                        <p class="text text-med m-0 fw-bold"><?php echo " " . ucfirst($row["mail"]) ?></p>
                                        <p class="text text-med m-0 fw-bold"><?php echo " +212" . ucfirst($row["phoneNumber"]) ?></p>
                                        <p class="text text-med m-0 fw-bold"><?php echo " " . ucfirst($row["location"]) ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-5">
                                <div class="flex-center">
                                    <p class="text text-large m-0 fw-bold text-primary">Languages</p>
                                </div>
                                <div class="info flex-ju-sp-ev">
                                    <div class="titles">
                                        <p class="text text-med text-dark m-0 fw-bold">Arabic:</p>
                                        <p class="text text-med text-dark m-0 fw-bold">French:</p>
                                        <p class="text text-med text-dark m-0 fw-bold">English:</p>
                                    </div>
                                    <div class="information">
                                        <p class="text text-med m-0 fw-bold"><?php echo " " . ucfirst($row["ar"]) ?></p>
                                        <p class="text text-med m-0 fw-bold"><?php echo " " . ucfirst($row["fr"]) ?></p>
                                        <p class="text text-med m-0 fw-bold"><?php echo " " . ucfirst($row["eng"]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-12 pad-top">
                            <div class="flex-center">
                                <p class="text text-large m-0 fw-bold text-primary">Education</p>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-4">
                                <p class="text text-med m-0 fw-bold">
                                    Bachelor
                                </p><br>
                                <?php if (!empty($row["deug"])) { ?>
                                    <p class="text text-med m-0 fw-bold">
                                        Deug
                                    </p>
                                <?php } ?>
                                <?php if (!empty($row["license"])) { ?>
                                    <p class="text text-med m-0 fw-bold">
                                        License
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="col-6">
                                <p class="text text-med m-0 fw-bold">
                                    <?php echo $row["bachelor"] ?>
                                </p><br>
                                <?php if (!empty($row["deug"])) { ?>
                                    <p class="text text-med m-0 fw-bold">
                                        <?php echo $row["deug"] ?>
                                    </p>
                                <?php } ?>
                                <?php if (!empty($row["license"])) { ?>
                                    <p class="text text-med m-0 fw-bold">
                                        <?php echo $row["license"] ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-12 pad-top">

                        </div>
                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/bold-and-bright.js"></script>
</body>

</html>