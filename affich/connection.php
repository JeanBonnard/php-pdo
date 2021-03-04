<?php

$dsn = 'mysql:dbname=hospitalE2N;host=127.0.0.1';
$user = 'jean';
$password = 'root';

try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo 'tu as réussi ';
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}


?>