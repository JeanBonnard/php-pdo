<?php


$dsn = 'mysql:dbname=users;host=127.0.0.1';
$user = 'jean';
$password = 'root';

try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo 'tu as réussi ';
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

if (isset($_POST['lastname'])) {

    $nom = $_POST['lastname'];
    $prenom = $_POST['firstname'];
    $pseudo = $_POST['pseudo'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
    try {
      /*  $result = $bdd->prepare('INSERT INTO info_users (nom,prenom,pseudo,adresse,ville,mdp)VALUES(:nom,:prenom,:pseudo,:adresse,:ville,:mdp)');
        $result->bindValue(':nom', $nom);
        $result->bindValue(':prenom', $prenom);
        $result->bindValue(':pseudo', $pseudo);
        $result->bindValue(':adresse', $adresse);
        $result->bindValue(':ville', $ville);
        $result->bindValue(':mdp', $mdp);
        $resultExecute = $result->execute();*/

        $result = $bdd-> prepare('INSERT INTO info_users(nom,prenom,pseudo,adresse,ville,mdp)VALUES(?,?,?,?,?,?)');
        $result->execute(array( $nom,$prenom,$pseudo,$adresse,$ville,$mdp));
        header( 'location : index.php' );
    } catch (PDOException $err) {
        echo 'echec prepare exec';
    }
}



/*$result->closeCursor();*/

