
<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if((isset($_POST["usuario"]) && $_POST["usuario"] != "") && (isset($_POST["senha"]) && $_POST["senha"] != "")){
        $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
        $consulta = $pdo->prepare('INSERT INTO admin (usuario, senha, email) VALUES (:usuario, :senha, :email)');
        $consulta->bindParam(':usuario', $_POST["usuario"]);
        $consulta->bindParam(':senha', md5($_POST["senha"]));
        $consulta->bindParam(':email', $_POST["email"]);

        $consulta->execute();
        header('Location: ../painel.php?id=usuarios');
    } else {
        header("Location: ../painel.php?userAdd");
    }
} else {
    header("Location: ../painel.php?userAdd");
}
?>