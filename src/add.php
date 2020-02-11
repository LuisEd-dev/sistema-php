<form action="src/add.php" method="POST">
    Usuario: <input class="addInput" name="usuario" type="text"></input> <br>
    Senha: <input class="addInput" name="senha" type="password"></input> <br>
    Email: <input class="addInput" name="email" type="text"></input> <br>
    <button class="addBtn" type="submit">Adicionar</button> 
</form>
<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
    $consulta = $pdo->prepare('INSERT INTO admin (usuario, senha, email) VALUES (:usuario, :senha, :email)');
    $consulta->bindParam(':usuario', $_POST["usuario"]);
    $consulta->bindParam(':senha', md5($_POST["senha"]));
    $consulta->bindParam(':email', $_POST["email"]);

    $consulta->execute();
    header('Location: ../painel.php?id=usuarios');
}
?>