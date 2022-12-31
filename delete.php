<?php
session_start();
if (isset($_GET['id'])) {
    $_SESSION["id"] = $_GET['id'];
}
$id = $_SESSION["id"];
require("connect.php");
$sql = "DELETE FROM students WHERE idStd = $id";
$exe = mysqli_query($connect, $sql);
if (!isset($_SESSION["prev"])) {
    include("logout.php");
} else {
    header("location: class.php");
}
