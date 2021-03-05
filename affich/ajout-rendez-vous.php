<?php
if (isset($_GET['message'])){
    echo "<div style='background-color: green; padding: 10px; color: white;'>".$_GET['message']."</div>";
}
 require_once 'header.php';
?>


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

    </div><br>
    <button type="submit" class="btn btn-success">confirmer</button> <br>
</form><br>
<button class="btn btn-success"><a href="liste-rdv.php">afficher la liste des rdv</a></button>
</body>
</html>