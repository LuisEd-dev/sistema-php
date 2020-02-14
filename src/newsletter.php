<div id="text">Newsletter: <div id="adicionar"><a href="?newsAdd"> + </a></div></div>
<b>
<div id='identificadores' class="Newsletter">Nome</div>
<div id='identificadores' class="Newsletter">Email</div>
<div id='identificadores' class="Newsletter">Deletar</div>
</b>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
$consulta = $pdo->prepare('SELECT * FROM newsletter');
$consulta->execute();
$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados as $dado) {
    echo '<div class="news">';
    echo '<div class="Newsletter">' . $dado['nome'] . '</div>';
    echo '<div class="Newsletter">' . $dado['email'] . '</div>';
    echo '<div class="Newsletter"><a href="?newsDelete='.$dado['id'].'"><img src="">x</a></div>';
    echo '</div>';
}
?>