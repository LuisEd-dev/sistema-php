<div id="text">Usuarios: <div id="adicionar"><a href="?userAdd"> + </a></div></div>
<b>
<div id='identificadores' class="Usuarios">ID</div>
<div id='identificadores' class="Usuarios">Usuario</div>
<div id='identificadores' class="Usuarios">Email</div>
<div id='identificadores' class="Usuarios">Editar</div>
<div id='identificadores' class="Usuarios">Deletar</div>
</b>
<?php

$pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
$consulta = $pdo->prepare('SELECT * FROM admin');
$consulta->execute();
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados as $dado) {
    echo '<div id="usuario">';
    echo '<div class="Usuarios">' . $dado['id'] . '</div>';
    echo '<div class="Usuarios">' . $dado['usuario'] . '</div>';
    echo '<div class="Usuarios">' . $dado['email'] . '</div>';
    echo '<div class="Usuarios"><a href="?userEdit='.$dado['id'].'"><img src="">-</a></div>';
    echo '<div class="Usuarios"><a href="?userDelete='.$dado['id'].'"><img src="">x</a></div>';
    echo '</div>';
}
?>