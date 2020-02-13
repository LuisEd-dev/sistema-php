<?php
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        header('Location: ../login.html');
    }
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    if($user != "" AND $pass != ""){
        $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
        $consulta = $pdo->prepare('SELECT * FROM admin WHERE usuario = :usuario AND senha = :senha');
        $consulta->bindParam(':usuario', $user);
        $consulta->bindParam(':senha', md5($pass));
        $consulta->execute();
        if ($consulta->fetch(PDO::FETCH_ASSOC) <= 0){
            header('Location: ../index.php?failedLogin');

        } else {
            setcookie("user", $user, 0, '/');
            header('Location: ../painel.php?id='.$_COOKIE["PHPSESSID"]);
        }
    } else {
        header('Location: ../index.php?verificacao');
    }
?>