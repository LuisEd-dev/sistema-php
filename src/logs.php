<div style="width: 100%; height: 100%; overflow-y: scroll;">
<?php
$contador = 1;
$arquivo = 'C:\xampp\apache\logs\access.log';
$fp = fopen($arquivo, 'r');
$fr = fread($fp, filesize($arquivo));
$explode = explode('::1 - - ', $fr);
while(count($explode) > $contador){
    echo $explode[$contador] . '<br>';
    $contador++;
}

?>
</div>