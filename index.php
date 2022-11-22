<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <?
        session_reset();
    ?>
    <form action="./main.php" method="">
        <p>Login</p>
        <input type="text" name="login">
        <p>Password</p>
        <input type="text" name="password">
        <button type="submit">Login</button>
    </form>    
</body>
</html>