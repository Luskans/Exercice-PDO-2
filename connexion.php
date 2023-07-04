<?php

$dns = 'mysql:host=localhost;dbname=hospitale2n';
$user = 'root';
$password = '';

try {
    $db = new PDO( $dns, $user, $password);
    //echo 'Connexion établie !';
} catch (Exception $message) {
    echo 'Erreur de connexion ! <br>'.'<pre>$message</pre>';
};

?>