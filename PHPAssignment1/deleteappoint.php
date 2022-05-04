<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "doctorsdb");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $guestno = $_GET['guestno'];
    $sql = "DELETE FROM guestbook WHERE guestno='$guestno'";
    $data = mysqli_query($link, $sql);
    if ($data)
    {
        echo "<script> alert('Appointment successfully deleted!');</script>";
        header("location: index.php");
    }
?>