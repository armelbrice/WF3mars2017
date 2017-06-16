
<?php
    $mysqli = new mysqli("localhost", "root", "", "repertoire");
    if(isset($_POST['inscription']))
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        // echo'<pre>';var_dump($_POST);echo'</pre>';

        echo '<div cless="succes">';
        foreach($_POST as $indice => $valeur)
        {
            echo "<p style='border: 1px solid black; color: white; text-aligne: center;>'>$indice = $valeur</p>";
        }
        echo '</div>';
        $date_de_naissance = $_POST['annee'] . "-" . $_POST['mois'] . "-" 
        
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Repertoire</title>
</head>
<body>

    <style>
        label, select{float: left; width: 100px;}
        fieldset{float: left; width: 220px;}
        .submit{clear: both;}
        .erreur{background: #ff0000;}
        .succes{background: #669933;}
    </style>

    <form action="" method="post">
        <fieldset>

            <legend>Informations</legend>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom"><br>

            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom"><br>

            <label for="telephone">Telephone</label>
            <input type="text" id="telephone" name="telephone" maxlength="10"><br>

            <label for="profession">Profession</label>
            <input type="text" id="profession" name="profession"><br>

            <label for="ville">ville</label>
            <input type="text" id="ville" name="ville"><br>

            <label for="codepostal">code postal</label>
            <input type="text" id="codepostal" name="codepostal"><br>

            <label for="adresse">Adresse</label>
            <textarea id="adresse" name="adresse" cols="16"></textarea><br>

            <legend>Informations supplémentaires</legend>

            <label>date de naissance</label><br><br>
            <label for="jour">Jour</label>
            <select name="jour" id="jour">
                    <?php for($i=1;$i<=31;$i++)
                    if($i<=9)
                    {
                        echo "<option>0$i</option>";
                    }
                    else
                    {
                        echo "<option>$i</option>";
                    }
                ?>
            </select><br>

            <select name="mois" for="mois">
                <option value="01">Janvier</option>
                <option value="02">Février</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mai</option>
                <option value="06">Juin</option>
                <option value="07">Juillet</option>
                <option value="08">Aout</option>
                <option value="09">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Décembre</option>

            </select><br>

            <select name="annee" id="annee">
                <?php 
                    for($i = date("Y"); $i >= 1930; $i--)
                    {
                        echo "<option>$i</option>";
                    }
                ?>
            </select><br>


            <label for="">sexe</label>
            homme : <input type="radio" name="sexe" value="m" checked>
            femme : <input type="radio" name="sexe" value="f"><br>

            <label for="description">description</label>
            <textarea id="description" name="description" cols="25" rows="7"></textarea><br>

            <input type="submit" name="inscription" value="inscription">

        </fieldset>

    </form>
    
</body>
</html>


<!--


Nom
Prenom
telephone profession
ville
cp
date de naissance : jour - mois - année
sexe : homme - femme
description
submit -inscription

