<?php
if(isset($_GET["newsDelete"]) && isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
    $consulta = $pdo->prepare('DELETE FROM newsletter WHERE id = :id');
    $consulta->bindParam(':id', $_GET["newsDelete"]);
    $consulta->execute();
    header('Location: painel.php?id=newsletter');
}
?>