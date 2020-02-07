<?php
    $user = $_COOKIE["user"];
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='css/painel.css'>

</head>
<body>
    
    <div id="divLateral">
        <ul id="lista">
            <li><a href="painel.php?id=cadastro">Cadastro</a></li>
            <li><a href="painel.php?id=usuarios">Usuarios</a></li>
            <li><a href="painel.php?id=newstler">Newstler</a></li>
            <li><a href="painel.php?id=logs">Logs</a></li>
        </ul>
    </div>
    <div id="divTopo">
        <img id="optIcon" src="img/options.ico">

        <a href="src/logout.php" id="logout" ><img src="img/logout.png"></a>
    </div>
    <div id="divCentral">
        <h1>Painel de Controle</h1>
        <h3>Bem Vindo <i> <?php if(isset($user)){echo $user;} else{ echo "Usuário";} ?> </i></h3>
        <center><div id="include">
            <?php
            if(isset($_GET["id"])){
                if($_GET["id"] == "cadastro"){
                    include "src/cadastro.php";
                }
                if($_GET["id"] == "usuarios"){
                    include "src/usuarios.php";
                }
                if($_GET["id"] == "newstler"){
                    include "src/newstler.php";
                }
                if($_GET["id"] == "logs"){
                    include "src/logs.php";
                }
            } else {
                include "src/contador.php";
            }
            ?>
        </div><center>
    </div>
</body>
</html>

