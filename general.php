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
    <form action="./main.php">
        <button type="submit">Back</button>
    </form>
    <form action="vendor/general.php" method="POST">
        <p>SELECT</p>
        <textarea name="select" style="width: 200px;">city.name, exec_address.address_id</textarea>
        <p>FROM</p>
        <input type="text" name="from" value="city">
        <p>JOIN</p>
        <input type="text" name="join" value="exec_address">
        <p>ON</p>
        <textarea name="on">exec_address.city_id=city.city_id</textarea>
        <!-- <input type="text" name="on" value="exec_address.city_id=city.city_id"> -->
        <p>WHERE</p>
        <input type="text" name="where" value="city.city_id = 1">
        <button type="submit">Go</button>
    </form>
</body>
</html>
