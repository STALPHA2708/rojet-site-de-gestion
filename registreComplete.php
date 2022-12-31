<?php
session_start();
$mail = $_SESSION['mail'];
$passwd = $_SESSION['passwd'];
$fName = $_SESSION['fName'];
$lName = $_SESSION['lName'];
$birthday = $_POST['birthday'];
$location = $_POST['location'];
$phoneNumber = $_POST['phoneNumber'];
$promo = $_POST['promo'];

$_SESSION['promo'] = $promo;

$pictSize = $_FILES["pict"]["size"];
if ($pictSize <= 2097152) {
    $pictName = rand(0, 10000) . '-' . $_FILES["pict"]["name"];
    $pictTmpName = $_FILES["pict"]["tmp_name"];
    $uploadDir = "../assets/img/all/" . $pictName;

    move_uploaded_file($pictTmpName, $uploadDir);

    require("connect.php");
    $sql = "INSERT INTO students (mail, passwd, firstName, famillyName, promotion, birthday, location, phoneNumber, pict) VALUES ('$mail', '$passwd', '$fName', '$lName', '$promo', '$birthday', '$location', '$phoneNumber', '$pictName');";
    $exe = mysqli_query($connect, $sql);

    if ($exe) {
        $sql = "SELECT idStd FROM students WHERE mail='$mail'";
        $exe = mysqli_query($connect, $sql);
        $row = array();
        $row = mysqli_fetch_assoc($exe);
        $_SESSION["id"] = $row["idStd"];
        header("location:class.php");
        die;
    } else {
        header("location:completeInfo.php");
        die;
    }
} else {
    header("location:completeInfo.php");
    die;
}
