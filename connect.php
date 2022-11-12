<?php
session_start();
try{
    $connect = mysqli_connect('localhost', $_SESSION['login'], $_SESSION['password'], 'tcs', '3307');
    }
    catch(Exception $e){
        die('Error connet to database!');
    }
?>

