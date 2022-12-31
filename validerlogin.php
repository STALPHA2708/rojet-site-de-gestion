<?php
session_start();
$mail = $_POST['mail'];
$passwd = $_POST['passwd'];
require("connect.php");
$sql = "SELECT * FROM students WHERE mail='$mail' AND passwd='$passwd'";
$exe = mysqli_query($connect, $sql);
$row = array();
$row = mysqli_fetch_assoc($exe);
if (isset($row)) {
    $_SESSION["id"] = $row["idStd"];
    $_SESSION["promo"] = $row["promotion"];
    header("location:class.php");
    die;
} else {
    $sql = "SELECT idAdm FROM admins WHERE passwd='$passwd' AND mail='$mail' ";
    $exe = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($exe);
    if (isset($row)) {
        $_SESSION["prev"] = 1;
        $_SESSION["mail"] = $row["mail"];
        header("location:class.php");
        die;
    } else {
        require("login.html");
?>
        <html>

        <head>
            <style>
                .form-control {
                    border: 1px #FF0018 solid !important;
                }

                .form-control:focus {
                    box-shadow: 0 0 0 0.25rem rgb(244 20 0 / 37%) !important;
                }

                .error-msg {
                    display: block;
                }
            </style>
        </head>
<?php
    }
}
