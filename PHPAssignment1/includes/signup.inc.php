<?php

if (isset($_POST["submit"])) {
    
    /*Initialising global variables*/
    $username = $_POST["uid"];
    $pass = $_POST["pass"];
    $passrepeat = $_POST["passrepeat"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    /*Using 'connect.inc.php' to actually connect to the database first, then
    using 'functions.inc.php' to grab the functions which have been set on the
    error handlers below */
    require_once 'connect.inc.php';
    require_once 'functions.inc.php';

    /*ERROR HANDLERS*/

    /*Error for if the input fields have not been answered - will change the URL to
    correspond*/
    if (emptyInputSignup($username, $pass, $passrepeat, $firstname, $lastname, $dob, $email, $priv) !== false)
    {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    /*Error for an invalid username, this includes characters not declared in
    functions.inc.php */
    if (invalidUid($username) !== false)
    {
        header("location: ../index.php?error=invaliduid");
        exit();
    }
    /*If the passwords do not match from signup, it will error*/
    if (passMatch($pass, $passrepeat) !== false)
    {
        header("location: ../index.php?error=passwordsdontmatch");
        exit();
    }
    /*If the username is already taken, it will error*/
    if (uidExists($connection, $username) !== false)
    {
        header("location: ../index.php?error=usernametaken");
        exit();
    }
    /*Initialises the 'createuser' function, passes all
    variables to the function */
    createUser($connection, $username, $pass, $firstname, $lastname, $dob, $email);

}
/*if result does not match these handlers, will redirect back to index page */
else {
    header("location: ../index.php");
    exit();
}