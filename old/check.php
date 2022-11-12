<?
session_start();
$_SESSION['data'] = $_POST['button'];
header('Location: ./table.php');
?>