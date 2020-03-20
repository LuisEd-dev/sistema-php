<div id="text">Venda: </div>
<br>
<center>
<form action="#" method="POST">
    Produto: <input type="text" name="prod"> </input>
    Quantidade: <input type="text" name="qtd"> </input>
    <input type="submit" value="Adicionar">  </input>
</form>
</center>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
        if($_POST["prod"] != "" && $_POST["qtd"] != ""){
            $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root"); 
            $consulta = $pdo->prepare('SELECT produto, estoque, valor FROM produtos WHERE produto = :produto');
            $consulta->bindParam(':produto', $_POST["prod"]);
            $consulta->execute();
            $response = $consulta->fetch();
            if($_POST["qtd"] <= $response["estoque"]){
                try{
                    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root"); 
                    $consulta = $pdo->prepare('UPDATE produtos SET estoque = (estoque - :quantidade) WHERE produto = :produto');
                    $consulta->bindParam(':produto', $_POST["prod"]);
                    $consulta->bindParam(':quantidade', $_POST["qtd"]);
                    $consulta->execute();
                    echo "<center>";
                    echo "<b>Produto: </b>" . $_POST["prod"] . "&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<b>Quantidade: </b>" . $_POST["qtd"]. "&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<b>Total: </b>R$" . ($_POST["qtd"]*$response["valor"]). "<br>";
                    echo "</center>";
                } catch (Exception $e){
                    echo "erro porra";
                }
            } elseif ($_POST["prod"] != $response["produto"]) {
                echo "<center><b>Produto não encontrado!</b></center>";
            } elseif ($_POST["qtd"] > $response["estoque"]) {
                echo "<center><b>Estoque insuficiente!</b></center>";
            } else{
                echo "<center><b>Erro!</b></center>";
            }
        }
    }
    else{
        exit();
    }
?>