<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

$from = "testing@yourdomain.com";

$to = "luiseduardo123321@gmail.com";

$subject = "Verificando o correio do PHP";

$message = "O correio do PHP funciona bem";

$headers = "From:". $from;

mail($to, $subject, $message, $headers);

echo "A mensagem de e-mail foi enviada.";

?>