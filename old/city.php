<?php
require_once 'connect.php';
$name = 'city';
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
</style>
<body>
    <table>
        <tr>
            <th>city_id</th>
            <th>name</th>
        </tr>
        <?php
            $city = mysqli_query($connect, "SELECT * FROM $name");
            $city = mysqli_fetch_all($city);
            foreach($city as $c) {
                ?>
                <tr>
                    <td><?= $c[0] ?></td>
                    <td><?= $c[1] ?></td>
                    <td><a href="update.php?city_id=<?= $c[0] ?>&name=<?=$name?>">Update</a></td>
                    <td><a style="color: black" href="vendor/delete.php?id=<?= $c[0] ?>&name=<?=$name?>">Delete</a></td>
                </tr>
                <?php
            }
        ?>
    </table>
    <h3>Add new city</h3>
    <form action="vendor/create.php" method="POST">
        <p>Id</p>
        <input type="text" name="id">
        <p>City</p>
        <input type="text" name="smth">
        <br> <br>
        <button type="submit" name="name" value="city">Add new city</button>
    </form>
    <br>
    <form action="general.php">
        <button>Go</button>
    </form>
    
</body>
</html>