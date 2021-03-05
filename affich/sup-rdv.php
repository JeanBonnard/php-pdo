<?php
require_once 'connection.php';

try {
    $result = $bdd-> prepare('DELETE FROM `appointments` WHERE `appointments`.id = ?');
    $result->execute(array($_GET['id']));

    echo 'tu as reussi';
    header( 'location: /php/pdo/affich/liste-rdv.php?message=rendez-vous suprimé');
} catch (PDOException $err) {
    echo 'echec prepare exec' . $err->getMessage();
    //header( 'location : ajout-patient.php');
}