<?php
require_once 'connection.php';

if (isset($_POST['date']) && !empty($_POST['date'])) {

    $dateTime = $_POST['date']." ".$_POST['hour'];


    try {
        $sql = 'UPDATE appointments SET dateHour = ? WHERE id = ?';
        $result = $bdd->prepare($sql);
        $result->execute(array($dateTime,$_GET['id']));

        echo 'tu as reussi';
        header( 'location: /php/pdo/affich/modif-rdv.php?message=rdvmodifié&id='.$_GET['id']);
    } catch (PDOException $err) {
        echo 'echec prepare exec' . $err->getMessage();
        //header( 'location : ajout-patient.php');
    }
}