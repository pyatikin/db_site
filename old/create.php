<?php
    require_once "../connect.php";


    $name = $_POST['name'];
    //print_r($name);
    $tr = mysqli_query($connect, "select * from $name");
    $tr = mysqli_fetch_assoc($tr);
    $keys = array_keys($tr);
    //print_r($name);
    //print_r($keys[1]);
    mysqli_query($connect, "INSERT INTO `$name` (`$keys[1]`) VALUES (NULL)");
    //header('Location: /');
    session_start();
    $_SESSION['table'] = $name;
    ?>

    <?
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>