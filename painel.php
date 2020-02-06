<?php
    if(!isset($_COOKIE["login"]) OR $_COOKIE["login"] == "" ){
        if($_COOKIE["PHPSESSID"] == $_GET["id"]){
            setcookie("login", $_COOKIE["PHPSESSID"], 0);
            header("Refresh: 0");
        } else {
            header('Location: index.html?failedLogin');
        }
    } else {
        
        if(isset($_COOKIE["login"]) && $_COOKIE["login"] != ""){
            //header('Location: painel.html');
            //include "painel.html";
        } else {

           header('Location: index.html?failedLogin');
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/painel.css'>
</head>
<body>
    <div id="divLateral">

    </div>
    <div id="divTopo">
        <img id="optIcon" src="img/options.ico">
        <a href="src/logout.php" id="logout">logout</a>
    </div>
</body>
</html>

