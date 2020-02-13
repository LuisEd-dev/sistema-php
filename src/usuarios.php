<div id="text">Usuarios: <div id="adicionar"><a href="?userAdd"> + </a></div></div>
<div class="Usuarios"><b>ID</div>
<div class="Usuarios">Usuario</div>
<div class="Usuarios">Email</div>
<div class="Usuarios">Editar</div>
<div class="Usuarios">Deletar</b></div>

<?php

$pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
$consulta = $pdo->prepare('SELECT * FROM admin');
$consulta->execute();
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados as $dado) {
    echo '<div class="Usuarios">' . $dado['id'] . '</div>';
    echo '<div class="Usuarios">' . $dado['usuario'] . '</div>';
    echo '<div class="Usuarios">' . $dado['email'] . '</div>';
    echo '<div class="Usuarios"><a href="?userEdit='.$dado['id'].'"><img src="">-</a></div>';
    echo '<div class="Usuarios"><a href="?userDelete='.$dado['id'].'"><img src="">x</a></div>';
}
?>