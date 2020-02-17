<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $valor =  $_POST['valor'];
    $estoque = $_POST['estoque'];
    
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
    $consulta = $pdo->prepare('UPDATE produtos SET produto = :produto, valor = :valor, estoque = :estoque WHERE id = :id');
    $consulta->bindParam(':produto', $produto);
    $consulta->bindParam(':valor', $valor);
    $consulta->bindParam(':estoque', $estoque);
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    header('Location: ../../painel.php');
} else {
    $id = $_GET['prodEdit'];
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
    $consulta = $pdo->prepare('SELECT * FROM produtos WHERE id = :id');
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    if(isset($dados[0]['produto'])){
        $nome = $dados[0]['produto'];
        $valor = $dados[0]['valor'];
        $estoque = $dados[0]['estoque'];
    } else {
        exit('Usuário não encontrado... <a href="../../painel.php?id=usuarios"> <u>Voltar</u> </a>');
    }    
}
?>
<center>
<form action='src/produtos/edit.php' method='POST'>
    <h1> Edite o produto: </h1>
    Produto: <input name="produto" type="text" value="<?php echo $nome; ?>"></input>
    Preço: <input name="valor" type="text" value="<?php echo $valor; ?>"></input>
    Estoque: <input name="estoque" type="text" value="<?php echo $estoque; ?>"></input>
    <input name="id" type="hidden" value="<?php echo $id; ?>">
    <br><br>
    <input class="btn" type='submit' value="Atualizar"></input> 
</form>
</center>