<?php

require_once 'connection.php';

$dateTime= $_POST['date'].' '.$_POST['hour'];

try {
    $result = $bdd-> prepare('INSERT INTO appointments (dateHour,idPatients)VALUES(?,?)');
    $result->execute(array($dateTime,$_GET['id']));

    echo 'tu as reussi';
    header( 'location: /php/pdo/affich/ajout-rendez-vous.php?message=rendez-vous ajouté');
} catch (PDOException $err) {
    echo 'echec prepare exec' . $err->getMessage();
    //header( 'location : ajout-patient.php');
}