<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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