<?php
session_start();

/*If doctors assign themselves by accident, they can clear their names */

$link = mysqli_connect("localhost", "root", "", "doctorsdb");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $guestno = $_GET['guestno'];
    $sql = "UPDATE guestbook SET assigned_to = 'NONE' WHERE guestno='$guestno'";
    $data = mysqli_query($link, $sql);
    if ($data)
    {
        header("location: doctorselect.php");
        echo "<script> alert('Appointment successfully updated!');</script>";
    }
?>