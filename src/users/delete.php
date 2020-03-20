<?php
if(isset($_GET["userDelete"]) && isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root"); 
    $consulta = $pdo->prepare('DELETE FROM admin WHERE id = :id');
    $consulta->bindParam(':id', $_GET["userDelete"]);
    $consulta->execute();
    header('Location: painel.php?id=usuarios');
}
?>