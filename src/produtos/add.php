<?php 
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
    if((isset($_POST["produto"]) && $_POST["produto"] != "") && (isset($_POST["preco"]) && $_POST["preco"] != "") && (isset($_POST["estoque"]) && $_POST["estoque"] != "")){
        try{
            $preco = str_replace(',', '.', $_POST["preco"]);
            $preco = floatval($preco);
            if($preco == 0){
                print 'Preencha Corretamente o Campo <b>Preço</b>';
                exit();
            }
            $estoque = ((int) $_POST["estoque"]);
            if($estoque == 0){
                print 'Preencha Corretamente o Campo <b>Estoque</b>';
                exit();
            }
        } catch(Exception $e) {
            echo $e;
        }
        $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root"); 
        $consulta = $pdo->prepare('INSERT INTO produtos (produto, valor, estoque) VALUES (:produto, :preco, :estoque)');
        $consulta->bindParam(':produto', $_POST["produto"]);
        $consulta->bindParam(':preco', $preco);
        $consulta->bindParam(':estoque', $estoque);
        
        $consulta->execute();
        header('Location: ../../painel.php');
    } else {
        header("Location: ../../painel.php?prodAdd");
    }
} else if(isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
    //header("Location: ../../painel.php?userAdd");
} else {
    exit();
}
?>
<form action="src/produtos/add.php" method="POST">
    <center>
    <h1> Registre um novo produto: </h1>
    Produto: <input class="addInput" name="produto" type="text"></input> 
    Preço: <input class="addInput" name="preco" type="text"></input> 
    Estoque: <input class="addInput" name="estoque" type="text"></input> 
    <br><br>
    <button class="btn" type="submit">Adicionar</button> 
    </center>
</form>