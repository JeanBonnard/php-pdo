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

if (isset($_GET['message'])){
    echo "<div style='background-color: green;padding: 10px;color: white;'>".$_GET['message']."</div>";
}
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

// On détermine le nombre total d'articles
$sql = 'SELECT COUNT(*) AS nb_patient FROM `patients`;';

// On prépare la requête
$query = $bdd->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbPatient = (int) $result['nb_patient'];

// On détermine le nombre d'articles par page
$parPage = 4;

// On calcule le nombre de pages total
$pages = ceil($nbPatient / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

?>
<table border="1" style="text-align: center;">
    <thead>
    <tr>
        <th>id</th>
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
    $sql = 'SELECT * FROM `patients` LIMIT :premier, :parpage;';

    // On prépare la requête
    $query = $bdd->prepare($sql);

    $query->bindValue(':premier', $premier, PDO::PARAM_INT);
    $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

    // On exécute
    $query->execute();

    // On récupère les valeurs dans un tableau associatif
    $result1 = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach  ($result1 as $patient) {
        echo "<tr>";
        echo "<td>".$patient['id'] . "</td>";
        echo "<td>".$patient['lastname'] . "</td>";
        echo "<td>".$patient['firstname'] ."</td>";
        echo "<td>".$patient['birthdate'] . "</td>";
        echo "<td>".$patient['mail'] . "</td>";
        echo "<td>".$patient['phone'] . "</td>";
        echo '<td><a href="sup-pat-rdv.php?id='.$patient['id'].'">❌</a></td>';
        echo "</tr>";
    }

    require_once 'header.php'
    ?>

    </tbody>
</table><br>

<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./liste-patient.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="./liste-patient.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="./liste-patient.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
<br>

<a href="profil-patient.php"><button type="button" class="btn btn-success">profil patient</button></a><br>
<a href="ajout-patient.php"><button type="button" class="btn btn-success">ajouter un nouveau patient</button></a>
</html>