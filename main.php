<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
</head>
<style>


  </style>
   <script type="text/javascript">
    function change() {
            <?print_r("$%^&*");?>
            var select = document.getElementById("select");
            xmlhttp.open("GET","search.php?q="+select,true);
            xmlhttp.send();
    }
    </script>
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
    <div style="width: 300px; float: left;">
        <?
        session_start();
        $_SESSION['sort_var'] = 0;
        $_SESSION['sort_name'] = NULL;
        $_SESSION['query'] = NULL;
        
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $_SESSION['login']=$_POST['login'];
        //     $_SESSION['password'] = $_POST['password'];
        // }
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
        </form><br>
         <br>
        <form action="./index.php">
            <button type="submit" style="background: red; color:white; border-color:red;">Exit</button>
        </form>
    </div>
    <div style="width: 300px; float:left;">
    <p>Search</p>
        <div style="width: 200px;
                    height: 200px; 
                    background:#ccc; 
                    outline: 2px solid #000;
                    border: 3px solid #fff;
                    border-radius: 10px;">
            <form action="./main.php" method="POST">
                <p style="margin-bottom: 1px;">Table</p>
                <select name="select" id="select">
                    <?
                    foreach($tables as $table) {
                        ?>
                            <option name="<?=$table[0]?>" value="<?=$table[0]?>"
                            <?if(isset($_POST['select']) && $table[0] == $_POST['select']){?>selected<?}?>><?=$table[0]?></option>
                        <?
                    }
                    ?>
                </select>
                <p style="margin-bottom: 1px;">What`s searching?</p>
                <input type="text" name="search" 
                    <?if(isset($_POST['search'])){?>
                        value=<?=$_POST['search']?><?} else {?>value="Мосвка" <?
                        }?>>
                    </input> <br> <br>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
   <div>
    <table>
       <?
             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $selected = $_POST['select'];
                $query = "SELECT * FROM $selected";
                $tr = mysqli_query($connect, $query);
                $tr = mysqli_fetch_assoc($tr);
                $keys = array_keys($tr);
                $search = $_POST['search'];
                $query .= " WHERE $keys[0] LIKE '%$search%'";
                for($i = 1; $i < count($keys); $i++) {
                     $query .= " OR $keys[$i] LIKE '%$search%'";
                 }
                
                $result = mysqli_query($connect, $query);
                
                $result = mysqli_fetch_all($result);
                //print_r($result);
                if ($result != NULL){
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
                        </tr>
                        <?php
                    }
                }
            }
            
        
       ?>          
   </div>
   </table>
</body>
</html>