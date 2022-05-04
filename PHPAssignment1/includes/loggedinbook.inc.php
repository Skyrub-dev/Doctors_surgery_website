<?php
session_start();

/*Responsible for auto entering text when creating a booking */

if (isset($_POST["submit"])) {
    require_once 'connect.inc.php';
    require_once 'functions.inc.php';

    $sqlpatient = "SELECT * FROM login WHERE username='$_SESSION[username]' ";
    $qsqlpatient = mysqli_query($connection, $sqlpatient);
    $rspatient = mysqli_fetch_array($qsqlpatient);
    
    $firstname = $_SESSION["firstname"];
    $lastname = $rspatient["lastname"];
    $dob = $_SESSION["dob"];
    $email = $rspatient["email"];
    $desc = $_POST["descrip"];
    $department = $_POST["department"];
    $id = $rspatient["uid"];
    
    book($connection, $firstname, $lastname, $dob, $email, $desc, $department, $id);


}

else {
    header("location: ../index.php?=gfhg");
    exit();
}