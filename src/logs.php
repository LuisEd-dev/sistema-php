<div style="width: 100%; height: 100%; overflow-y: scroll;">
<br>
<center>
    <form method="POST">
    <button class='btn' name='dia'>Hoje</button>
    <button class='btn' name='mes'>Nesse Mês</button>
    <button class='btn' name='ano'>Nesse Ano</button>
    <button class='btn' name='all'>Todo o log</button>
    </form>
</center>
<br>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $arquivo = 'C:\xampp\apache\logs\access.log';
    $contador = count(file($arquivo));
    $fp = fopen($arquivo, 'r');
    $fr = fread($fp, filesize($arquivo));
    $explode = explode(' - - ', $fr);
    if(isset($_POST['dia'])){
        while(count($explode) > $contador && $contador > 0){
            if (strpos($explode[$contador], date('d/M/Y'))){
                echo $explode[$contador] . '<br>';
            }
            $contador--;
        }
    } else if(isset($_POST['mes'])){
        while(count($explode) > $contador && $contador > 0){
            if (strpos($explode[$contador], date('M/Y'))){
                echo $explode[$contador] . '<br>';
        
            }
            $contador--;
        }
    } else if(isset($_POST['ano'])){
        while(count($explode) > $contador && $contador > 0){
            if (strpos($explode[$contador], date('Y'))){
                echo $explode[$contador] . '<br>';
        
            }
            $contador--;
        }
    } else if(isset($_POST['all'])){
        while(count($explode) > $contador && $contador > 0){
            echo $explode[$contador] . '<br>';
            $contador--;
        }
    }
}
?>
</div>