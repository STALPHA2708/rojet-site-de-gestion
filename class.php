<?php
session_start();
if (isset($_POST["promotion"])) {
    $_SESSION["promo"] = $_POST["promotion"];
}
if (!isset($_SESSION["promo"])) {
    $_SESSION["promo"] = 'Graduated';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Informatique <?php echo $_SESSION["promo"]; ?></title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap0.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/style.css">

    <style>
        .form-flex {
            display: flex;
            justify-content: space-around;
        }

        .img {
            width: 150px;
            height: 150px !important;
        }

        .popup {
            width: 500px;
            background: #ddd;
            border-radius: 7px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 30px 30px;
            color: #333;
        }

        .closepop {
            display: non;
        }

        .text-large {
            font-size: large;
        }

        .formpar {
            display: flex;
            align-items: flex-start;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" data-bss-hover-animate="jello" href="#"><?php if (!isset($_SESSION['prev'])) echo "My " ?>Class</a></li>
                    <?php if (!isset($_SESSION["prev"])) {
                    ?>
                        <li class="nav-item"><a class="nav-link" data-bss-hover-animate="tada" href="cv.php">CV</a></li>
                        <li class="nav-item"><a class="nav-link" data-bss-hover-animate="tada" href="#">Edit Profile</a></li>
                    <?php
                    }
                    ?>
                </ul>
                <?php if (isset($_SESSION['prev'])) {
                ?>
                    <form method="post" class="navbar-nav mx-auto formpar">
                        <div class="mb-3">
                            <select id="promotion" name="promotion" class="form-control" required style="width: auto;">
                                <optgroup label="Informatique">
                                    <option <?php if ($_SESSION['promo'] == "Graduated") echo "selected" ?>>Graduated</option>
                                    <option value="First Year" <?php if ($_SESSION['promo'] == "First Year") echo "selected" ?>>1 Year</option>
                                    <option value="Second Year" <?php if ($_SESSION['promo'] == "Second Year") echo "selected" ?>>2 Year</option>
                                    <option value="Third Year" <?php if ($_SESSION['promo'] == "Third Year") echo "selected" ?>>3 Year</option>
                                    <option <?php if ($_SESSION['promo'] == "TMW") echo "selected" ?>>TMW</option>
                                </optgroup>
                            </select>
                        </div>
                        <button class="btn btn-primary shadow d-block w-100" data-bss-hover-animate="tada" type="submit" name="search">Search</button>
                    </form>
                <?php
                }
                ?>
                <a class="btn btn-danger shadow" role="button" data-bss-hover-animate="pulse" href="logout.php">log out</a>
        </div>
    </nav>
    <section class="py-5">
        <div class="container py-5">
            <div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 1000px;">
                <?php
                require("connect.php");
                $promo = $_SESSION["promo"];
                $sql = "SELECT * FROM students WHERE promotion='$promo';";
                $exe = mysqli_query($connect, $sql);
                //$result = array();
                $row = array();

                while ($row = mysqli_fetch_assoc($exe)) {
                    //array_push($result, $row);
                ?><div class="col mb-4">
                        <div class="text-center">
                            <div class="mb-3 item zoom-on-hover"><a href="cv.php?id=<?php echo $row["idStd"] ?>"><img class="rounded mb-3 fit-cover img-fluid image img" width="150" height="150" src="../assets/img/all/<?php echo $row["pict"] ?>"></a>
                            </div>
                            <h5 class="fw-bold mb-0"><strong>
                                    <?php echo ucwords($row["firstName"]) . " " . strtoupper($row["famillyName"]); ?>
                                </strong></h5>
                            <?php
                            if (isset($_SESSION["prev"]) || $_SESSION["id"] == $row["idStd"]) {
                            ?>
                                <div class="form-flex">
                                    <a class="btn btn-outline-success shadow" role="button" data-bss-hover-animate="pulse" href="profile.php?id=<?php echo $row["idStd"] ?>">Edite</a>
                                    <form method="post">
                                        <input type="hidden" name="curid" value="<?php echo $row["idStd"] ?>">
                                        <button class="btn btn-danger shadow" role="button" data-bss-hover-animate="pulse" type="submit" name="submit" value="true">Delete</button>
                                    </form>
                                    <?php if (isset($_POST["submit"])) {
                                    ?>
                                        <div class="popup">
                                            <div class="msg">
                                                <p class="text-danger text-large m-0 fw-bold">Are you sure that you want to delete
                                                    <?php if (!isset($_SESSION['prev'])) {
                                                        echo 'your';
                                                    } else {
                                                        echo "this";
                                                    } ?>
                                                    CV?<br>
                                                    <?php if (!isset($_SESSION['prev'])) {
                                                        echo 'This will delete all information about you and you will log out automatically!';
                                                    } ?>
                                                <p>
                                            </div>
                                            <div class="btns form-flex">
                                                <form method="post"><button href="delete.php" class="btn btn-primary shadow" type="submit" name="cancel">No cancel</button></form>
                                                <?php if (isset($_POST['cancel'])) {
                                                    $_POST["submit"] = null;
                                                } ?>
                                                <a href="delete.php?id=<?php echo $_POST['curid'] ?>" class="btn btn-danger shadow">Yes delete</a>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="../assets/js/bold-and-bright.js"></script>
</body>

</html>
