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
            <li><a class="opcoes" href="painel.php?id=cadastro">Cadastro</a></li>
            <li><a class="opcoes" href="painel.php?id=usuarios">Usuarios</a></li>
            <li><a class="opcoes" href="painel.php?id=newsletter">Newsletter</a></li>
            <li><a class="opcoes" href="painel.php?id=logs">Logs</a></li>
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
                switch ($_GET["id"]){
                    case "cadastro":
                        include "cadastro.php";
                    break;
                    case "usuarios":
                        include "users/usuarios.php";
                    break;
                    case "newsletter":
                        include "news/newsletter.php";
                    break;
                    case "logs":
                        include "logs.php";
                    break;
                }
            } else if(isset($_GET["userEdit"])){
                include "users/edit.php";
            } else if(isset($_GET["userDelete"])){
                include "users/delete.php";
            } else if(isset($_GET["userAdd"])){
                include "users/add.html";
            } else if(isset($_GET["newsDelete"])){
                include "news/delete.php";
            } else if(isset($_GET["newsAdd"])){
                include "news/add.html";
            } else {
                include "produtos/produtos.php";
            }
            
        ?>
        </div><center>
    </div>
</body>
</html>