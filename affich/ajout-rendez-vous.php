<?php
if (isset($_GET['message'])){
    echo $_GET['message'];
}
 require_once 'main.css';
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

    </div>
    <button type="button" class="btn btn-success">confirmer</button>
</form>
<a href="liste-rdv.php">afficher la liste des rdv</a>
</body>
</html>