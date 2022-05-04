<?php
/*Functions responsible for the login system */

/*Function for signingup, will execute if fields are empty */
function emptyInputSignup($username, $pass, $passrepeat)
{
    $result;
    if (empty($username) || empty($pass) || empty($passrepeat))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
    /*and return the value */
}

/*Function for an invalid username, meaning a username already taken from
the database */
function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result = true;
    }
    /*Using the value of username and the variable of result, it will check
    to read if the username uses valid characters, if yes it will return the
    result variable 'true'*/
    else
    {
        $result = false;
    }
    return $result;
}
/*Function to check passwords match in the signup page, uses to variables
to represent the first password entered and a second one for the password
repeating */
function passMatch($pass, $passrepeat)
{
    /*If password is not equal to password repeat, return true which will
    return an error */
    $result;
    if ($pass !== $passrepeat)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}
/*If a username already exists pass connection and username variables*/
function uidExists($connection, $username)
{
    /*By using the prepared statements here we can protect our system from SQL
    injections and other potential cyber security issues */
    $sql = "SELECT * FROM login WHERE username = ?;";
    /*Initialising the prepared statement */
    $stmt = mysqli_stmt_init($connection);
    /*If statement fails the URL will change to an error message */
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtfailed1");
        exit();
    }
    /*By using the prepared statement, declaring the username variable and
    one 's' to represent one string, we execute our statement */
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    /*Resultdata representing the information in the table, getting the result
    from the database, then fetching that information and returning it to the
    system, if row is equal to the result data variable it will return the row
    otherwise it will return false and close the statement */
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function adminExists($connection, $username)
{
    /*By using the prepared statements here we can protect our system from SQL
    injections and other potential cyber security issues */
    $sql = "SELECT * FROM adminlog WHERE adusername = ?;";
    /*Initialising the prepared statement */
    $stmt = mysqli_stmt_init($connection);
    /*If statement fails the URL will change to an error message */
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtfailed1");
        exit();
    }
    /*By using the prepared statement, declaring the username variable and
    one 's' to represent one string, we execute our statement */
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    /*Resultdata representing the information in the table, getting the result
    from the database, then fetching that information and returning it to the
    system, if row is equal to the result data variable it will return the row
    otherwise it will return false and close the statement */
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function doctorExists($connection, $username)
{
    /*By using the prepared statements here we can protect our system from SQL
    injections and other potential cyber security issues */
    $sql = "SELECT * FROM doctorslist WHERE docusername = ?;";
    /*Initialising the prepared statement */
    $stmt = mysqli_stmt_init($connection);
    /*If statement fails the URL will change to an error message */
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtfailed1");
        exit();
    }
    /*By using the prepared statement, declaring the username variable and
    one 's' to represent one string, we execute our statement */
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    /*Resultdata representing the information in the table, getting the result
    from the database, then fetching that information and returning it to the
    system, if row is equal to the result data variable it will return the row
    otherwise it will return false and close the statement */
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

/*Function responsible for creating the user */
function createUser($connection, $username, $pass, $firstname, $lastname, $dob, $email)
{
    /*Again, using a prepared statement, when the data is entered it will
    insert those values into the username and password fields in the database */
    $sql = "INSERT INTO login (username, password, firstname, lastname, dob, email) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtfailed2");
        exit();
    }
    /*To ensure our system is more secure, I have ustilised password hashing,
    by using a prepared statement, once executed will store those details and
    pass an error=none URL */

    $hashedpass = password_hash($pass, PASSWORD_BCRYPT);

    mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashedpass, $firstname, $lastname, $dob, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php");
    exit();

}

function createDoctor($connection, $title, $lastname, $firstname, $username, $pass, $passrepeat, $department)
{
    /*Again, using a prepared statement, when the data is entered it will
    insert those values into the username and password fields in the database */
    $sql = "INSERT INTO doctorslist (title, lastname, firstname, docusername, docpassword, department) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtfailed2");
        exit();
    }
    /*To ensure our system is more secure, I have ustilised password hashing,
    by using a prepared statement, once executed will store those details and
    pass an error=none URL */

    $hashedpass = password_hash($pass, PASSWORD_BCRYPT);

    mysqli_stmt_bind_param($stmt, "ssssss", $title, $lastname, $firstname, $username, $hashedpass, $department);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../admincontrol.php");
    exit();

}

