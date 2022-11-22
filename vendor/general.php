<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>General form</title>
</head>
<style>
    th, td {
        padding: auto;
    }
    th {
        background: #569cbc;
        color: #fff;
    }
    td {
        background: #84b7ce;
    }
    a {
        background: #569cbc;
        color: black;
    }
    body {
        height: 771px;
        background: linear-gradient(45deg, #C5DDE8, #e8d0c5);
    }
    button {
        width: max-content;
        height: 30px;
        background:#cbe8c5; 
        border: 2px solid;
        border-radius: 10px; 
        margin-bottom:10px;
    }
</style>
<body>
    <table>
    <form action="../general.php">
        <button type="submit">Back</button>
    </form>
<?php
    session_start();
    require_once "../connect.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = $_POST;
    if (($_POST['join'] == '' || $_POST['on'] == '') && $_POST['where'] == '')
        $query = 'SELECT ' . $_POST['select'] . ' FROM ' . $_POST['from'] . ';';
    else if ($_POST['join'] == '' || $_POST['on'] == '')
        $query = 'SELECT ' . $_POST['select'] . ' FROM ' . $_POST['from'] . ' WHERE ' . $_POST['where'] .  ';';
    else if ($_POST['where'] == '')
        $query = 'SELECT ' . $_POST['select'] . ' FROM ' . $_POST['from'] . ' JOIN ' . $_POST['join'] . ' ON ' . $_POST['on'] . ';';
    else
        $query = 'SELECT ' . $_POST['select'] . ' FROM ' . $_POST['from'] . ' JOIN ' . $_POST['join'] . ' ON ' . $_POST['on'] . ' WHERE ' . $_POST['where'] .  ';';
        $_SESSION['query'] = $query;
    }
    else {
        $query = $_SESSION['query'];
        $query = str_replace(';', '', $query);
        $sort_name = $_SESSION['sort_name'];
            if ($_SESSION['sort_var'] == 1)
                $query .=  " ORDER BY $sort_name ASC";
            else if ($_SESSION['sort_var'] == 2)
                $query .= " ORDER BY $sort_name DESC";
    }
    $tr = mysqli_query($connect, $query);
    $tr = mysqli_fetch_fields($tr);
    $keys = array_keys($tr);
    $result = mysqli_query($connect, $query);
    $result = mysqli_fetch_all($result);
    // print_r($result[0]);
    $len = count($result);
    $len_inside = count($result[0]);
    foreach($tr as $t) {
        $column = "$t->table" . "." . "$t->name";
        ?>
        <th><a href="../sort.php?name=<?=$column?>&table=''"><?=$column?></a></th>
        <?php
    }
    foreach ($result as $res) {
        ?>
        <tr>
        <?php
        for($i=0; $i<count($res); $i++) {
        ?>
        
            <td><?=$res[$i]?></td>
        
        <?php    
        }
        ?>
        </tr>
        <?php
    }
?>  
</table>
</body>
</html>

