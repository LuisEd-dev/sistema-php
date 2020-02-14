<?php
    $user = $_COOKIE["user"];
    if(isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
        include "src/include.php";
    } else {
        if(!isset($_COOKIE["login"]) OR $_COOKIE["login"] == "" ){
            if(isset($_COOKIE["PHPSESSID"]) && $_COOKIE["PHPSESSID"] == $_GET["id"]){
                setcookie("login", $_COOKIE["PHPSESSID"], 0, '/');
                header("Refresh: 0");
            } else {
                header('Location: index.php?failedLogin');  
            }
        } else {
            if(isset($_COOKIE["login"]) && $_COOKIE["login"] == $_COOKIE["PHPSESSID"]){
                setcookie("validado", $_GET["id"], 0, '/');
                header("Location: painel.php");
            } else {
                header('Location: index.php?failedLogin');
            }
        }
    }
    
    
    
?>
