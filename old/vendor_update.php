<?php
require_once "../connect.php";
print_r($_POST);

//$name = $_POST['name'];
//$id = $_POST['id'];

mysqli_query($connect, "UPDATE `city` SET `name` = '$name' WHERE `city`.`city_id` = '$id'");
header('Location: /');
?>