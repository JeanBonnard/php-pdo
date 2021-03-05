<?php
session_start();

require_once 'connection.php';



if (isset($_GET['message'])){
    echo '<div style="padding: 10px; background-color: green; color: #ffffff;">' .$_GET['message'].'</div>';
}

//$prenom = $_POST['prenom'];
//$nom = $_POST['nom'];

 if (isset($_POST['prenom']) && !empty($_POST['prenom']) || isset($_POST['nom']) && !empty($_POST['nom'])){
     require_once 'main.css';
     echo '<h1>PATIENT</h1><br><table border="1">
        <thead>
        <tr>
            <th>nom</th>
            <th>prenom</th>
            <th>mail</th>
            <th>date de naissance</th>
            <th>phone</th>

        </tr>
        </thead>
        <tbody>';

     $selectStatement = $bdd->prepare("SELECT * FROM `patients` WHERE `lastname` LIKE ? OR `firstname` LIKE ?");
     $selectStatement->execute([$_POST['nom'].'%',$_POST['prenom'].'%']);
     $profil = $selectStatement->fetch();

         echo "<tr>";
         echo "<td>".$profil['lastname'] . "</td>";
         echo "<td>".$profil['firstname'] . "</td>";
         echo "<td>".$profil['mail'] . "</td>";
         echo "<td>".$profil['birthdate'] . "</td>";
         echo "<td>".$profil['phone'] . "</td>";
         echo "</tr>";

     echo'</tbody>
     </table>
     ';

     $selectStatement = $bdd->prepare("SELECT * FROM `appointments` WHERE `appointments`.idPatients = ?");
     $selectStatement->execute([$profil['id']]);
     $rdvs = $selectStatement->fetchAll();




?>
     <h1>RENDEZ-VOUS</h1><br><table border="1">
        <thead>
        <tr>
            <th>date</th>
            <th>heur</th>
            

        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($rdvs as $rdv){
                $dateTime= explode(" ",$rdv['dateHour']);
                $date = $dateTime[0];
                $heur = $dateTime[1];
                echo'
                <tr>
                    <td>'.$date.'</td>
                    <td>'.$heur.'</td>
                </tr>';
            }

           ?>
        </tbody>
        </table><br>
        <a href="modif-patient.php?id=<?=$profil["id"]?>"><button>Modifier le profil patient</button></a><br>
        <a href="ajout-rendez-vous.php?id=<?=$profil["id"]?>"><button>prendre rdv pour ce patient</button></a>
<?php
 } else{

     echo '<h1>Rechercher un patient</h1>

<form action="profil-patient.php" method="post">
    <label for="prenom">prénom</label>
    <input type="text" name="prenom">

    <label for="nom">nom</label>
    <input type="text" name="nom">

    <button type="button" class="btn btn-success">rechercher</button>

</form>
</html>';
 }

?>


