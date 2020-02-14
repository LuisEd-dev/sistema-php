<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_COOKIE["validado"]) && $_COOKIE["validado"] == $_COOKIE["PHPSESSID"]){
    $pdo = new PDO("mysql:host=localhost;dbname=adminsistema", "root", "toor"); 
    $consulta = $pdo->prepare('SELECT * FROM newsletter');
    $consulta->execute();
    $dados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $dado) {
        $from = "luised-dev@sistemaphp.com";

        $to = $dado['email'] ;

        $subject = "Newsletter Sistema-PHP";

        $message = $_POST['texto'];

        $headers = "From:". $from;

        mail($to, $subject, $message, $headers);      
    }
    header('Location: ../../painel.php?id=newsletter');
} else {
    header('Location: ../../painel.php?id=newsletter');
}

?>