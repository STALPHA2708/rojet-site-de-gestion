<?php
$mail = $_POST['mail'];
$passwd = $_POST['passwd'];
$fName = $_POST['firstName'];
$lName = $_POST['famillyName'];
require("connect.php");
$sql = "SELECT * FROM students WHERE mail='$mail'";
$exe = mysqli_query($connect, $sql);
$row = array();
$row = mysqli_fetch_assoc($exe);
if (!isset($row)) {
    session_start();
    $_SESSION['mail'] = $mail;
    $_SESSION['fName'] = $fName;
    $_SESSION['lName'] = $lName;
    $_SESSION['passwd'] = $passwd;
    header("location:completeInfo.php");
    die;
} else {
    require("signup.html");
?>
    <style>
        .error-msg {
            display: block;
        }
    </style>
<?php
    die;
}

/*
"UPDATE User SET Nom = '$nom', Prenom = '$prenom', Filier = '$filier', Genre = '$genre', Etat_civil = '$etat_civil' , Numero_1 = '$numero_1' , Numero_2 = '$numero_2', Ville_origine = '$ville_origine', Ville_actuelle = '$ville_actuelle', Date_de_naissance = '$date_naissance', portfolio = '$portfolio' WHERE Id_user = '$id_user';";
*/