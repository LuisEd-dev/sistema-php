<?php
    session_start();
    setcookie("login", "", time()-3600, "/");
    session_destroy();
    //unset ($_COOKIE["login"]);
    //unset ($_COOKIE["PHPSESSID"]);
    header('Location: ../painel.php');
?>