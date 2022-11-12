<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>General form</title>
</head>
<body>
    <form action="vendor/general.php" method="POST">
        <p>SELECT</p>
        <textarea name="select">*</textarea>
        <p>FROM</p>
        <input type="text" name="from" value="city">
        <p>WHERE</p>
        <input type="text" name="where" value="city_id = 1">
        <button type="submit" style="color:brown; background:powderblue">Go</button>
    </form>
</body>
</html>
