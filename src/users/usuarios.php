<div id="text">Usuarios: <div id="adicionar"><a href="?userAdd"> + </a></div></div>
<b>
<div id='identificadores' class="Item">ID</div>
<div id='identificadores' class="Item">Usuario</div>
<div id='identificadores' class="Item">Email</div>
<div id='identificadores' class="Item">Editar</div>
<div id='identificadores' class="Item">Deletar</div>
</b>
<?php

$pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
$consulta = $pdo->prepare('SELECT * FROM admin');
$consulta->execute();
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados as $dado) {
    echo '<div id="itens">';
    echo '<div class="Item">' . $dado['id'] . '</div>';
    echo '<div class="Item">' . $dado['usuario'] . '</div>';
    echo '<div class="Item">' . $dado['email'] . '</div>';
    echo '<div class="Item"><a href="?userEdit='.$dado['id'].'"><img src="">-</a></div>';
    echo '<div class="Item"><a href="?userDelete='.$dado['id'].'"><img src="">x</a></div>';
    echo '</div>';
}
?>