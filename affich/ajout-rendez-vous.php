<?php
if (isset($_GET['message'])){
    echo $_GET['message'];
}
require_once 'main.css';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form class="col s12" action="traitement-rdv.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="input-field col s4">

            <input id="date" type="date" class="validate" name="date" required>
            <label for="date">date</label>
        </div>

        <div class="input-field col s4">

            <input id="hour" type="time" class="validate" name="hour" required>
            <label for="date">heure</label>
        </div>

    </div>
    <button class="btn waves-effedatect waves-light" type="submit" name="submit" value="submit">confirmer</button>
</form>
<a href="liste-rdv.php">afficher la liste des rdv</a>
</body>
</html>