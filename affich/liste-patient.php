<?php

/*$dsn = 'mysql:dbname=hospitalE2N;host=127.0.0.1';
$user = 'jean';
$password = 'root';

try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo 'tu as réussi ';
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}*/
require_once 'connection.php';
require_once 'main.css';
if (isset($_GET['message'])){
    echo "<div style='background-color: green;padding: 10px;color: white;'>".$_GET['message']."</div>";
}

?>
<table border="1" style="text-align: center;">
    <thead>
    <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>date de naissance</th>
        <th>mail</th>
        <th>phone</th>
        <th>supprimé patient et rdv</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $result= $bdd->query("SELECT * FROM `patients`");
    foreach  ($result as $patient) {
        echo "<tr>";
        echo "<td>".$patient['lastname'] . "</td>";
        echo "<td>".$patient['firstname'] ."</td>";
        echo "<td>".$patient['birthdate'] . "</td>";
        echo "<td>".$patient['mail'] . "</td>";
        echo "<td>".$patient['phone'] . "</td>";
        echo '<td><a href="sup-pat-rdv.php?id='.$patient['id'].'">❌</a></td>';
        echo "</tr>";
    }
    ?>

    </tbody>
</table><br>
<a href="profil-patient.php"><button>profil patient</button></a>
<a href="ajout-patient.php"><button>ajouter un nouveau patient</button></a>