<?php
$mail = $_POST["mail"];
$subj = "Forgot your password!";
require("connect.php");
$sql = "SELECT passwd FROM students WHERE mail='$mail'";
$exe = mysqli_query($connect, $sql);
$row = array();
$row = mysqli_fetch_assoc($exe);
if (isset($row)) {
    $result = mail($mail, $subj, "This is your password please keep it save:" . $row["passwd"]);
    if ($result) {
        require("login.html")
?>
        <html>

        <head>
            <style>
                .success-msg-p {
                    display: block;
                }
            </style>
        </head>

        </html>
    <?php
    } else {
        require("login.html")
    ?>
        <html>

        <head>
            <style>
                .error-msg-p {
                    display: block;
                }
            </style>
        </head>

        </html>
    <?php
    }
} else {
    require("signup.html")
    ?>
    <html>

    <head>
        <style>
            .error-msg-p {
                display: block;
            }
        </style>
    </head>

    </html>
<?php
}
