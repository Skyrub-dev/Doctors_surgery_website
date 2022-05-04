<?php

if (isset($_POST["submit"]))
{
    /*Initialising global variables*/
    $username = $_POST["uid"];
    $pass = $_POST["pass"];
    
    require_once 'connect.inc.php';
    require_once 'functions.inc.php';

    /*Error handlers*/
    
    if (emptyInputLogin($username, $pass) !== false)
    {
        echo "<script> alert('One or more fields is missing input, please try again');</script>";
        exit();
    }

    adminlogin($connection, $username, $pass);
}

else
{
    header("location: ../index.php");
    exit();
}