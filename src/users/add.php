<?php 
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
    if((isset($_POST["usuario"]) && $_POST["usuario"] != "") && (isset($_POST["senha"]) && $_POST["senha"] != "")){
        $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root"); 
        $consulta = $pdo->prepare('INSERT INTO admin (usuario, senha, email) VALUES (:usuario, :senha, :email)');
        $consulta->bindParam(':usuario', $_POST["usuario"]);
        $consulta->bindParam(':senha', md5($_POST["senha"]));
        $consulta->bindParam(':email', $_POST["email"]);

        $consulta->execute();
        header('Location: ../../painel.php?id=usuarios');
    } else {
        header("Location: ../../painel.php?userAdd");
    }
} else if(isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){

} else {
    exit();
}
?>
<form action="src/users/add.php" method="POST">
    <center>
    <h1> Registre um novo administrador: </h1>
    Usuario: <input class="addInput" name="usuario" type="text"></input> 
    Senha: <input class="addInput" name="senha" type="password"></input> 
    Email: <input class="addInput" name="email" type="text"></input> 
    <br><br>
    <button class="btn" type="submit">Adicionar</button> 
    </center>
</form>