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
        background: #606060;
        color: #fff;
    }
    td {
        background: #99b5ff;
    }
</style>
<body>
    <table>
<?php
    require_once "../connect.php";

    $query = $_POST;
    $query = 'SELECT ' . $_POST['select'] . ' FROM ' . $_POST['from'] . ' WHERE ' . $_POST['where'] . ';';
    $tr = mysqli_query($connect, $query);
    $tr = mysqli_fetch_assoc($tr);
    $keys = array_keys($tr);
    $result = mysqli_query($connect, $query);
    $result = mysqli_fetch_all($result);
    $len = count($result);
    $len_inside = count($result[0]);
    foreach($keys as $key) {
        ?>
        <th><?=$key?></th>
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

