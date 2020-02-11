<?php
if(isset($_GET["userDelete"])){
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
    $consulta = $pdo->prepare('DELETE FROM admin WHERE id = :id');
    $consulta->bindParam(':id', $_GET["userDelete"]);
    $consulta->execute();
    header('Location: painel.php?id=usuarios');
}
?>