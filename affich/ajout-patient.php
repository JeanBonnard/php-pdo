<?php
if (isset($_GET['message'])) :
    echo '<div style="padding: 10px; background-color: green; color: #ffffff;">' .$_GET['message'].'</div>';
endif;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<form class="col s12" action="traitement-patient.php" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="input-field col s4">
            <i class="material-icons prefix">person</i>
            <input id="first_name" type="text" class="validate" name="firstname" required>
            <label for="first_name">Prénom</label>
        </div>

        <div class="input-field col s4">
            <i class="material-icons prefix">person</i>
            <input  id="last_name" type="text" class="validate" name="lastname" required>
            <label for="last_name">Nom</label>
        </div>

        <div class="input-field col s4">
            <i class="material-icons prefix">date_range</i>
            <input id="dtp" type="date" class="datepicker" name="date" required>
            <label for="dtp">date de naissance</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">phone</i>
            <input id="icon_prefix2" type="tel" class=" validate" name="phone" required>
            <label for="icon_prefix2">Telephone</label>
        </div>

        <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email" class="validate" name="mail" required>
            <label for="email" data-error="wrong" data-success="right">Email</label>
        </div>

    </div>

    <button class="btn waves-effedatect waves-light" type="submit" name="submit" value="submit">Submit
        <i class="material-icons right">send</i>
    </button>

</form>

<a href="liste-patient.php">liste des patients</a>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/picker.js "></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>
