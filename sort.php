<?
    session_start();
    if($_GET['name'] != $_SESSION['sort_name']) {
        $_SESSION['sort_name'] = $_GET['name'];
        $_SESSION['sort_var'] = 0;
    }
    switch($_SESSION['sort_var']) {
        case 0:
            $_SESSION['sort_var']++;
            break;
        case 1:
            $_SESSION['sort_var']++;
            break;
        case 2:
            $_SESSION['sort_var']--;
            break;
        default:
            break;
    }
    //print_r($_SESSION['sort_var']);
    //print_r($_SESSION['sort_name']);
    $_SESSION['table'] = $_GET['table'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>