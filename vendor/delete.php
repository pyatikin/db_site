<?php
    require_once '../connect.php';
    print_r($_GET);
    $id = $_GET['id'];
    $name = $_GET['name'];
    $tr = mysqli_query($connect, "SELECT * FROM `$name`");
    $tr = mysqli_fetch_assoc($tr);
    $keys = array_keys($tr);
    mysqli_query($connect, "DELETE FROM $name WHERE  $keys[0] = '$id'");
    //header('Location: /');
    session_start();
    $_SESSION['table'] = $name;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>