<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $pass =  md5($_POST['pass']);
    $email = $_POST['email'];
    echo $id . '<br>'. $nome . '<br>'.$pass . '<br>'.$email;
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root"); 
    $consulta = $pdo->prepare('UPDATE admin SET usuario = :usuario, senha = :senha, email = :email WHERE id = :id');
    $consulta->bindParam(':usuario', $nome);
    $consulta->bindParam(':senha', $pass);
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    header('Location: ../../painel.php?id=usuarios');
} else {
    $id = $_GET['userEdit'];
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
    $consulta = $pdo->prepare('SELECT * FROM admin WHERE id = :id');
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    if(isset($dados[0]['usuario'])){
        $nome = $dados[0]['usuario'];
        $email = $dados[0]['email'];
    } else {
        exit('Usuário não encontrado... <a href="../../painel.php?id=usuarios"> <u>Voltar</u> </a>');
    }    
}
?>
<center>
<form action='src/users/edit.php' method='POST'>
    <h1> Edite o usuário: </h1>
    Usuário: <input name="nome" type="text" value="<?php echo $nome; ?>"></input>
    Senha: <input name="pass" type="password"></input>
    Email: <input name="email" type="text" value="<?php echo $email; ?>"></input>
    <input name="id" type="hidden" value="<?php echo $id; ?>">
    <br><br>
    <input class="btn" type='submit' value="Atualizar"></input> 
</form>
</center>