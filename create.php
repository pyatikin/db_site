<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create</title>
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
    <?
    require_once "./connect.php";
    $name = $_POST['name'];
    //print_r($name);
    $columns = mysqli_query($connect, "show columns from $name");
    $columns = mysqli_fetch_all($columns);
    $len = count($columns);
    //print_r($columns[1][0]);
    //print_r($len);
    // $tr = mysqli_query($connect, "select * from $name");
    // $tr = mysqli_fetch_assoc($tr);
    // $keys = array_keys($tr);
    ?>
    <form action="./table.php" method="POST">
        <button type="submit" name="button" value="<?=$name?>">Back</button>
    </form>
    <h3>Create new <?=$name?></h3>
    <form action="vendor/create.php" method="POST">
        <input type="hidden" name="table" value="<?=$name?>">    
        <?
            for($i = 0; $i < $len; $i++) {
                ?>
                <p><?=$columns[$i][0]?></p>
                <input type="text" name=<?=$columns[$i][0]?>>
                <?
            }
        ?>
        <button type="submit">Create</button>
    </form>
    
</body>
</html>