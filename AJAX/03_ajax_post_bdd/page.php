<?php
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$liste_prenom = $pdo->query("SELECT prenom, id_employes FROM employes");
$liste = "";
while($personne = $liste_prenom->fetch(PDO::FETCH_ASSOC)) {
    $liste .= '<option value="' . $personne['id_employes'] . '">' . $personne['prenom'] . '</option>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        * { font-family: sans-serif; text-align: center; }
        form, #resultat { width: 50%; margin: 0 auto; }
        select, input { padding: 5px; width: 100%; border-radius: 3px; border: 1px solid; }
        input { curdor: pointer; }
        table { border-collapse: collapse; width: 80%; margin: 0 auto; }
        td, th { padding: 10px; }


    </style>
</head>
<body>

    <form id="mon_form">
        <label>Prenom</label>
        <select id="choix">
            <?php
            // récupérer tous les prénoms présents dans la BDD entreprise sur la table employes et mettre l'id_employes dans la value
            echo $liste;
            
            ?>
        </select>
        <br />

        <input type="submit" id="valider" value="valider" />
    </form>
    <hr />
    <div id="resultat"></div>

    <script>
        // mettre en place un évènement sur la validation du formulaire (submit)
        // bloquer le rechargement de page consécutif à la validation du formulaire
        // et déclencher une requête ajax qui envoie sur ajax.php
        // sur ajax.php récupérer les informations de l'employe correspondant à l'id récupéré
        // et envoyer sous forme de tableau html. le tableau doit avoir 2 lignes, une avec le nom des colonnes et l'autre avec les valeurs

        var formulaire = document.getElementById("mon_form").addEventListener("submit", ajax);

        function ajax(event) {
            event.preventDefault();
            var champSelect = document.getElementById("choix");
            var valeur = champSelect.value;
            console.log(valeur);

            var file = "ajax.php";
            var parametres = "personne"+valeur;

            var xhttp = new XMLHttpRequest();

            xhttp.open("POST", file, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //  la méthode setRequestHeader() définit la valeur d'un header XMLHttpRequest
            //  Vous devez appeler cette méthode entre la méthode open() et send()

            xhttp.onreadystatechange = function() {
                if(xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                    var reponse = JSON.parse(xhttp.responseText);
                    //  la méthode parse de l'objet JSON permet d'évaluer la réponse et d'en faire un objet
                    document.getElementById("resultat").innerHTML = reponse.resultat;
                }
            }
            xhttp.send(parametres); //envoi
            
        }
            
        




    </script>
    
</body>
</html>