function book($connection, $firstname, $lastname, $dob, $email, $desc, $department, $id)
{
    $sql = "INSERT INTO guestbook (firstname, lastname, dob, email, description, department, uid, self) VALUES (?, ?, ?, ?, ?, ?, ?, 'YES');";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtfailed2.5");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $dob, $email, $desc, $department, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php");
    exit();
}

function loggedbook($connection, $firstname, $lastname, $dob, $email, $desc, $department, $gfname, $glname, $gdob, $gemail, $gdescrip, $id)
{
    //$sql = "INSERT INTO guestbook (firstname, lastname, dob, email, description";
    
    $sql = "INSERT INTO guestbook (firstname, lastname, dob, email, description, department, gfname, glname, gdob, gemail, gdescrip, uid, self) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'YES');";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../index.php?error=stmtfailed2.5");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssssss", $firstname, $lastname, $dob, $email, $desc, $department, $gfname, $glname, $gdob, $gemail, $gdescrip, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php");
    exit();
}

/*Function for empty login fields */
function emptyInputLogin($username, $pass)
{
    /*If both fields are empty, return the result variable as true, if not,
    return as false */
    $result;
    if (empty($username) || empty($pass))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}
/*Function for logging in the user */
function loginUser($connection, $username, $pass)
{
    /*Declaring if the username already exists in the database and putting it into
    a new variable*/
    $uidExists = uidExists($connection, $username);
    /*If the username entered into this variable is of the same type and false
    it will return the URL to represent a 'wronglogin' error */
    if ($uidExists === false)
    {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    /*Used to verify if the password is hashed, it will convert the password
    entered into hash and check it alongside the one entered */
    $hashedpass = $uidExists["password"];
    $checkPass = password_verify($pass, $hashedpass);

    /*If it's of the same type and equal to false, will error with the URL
    'passwordnotverified'*/

    if ($checkPass === false)
    {
        header("location: ../index.php?error=passnotverified");
        exit();
    }
    /*Else if it's of the same type and equal to true it will begin a session
    for the user with that user ID and username and return the user to the
    index page, these values can later be used in things like dipsplaying the
    userid to the user*/
    else if ($checkPass === true)
    {
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        $_SESSION["firstname"] = $uidExists["firstname"];
        $_SESSION["dob"] = $uidExists["dob"];
        header("location: ../index.php");
        exit();
    }
}

function adminlogin($connection, $username, $pass)
{
    /*Declaring if the username already exists in the database and putting it into
    a new variable*/
    $uidExists = adminExists($connection, $username);
    /*If the username entered into this variable is of the same type and false
    it will return the URL to represent a 'wronglogin' error */
    if ($uidExists === false)
    {
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    /*Used to verify if the password is hashed, it will convert the password
    entered into hash and check it alongside the one entered */
    $hashedpass = $uidExists["adpassword"];
    $checkPass = password_verify($pass, $hashedpass);

    if ($checkPass === false)
    {
        header("location: ../index.php?error=passnotverified");
        exit();
    }

    else if ($checkPass === true)
    {
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["adusername"] = $uidExists["adusername"];
        $_SESSION["department"] = $uidExists["department"];
        header("location: ../admincontrol.php");
        exit();
    }
}

function loginDoctor($connection, $username, $pass)
{
    /*Declaring if the username already exists in the database and putting it into
    a new variable*/
    $uidExists = doctorExists($connection, $username);
    /*If the username entered into this variable is of the same type and false
    it will return the URL to represent a 'wronglogin' error */
    if ($uidExists === false)
    {
        header("location: ../doctorlogin.php?error=wronglogin");
        exit();
    }

    /*Used to verify if the password is hashed, it will convert the password
    entered into hash and check it alongside the one entered */
    $hashedpass = $uidExists["docpassword"];
    $checkPass = password_verify($pass, $hashedpass);

    /*If it's of the same type and equal to false, will error with the URL
    'passwordnotverified'*/

    if ($checkPass === false)
    {
        header("location: ../doctorlogin.php?error=passnotverified");
        exit();
    }
    /*Else if it's of the same type and equal to true it will begin a session
    for the user with that user ID and username and return the user to the
    index page, these values can later be used in things like dipsplaying the
    userid to the user*/
    else if ($checkPass === true)
    {
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["docusername"] = $uidExists["docusername"];
        header("location: ../doctorselect.php");
        exit();
    }
}
