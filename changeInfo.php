<?php
session_start();
require("connect.php");
if (!isset($_SESSION["prev"])) {
    $id = $_SESSION["id"];
    $sql = "SELECT passwd FROM students WHERE idStd='$id'";
} else {
    $sql = "SELECT passwd FROM students WHERE mail='$mail'";
}
$exec = mysqli_query($connect, $sql);
$user = array();
$user = mysqli_fetch_assoc($exec);
if ($user['passwd'] = $_POST['passwd']) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $birthday = $_POST['birthday'];
    $location = $_POST['location'];
    $phoneNumber = $_POST['phoneNumber'];
    $promo = $_POST['promo'];
    $ar = $_POST['ar'];
    $fr = $_POST['fr'];
    $eng = $_POST['eng'];
    $bio = $_POST['bio'];
    $cv = $_POST['cv'];
    $github = $_POST['github'];
    $linkedin = $_POST['linkedin'];
    $bachelor = $_POST['bachelor'];
    if (isset($_POST['deug'])) {
        $deug = $_POST['deug'];
    } else if (isset($_POST['license'])) {
        $license = $_POST['license'];
    }
    if (isset($_POST['npasswd'])) {
        $npasswd = $_POST['npasswd'];
    }


    $sql = "SELECT * FROM students WHERE idStd='$id'";
    $exe = mysqli_query($connect, $sql);
    $row = array();
    $row = mysqli_fetch_assoc($exe);

    if (!empty($_FILES["pict"]["name"])) {
        $pictSize = $_FILES["pict"]["size"];
        if ($pictSize <= 2097152) {
            $pictName = rand(0, 10000) . '-' . $_FILES["pict"]["name"];
            $pictTmpName = $_FILES["pict"]["tmp_name"];
            $uploadDir = "../assets/img/all/" . $pictName;

            move_uploaded_file($pictTmpName, $uploadDir);
            $sql = "UPDATE students SET firstName = '$fName', famillyName = '$lName',promotion = '$promo', birthday = '$birthday', location = '$location', phoneNumber = '$phoneNumber', pict = '$pictName', ar = '$ar', fr = '$fr', eng = '$eng', bio = '$bio', cv = '$cv', linkedin =  '$linkedin', github = '$github', bachelor = '$bachelor'  WHERE idStd = '$id';";
            $execute = mysqli_query($connect, $sql);
            if ($execute) {
                if (isset($_POST['deug'])) {
                    "UPDATE students SET deug = '$deug' WHERE idStd = '$id'";
                } else if (isset($_POST['license'])) {
                    "UPDATE students SET license = '$license' WHERE idStd = '$id'";
                }
                if (isset($_POST['npasswd'])) {
                    "UPDATE students SET passwd = '$npasswd' WHERE idStd = '$id'";
                }
                header("location:class.php");
                die;
            }
        } else {
            header("location:profile.php");
            die;
        }
    } else {
        $sql = "UPDATE students SET firstName = '$fName', famillyName = '$lName',promotion = '$promo', birthday = '$birthday', location = '$location', phoneNumber = '$phoneNumber', ar = '$ar', fr = '$fr', eng = '$eng', bio = '$bio', cv = '$cv', linkedin =  '$linkedin', github = '$github', bachelor = '$bachelor'  WHERE idStd = '$id';";
        $exe = mysqli_query($connect, $sql);
        if ($exe) {
            if (isset($_POST['deug'])) {
                "UPDATE students SET deug = '$deug' WHERE idStd = '$id'";
            } else if (isset($_POST['license'])) {
                "UPDATE students SET license = '$license' WHERE idStd = '$id'";
            }
            if (isset($_POST['npasswd'])) {
                "UPDATE students SET passwd = '$npasswd' WHERE idStd = '$id'";
            }
            header("location:class.php");
            die;
        } else {
            header("location:profile.php");
            die;
        }
    }
}
