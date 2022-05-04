<?php

if (isset($_POST["submit"])) {
    
    /*Initialising global variables*/
    $title = $_POST["title"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $username = $_POST["uid"];
    $pass = $_POST["pass"];
    $passrepeat = $_POST["passrepeat"];
    $department = $_POST["department"];

    require_once 'connect.inc.php';
    require_once 'functions.inc.php';

    /*ERROR HANDLERS*/


    if (emptyInputSignup($title, $lastname, $firstname, $username, $pass, $passrepeat) !== false)
    {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false)
    {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if (passMatch($pass, $passrepeat) !== false)
    {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($connection, $username) !== false)
    {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createDoctor($connection, $title, $lastname, $firstname, $username, $pass, $passrepeat, $department);

}

else {
    header("location: ../index.php");
    exit();
}