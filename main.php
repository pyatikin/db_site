<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
</head>
<body>
    <?
    session_start();
    $_SESSION['sort_var'] = 0;
    $_SESSION['sort_name'] = NULL;
    $_SESSION['select'] = $_SESSION['from'] = $_SESSION['join'] = $_SESSION['on'] = $_SESSION['where'] = $_SESSION['query'] = NULL;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['login']=$_POST['login'];
        $_SESSION['password'] = $_POST['password'];
    }
    //print_r($_SESSION);
    require_once "./connect.php";
    $_SESSION['table'] = NULL;
    $tables = mysqli_query($connect, "show tables");
    $tables = mysqli_fetch_all($tables);
    //print_r($tables);
    ?>
    <form action="./table.php" method="POST">
        <?
        foreach($tables as $table) {
            ?>
            <p>
            <button type="submit" name="button" value="<?=$table[0]?>"><?=$table[0]?></button>
            </p>
            <?
        }
        ?>
    </form>
    <form action="general.php">
        <button>General</button>
    </form> <br>
    <form action="./index.php">
        <button type="submit" style="background: red; color:white; border-color:red;">Exit</button>
    </form>

</body>
</html>