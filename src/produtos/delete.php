<?php
$pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
$consulta = $pdo->prepare('DELETE FROM produtos WHERE id = :id');
$consulta->bindParam(':id', $_GET["prodDelete"]);
$consulta->execute();
header('Location: painel.php');
?>