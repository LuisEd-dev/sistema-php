<div style="width: 100%; height: 100%; overflow-y: scroll;">

<div id="text">Produtos: <div id="adicionar"><a href="?prodAdd"> + </a></div></div>
<b>
<div id='identificadores' class="Item">Produto</div>
<div id='identificadores' class="Item">Preço</div>
<div id='identificadores' class="Item">Estoque</div>
<div id='identificadores' class="Item">Editar</div>
<div id='identificadores' class="Item">Deletar</div>
</b>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root"); 
$consulta = $pdo->prepare('SELECT * FROM produtos');
$consulta->execute();
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados as $dado) {
    echo '<div id="itens">';
    echo '<div class="Item">' . $dado['produto'] . '</div>';
    echo '<div class="Item">' . $dado['valor'] . '</div>';
    echo '<div class="Item">' . $dado['estoque'] . '</div>';
    echo '<div class="Item"><a href="?prodEdit='.$dado['id'].'"><img src="">-</a></div>';
    echo '<div class="Item"><a href="?prodDelete='.$dado['id'].'"><img src="">x</a></div>';
    echo '</div>';
}
?>
</div>