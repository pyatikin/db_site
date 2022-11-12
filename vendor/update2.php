<?php
require_once "../connect.php";
//print_r($_POST);

//$name = $_POST[name];
//$id = $_POST[id];
foreach($_POST as $P) {
    if ($P == '' or $P == NULL)
        $P = NULL;
    $P = (string) $P;
}
print_r($_POST);
$table = $_POST['table'];
$keys = array_keys($_POST);
$len = count($_POST);
print_r($len);
while($_POST[$keys[$len - 1]] == NULL && $len > 0)
    $len--;
//print_r($keys);
$query = "UPDATE $table SET ";
for($i = 2; $i < $len; $i++) {
    if ($_POST[$keys[$i]] != NULL && $i < $len - 1)
        $query .= " "  . "$keys[$i]" . " = '" . $_POST[$keys[$i]] . "',  ";
    else if ($_POST[$keys[$i]] != NULL)
        $query .= " "  . "$keys[$i]" . " = '" . $_POST[$keys[$i]] . "'  ";
}
$query .= " where " . "$keys[1]" . " = " . $_POST[$keys[1]] . " ";
print_r($query);
mysqli_query($connect, $query);
header('Location: '  . $_SERVER['HTTP_REFERER']);
?>