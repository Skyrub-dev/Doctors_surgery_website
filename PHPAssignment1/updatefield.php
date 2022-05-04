<?php
session_start();

/*For doctors to assign themselves to appointments */

$link = mysqli_connect("localhost", "root", "", "doctorsdb");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $doctor = $_SESSION['docusername'];
    
    $guestno = $_GET['guestno'];
    $sql = "UPDATE guestbook SET assigned_to = '$doctor' WHERE guestno='$guestno'";
    $data = mysqli_query($link, $sql);
    if ($data)
    {
        header("location: doctorselect.php");
        echo "<script> alert('Appointment successfully updated!');</script>";
    }
?>