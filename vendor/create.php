<?php
    require_once "../connect.php";

    //print_r($_POST);
    foreach($_POST as $P) {
        if ($P == '' or $P == NULL)
            $P = NULL;
        $P = (string) $P;
    }
    //print_r($_POST);
    $table = $_POST['table'];
    $keys = array_keys($_POST);
    $len = count($_POST);
    
    //print_r($keys);
    while($_POST[$keys[$len - 1]] == NULL && $len > 0)
        $len--;
    //print_r($len);
    $query = "insert into $table ( ";
    for($i = 1; $i < $len; $i++) {
        if($_POST[$keys[$i]] != NULL && $i < $len -1)
            $query .= "$keys[$i]" . ", ";
        else if ($_POST[$keys[$i]] != NULL)
            $query .= "$keys[$i]" . " ) "; 
    }
    $query .= " values ( ";
    for($i = 1; $i < $len; $i++) {
        if($_POST[$keys[$i]] != NULL && $i < $len -1)
            $query .= " '" . $_POST[$keys[$i]] . "' " . ", ";
        else if ($_POST[$keys[$i]] != NULL)
            $query .= " '" . $_POST[$keys[$i]] . "' "  . " ); "; 
    }
    //print_r($query);
    mysqli_query($connect, $query);
    // $columns = mysqli_query($connect, "show columns from $name");
    // $columns = mysqli_fetch_all($columns);
    // $len = count($columns);
    // print_r($columns[1][0]);
    // print_r($len);
    // $tr = mysqli_query($connect, "select * from $name");
    // $tr = mysqli_fetch_assoc($tr);
    // $keys = array_keys($tr);
    // //print_r($name);
    // //print_r($keys[1]);
    // mysqli_query($connect, "INSERT INTO `$name` (`$keys[1]`) VALUES (NULL)");
    // //header('Location: /');
    session_start();
    $_SESSION['table'] = $table;
    header('Location:../table.php');
?>