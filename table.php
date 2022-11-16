<?php
    require_once 'connect.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_SESSION['table'] )
            $_POST['button'] = $_SESSION['table'];
        $name = $_POST['button'];
    }
    else
        $name = $_SESSION['table'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$name?></title>
<style>
    th, td {
        padding: auto;
    }
    th {
        background: #606060;
        color: #fff;
    }
    td {
        background: #ccc;
    }
    a {
        color: black;
    }
</style>
<body>
    <form action="./main.php">
        <button type="submit">Back</button>
    </form>
    <table>
        <?php
            $sort_name = $_SESSION['sort_name'];
            if ($_SESSION['sort_var'] == 1)
                $query = "SELECT * FROM $name ORDER BY $sort_name ASC";
            else if ($_SESSION['sort_var'] == 2)
                $query = "SELECT * FROM $name ORDER BY $sort_name DESC";
            else
                $query = "SELECT * FROM $name";
            $tr = mysqli_query($connect, $query);
            $tr = mysqli_fetch_assoc($tr);
            $keys = array_keys($tr);
            $result = mysqli_query($connect, $query);
            $result = mysqli_fetch_all($result);
            $len = count($result);
            $len_inside = count($result[0]);

            foreach($keys as $key) {
                ?>
                <th><a href="./sort.php?name=<?=$key?>&table=<?=$name?>"><?=$key?></a></th>
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
                <td><a href="update2.php?id=<?= $res[0] ?>&name=<?=$name?>">Update</a></td>
                <td><a style="color: black" href="vendor/delete.php?id=<?= $res[0]?>&name=<?= $name?>">Delete</a></td>
                </tr>
                <?php
            }
        ?>  
    </table>
    <h2>Add new <?=$name?></h2>
    <form action="./create.php" method="POST">
        <button type="submit" name="name" value="<?=$name?>">Add new <?=$name?></button>
    </form>
</body>
</html>