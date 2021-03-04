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

if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {

    $nom = $_POST['lastname'];
    $prenom = $_POST['firstname'];
    $date = $_POST['date'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];


    try {
        $sql = 'UPDATE patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ? WHERE id = ?';
        $result = $bdd->prepare($sql);
        $result->execute(array($nom,$prenom,$date,$phone,$mail,$_GET['id']));

        echo 'tu as reussi';
        header( 'location: /php/pdo/affich/profil-patient.php?message=patient modifié');
    } catch (PDOException $err) {
        echo 'echec prepare exec' . $err->getMessage();
        //header( 'location : ajout-patient.php');
    }
}