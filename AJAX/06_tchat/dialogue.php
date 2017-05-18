<?php
require_once('inc/init.inc.php');
if(empty($_SESSION['pseudo'])) {
    //  si l'utilisateur est déjà présent dans la session, on le redirige vers dialogue.php'
    header("location:index.php");
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="conteneur">
        <h2 id="moi">Bonjour <?php echo $_SESSION['pseudo']; ?></h2>
        <div id="message_tchat"></div>
        <div id="liste_membre_connecte"></div>
        <div class="clear"></div>
        <div id="smiley">
            <img src="smil/smiley1.gif" alt=":)" />
        </div>
        <!-- Formulaire -->
        <div id="formulaire_tchat">
            <form id="form">
            <textarea name="message" id="message" maxlength="300" rows="5"></textarea>
            <input type="submit" name="envoi" value="envoi" class="submit" />

            </form>

        </div>
        <div id="postMessage"></div>
    </div>
    <script>

        // faire en sorte que si l'utilisateur appuie sur la touche "entrée" cela enregistre le message code de la touche "entrée" => 13
        document.addEventListener("keypress", function(event){
            if(event.keyCode == 13) {
                event.preventDefault(); // pour éviter le retour chariot dans le textarea
                // on recupère le message
                var messageValeur = document.getElementById("message").value;

                // on envoie notre ajax pour enregistrement
                ajax("postMessage", messageValeur);

                // on envoie une autre requête pour afficher les messages
                ajax("message_tchat");

                // on vide le champ
                document.getElementById("message").value ="";


            }

        });
        



        //  ajout de :) dans le message lors du clic sur le smiley
        document.getElementById("smiley"). addEventListener("click", function(event){
            document.getElementById("message").value = document.getElementById("message").value + event.target.alt;
            document.getElementById("message").focus(); // focus permet de remettre le curseur
            console.log(event);
        });


        // ajax('message_tchat');

        // Pour récupérer la liste des membres connectés
        setInterval("ajax(liste_membre_connecte)", 3333);

        // Pour récupérer la liste des messages
        setInterval("ajax(liste_message_tchat)", 2000);

        // Enregistrement du message via le bouton submit
            document.getElementById("form").addEventListener("submit", function(e) {
            e.preventDefault(); // on bloque le rechargement de la page lors de la soumission

            // on recupère le message
            var messageValeur = document.getElementById("message").value;

            // on envoie notre ajax pour enregistrement
            ajax("postMessage", messageValeur);

            // on envoie une autre requête pour afficher les messages
            ajax("message_tchat");

            // on vide le champ
            document.getElementById("message").value ="";

        });

        // FERMETURE DE LA PAGE PAR L'UTILISATEUR
        // on le retire du fichier prenom.txt
        window.onbeforeunload = function() {
            ajax('liste_membre_connecte', '<?php echo $_SESSION['pseudo']; ?>');
        };


        // déclaration de la fonction ajax
        function ajax(mode, arg = '') {
            if(typeof(mode) == 'object') {
                mode = mode.id;
                //  l'argument mode recevra les id des differents elements de notre page. Sachant que l'on peut sélectionner des éléments html directement par leur id (sans getElementById;;). Il y a un risque de récupérer un objet représentant l'élément html. Dans ce cas nous récupérons juste l'id de l'élément (mode = mode.id)
            }
            console.log("mode actuel: "+mode); // nous affiche la tâche en cours dans la console

            var file = "ajax_dialogue.php";
            var parametres = "mode="+mode+"&arg="+arg;

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

                document.getElementById(mode).innerHTML = obj.resultat;
                var boitemessage = document.getElementById("message_tchat");
                document.getElementById(mode). scrollTop = boiteMessage.scrollHeight;
                // permet de descendre l'ascenceur de ce div et de voir les derniers messages



                        }
                }
            xhttp.send(parametres);

        }


    </script>
    
</body>
</html>