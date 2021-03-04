<?php
$dsn = 'mysql:dbname=hospitalE2N;host=127.0.0.1';
$user = 'jean';
$password = 'root';

try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'conection bdd OK ';
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

try {
    $result = $bdd-> prepare('DELETE FROM `appointments` WHERE idPatients = ? ');
    $result->execute(array($_GET['id']));

    $result1 = $bdd-> prepare('DELETE FROM `patients` WHERE id = ? ');
    $result1->execute(array($_GET['id']));

    echo 'tu as reussi';
    header( 'location: /php/pdo/affich/liste-patient.php?message=rendez-vous et patient suprimé');
} catch (PDOException $err) {
    echo 'echec prepare exec' . $err->getMessage();
    //header( 'location : ajout-patient.php');
}