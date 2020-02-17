<?php
$pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
$consulta = $pdo->prepare('SELECT * FROM produtos');
$consulta->execute();
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados as $dado) {
    echo '<div id="itens">';
    echo '<div class="Item">' . $dado['produto'] . '</div>';
    echo '<div class="Item">' . $dado['valor'] . '</div>';
    echo '<div class="Item">' . $dado['estoque'] . '</div>';
    echo '</div>';
}
?>