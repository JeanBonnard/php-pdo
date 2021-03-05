<?php

require_once 'connection.php';
require_once 'header.php';
if (isset($_GET['message'])){
    echo "<div style='background-color: green; padding: 10px; color: white;'>".$_GET['message']."</div>";
}
?>
<table border="1"><h1>LISTES DES RDV</h1><br>
    <thead>
    <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>date de rdv</th>
        <th>heure rdv</th>
        <th>supression</th>
        <th>Modifier</th>

    </tr>
    </thead>
    <tbody>

    <?php
    $result= $bdd->query("SELECT appointments.*, patients.lastname, patients.firstname FROM `patients`, `appointments` WHERE `appointments`.idPatients = `patients`.id;");
    foreach  ($result as $patient) {
        $datetime=explode(" ", $patient['dateHour']);
        $date= $datetime[0];
        $heur= $datetime[1];
        echo "<tr>";
        echo "<td>".$patient['lastname'] . "</td>";
        echo "<td>".$patient['firstname'] ."</td>";
        echo "<td>".$date. "</td>";
        echo "<td>".$heur . "</td>";
        echo '<td><a href="sup-rdv.php?id='.$patient['id'].'">❌</a></td>';
        echo '<td><a href="modif-rdv.php?id='.$patient['id'].'">✏</a></td>';
        echo "</tr>";
        //var_dump($patient['id']);
    }
    ?>

    </tbody>
</table><br>
<a href="profil-patient.php"><button type="button" class="btn btn-success">créer un rdv</button></a><br>
<a href="liste-patient.php"><button type="button" class="btn btn-success">retour liste patients</button></a><br>
