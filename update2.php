<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
</head>
<body>
    <?php
        require_once 'connect.php';
        //print_r($_GET);
        $id = $_GET['id'];
        $name = $_GET['name'];
        $tr = mysqli_query($connect, "select * from $name");
        $tr = mysqli_fetch_assoc($tr);
        $keys = array_keys($tr);
        $len = count($keys);
        $query = "select * from $name where $keys[0] = $id";
        $result = mysqli_query($connect, $query);
        $result = mysqli_fetch_array($result);
        //$city_id = $_GET['city_id'];
        
        //print_r($tr);
        //print_r($result);
        //print_r($len);
        
        
        //!!!!!!!!!$city = mysqli_query($connect, "select * from $name where $keys[0] = '$id'");
        //!!!!!!$city = mysqli_fetch_assoc($city);
        //print_r($city);
    ?>
    <form action="./table.php" method="POST">
        <button type="submit" name="button" value="<?=$name?>">Back</button>
    </form>
    <h3>Update <?=$name?></h3>
    <form action="vendor/update2.php" method="POST">
        <input type="hidden" name="table" value="<?=$name?>">    
        <input type="hidden" name=<?=$keys[0]?> value="<?=$result[$keys[0]]?>">
        <?
            for($i = 1; $i < $len; $i++) {
                ?>
                <p><?=$keys[$i]?></p>
                <input type="text" name=<?=$keys[$i]?> value="<?=$result[$i]?>">
                <?
            }
        ?>
        <button type="submit">Update</button>
    </form>
</body>
</html>