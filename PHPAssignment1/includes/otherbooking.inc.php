<?php
session_start();
//Used when someone is booking for someone else

if (isset($_POST["submit"])) {
    require_once 'connect.inc.php';
    require_once 'functions.inc.php';
    /*Initialising global variables*/
    $sqlpatient = "SELECT * FROM login WHERE username='$_SESSION[username]' ";
    $qsqlpatient = mysqli_query($connection, $sqlpatient);
    $rspatient = mysqli_fetch_array($qsqlpatient);

    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $desc = $_POST["descrip"];
    $department = $_POST["department"];

    $gfname = $_POST["gfname"];
    $glname = $_POST["glname"];
    $gdob = $_POST["gdob"];
    $gemail = $_POST["gemail"];
    $gdescrip = $_POST["gdescrip"];
    $id = $rspatient["uid"];
    
    loggedbook($connection, $firstname, $lastname, $dob, $email, $desc, $department, $gfname, $glname, $gdob, $gemail, $gdescrip, $id);

}

else {
    header("location: ../index.php?=gfhg");
    exit();
}