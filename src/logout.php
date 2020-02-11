<?php
    session_start();
    setcookie("login", "", time()-3600, '/');
    setcookie("validado", "", time()-3600, '/');
    setcookie("user", "", time()-3600, '/');
    setcookie("PHPSESSID", "", time()-3600, "/");
    session_destroy();
    //unset ($_COOKIE["login"]);
    //unset ($_COOKIE["PHPSESSID"]);
    header('Location: ../index.php');
?>