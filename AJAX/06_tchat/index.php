<?php
require_once("inc/init.inc.php");

if(!empty($_SESSION['pseudo'])) {
    //  si l'utilisateur est déjà présent dans lla session, on le redirige vers dialogue.php'
    header("location:dialogue.php");
} 

var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
</head>
<body>
    <fieldset class='cadre_accueil'>
        <div id="message"></div>
    </fieldset>
    <fieldset class='cadre_accueil'>
        <form id="form">
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" value="" /><br />

            <label for="civilite">Civilité</label>
            <select name="civilite" id="civilite">
                <option value="m">Homme</option>
                <option value="f">Femme</option>
            </select><br />

            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" value="" /><br />

            <label for="date_de_naissance">Date de naissance</label>
            <input type="date" id="date_de_naissance" name="date_de_naissance" value="" placeholder="YYYY-MM-DD" /><br />

            <input type="submit" name="connexion" value="Se connecter" />

        </form>
    </fieldset>

    <script>
        // mise en place d'un évènement sur la validation d'un formulaire
        document.getElementById("form").addEventListener("submit", function(event) {
            event.preventDefault();   // on bloque la soumission du formulaire pour éviter le rechargement de la page 

            // récupération de la valeur du champs pseudo
            var champPseudo = document.getElementById("pseudo");
            var pseudo = champPseudo.value;

            // récupération de la valeur du champs civilite
            var champCivilite = document.getElementById("civilite");
            var civilite = champCivilite.value;  

            // récupération de la valeur du champs ville
            var champVille = document.getElementById("ville");
            var ville = champVille.value;  

            // récupération de la valeur du champs date_de_naissance
            var champDate = document.getElementById("date_de_naissance");
            var date_de_naissance = champDate.value;  

            var parametres = "mode=connexion&pseudo="+pseudo+"&civilite="+civilite+"&ville="+ville+"&date_de_naissance="+date_de_naissance;

            var file = "ajax_connexion.php";

            if(window.XMLHttpRequest) {
                var xhttp = new XMLHttpRequest();
            }  else {
                var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IE < v7
            }

            xhttp.open("POST", file, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.onreadystatechange = function() {
                if(xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                    var obj = JSON.parse(xhttp.responseText);
                    document.getElementById("message").innerHTML = obj.resultat;

                    if(obj.pseudo == 'disponible') {
                        // si l'indice pseudo a la valeur disponible alors on peut connecter l'utilisateur.
                        // on le redirige donc vers dialogue.php
                        window.location.href = 'dialogue.php';
                    }

                }

                

            }
            xhttp.send(parametres);


        });
    </script>
    
</body>
</html>