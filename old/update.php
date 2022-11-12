<?php
    require_once 'connect.php';
    $city_id = $_GET['city_id'];
    $city = mysqli_query($connect, "select * from city where city_id = '$city_id'");
    $city = mysqli_fetch_assoc($city);
    print_r($city);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
</head>
<body>
    <h3>Update city</h3>
        <form action="vendor/update.php" method="POST">
            <input type="hidden" name="id" value="<?= $city['city_id']?>">
            <p>City</p>
            <input type="text" name="name" value="<?= $city['name'] ?>">
            <br> <br>
            <button type="submit">Update</button>
        </form>
</body>
</html>