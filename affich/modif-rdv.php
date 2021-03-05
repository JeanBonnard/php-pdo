<?php

session_start();

require_once 'connection.php';
require_once 'header.php';

$selectStatement = $bdd->prepare("SELECT * FROM `appointments` WHERE `id`=?");
$selectStatement->execute([$_GET['id']]);
$profil = $selectStatement->fetch();
//var_dump($profil['dateHour']);

$dateTime = explode(" ",$profil['dateHour']);

$date = $dateTime[0];
$heur = $dateTime[1];

if (isset($_GET['message'])){
    echo "<div style='padding: 10px; background-color: green; color: white'>".$_GET['message']."</div>";
}
require_once 'header.php'
?>

<body>
<form class="col s12" action="traitement-modif-rdv.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="input-field col s4">

            <input id="date" type="date" class="validate" name="date" required value="<?=$date?>">
            <label for="date">date</label>
        </div>

        <div class="input-field col s4">

            <input id="hour" type="time" class="validate" name="hour" required value="<?=$heur?>">
            <label for="date">heure</label>
        </div>

    </div>
    <button type="submit" class="btn btn-success">confirmer</button>
</form>

</body>
</html>