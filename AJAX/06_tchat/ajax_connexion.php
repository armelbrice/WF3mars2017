<?php
require_once("inc/init.inc.php");

$tab = array();
$tab['resultat'] = "";
$tab['pseudo'] = "disponible";

$erreur = false; //variable de contrôle en fin de script. si sa valuer est passée à true alors il y a eu une erreur (exemple le pseudo indisponible)

// extract($_POST); mauvaise pratique
$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

/* au dessus en ternaire et voici le code normal
if(isset($_POST['mode'])) {
    $mode = $_POST['mode'];
} else {
    $mode = "";
}
*/

// action = condition ? condition vrai (if) : condition fausse (else);
$pseudo = isset($_POST['pseudo']) ? addslashes ($_POST['pseudo']) : '';
$civilite = isset($_POST['civilite']) ? addslashes ($_POST['civilite']) : '';
$ville = isset($_POST['ville']) ? addslashes ($_POST['ville']) : '';
$date_de_naissance= isset($_POST['date_de_naissance']) ? addslashes ($_POST['date_de_naissance']) : '';
// addslashes($string). cette fonction prédéfinie php rajoute un antislash "\"  devant chaque ' ou " dans la chaîne

if($mode == "connexion") {
    // traitement de la connexion/inscription
    // requête pour tester si le pseudo est dèjà présent dans la BDD
    $resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo' ");
    $membre = $resultat->fetch(PDO::FETCH_ASSOC);
    if($resultat->rowCount() == 0 ) {
        // s' il n y a pas de ligne alors le pseudo est libre car inexistant en BDD

        $time = time(); // on récupère le timestamp
        $pdo->query("INSERT INTO membre (pseudo, civilite, ville, date_de_naissance, ip, date_connexion) VALUES ('$pseudo', '$civilite', '$ville', '$date_de_naissance', '$_SERVER[REMOTE_ADDR]', $time)");

        $id_membre = $pdo->lastInsertId(); // on récupère le dernier id inséré

        $tab['resultat'] = "Membre enregistré";

    } else if ($resultat->rowCount() > 0 && $_SERVER['REMOTE_ADDR'] == $membre['ip']) {
        // si le pseudo est unique et que l'adrese ip est la même que celle enregistrée, c'est donc le même utilisateur
        //  on met à jour uniquement sa date_connexion
        $time = time();
        $pdo->query("UPDATE membre SET date_connexion=$time WHERE id_membre = $membre[id_membre]");
        $id_membre = $membre['id_membre'];

    } else {
        //  le pseudo est déjà pris et l'adrese ip ne correspond pas à ce pseudo
        $tab['resultat'] = "Pseudo indisponible, veuillez recommencer";
        $erreur = true; //nous sommes dans un cas d'erreur, nous changeons la valeur de cette variable pour la tester après
        $tab['pseudo'] = "indisponible"; // évite la redirection depuis index.php
    }

    if(!$erreur) { // if($erreur == false) . s il n y a pas d'erreur durant les traitements précédents

            //  on place dans la $_SESSION le pseudo, l'id et la civilité de l'utilisateur
            $_SESSION['id_membre'] = $id_membre;
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['civilite'] = $civilite;

            $f =  fopen("prenom.txt", "a"); // on ouvre un fichier prenom.txt sinon on le crée
                  fwrite($f, $pseudo . "\n"); // on écrit dans ce fichier le pseudo de l'utilisateur
                  fclose($f); // pour fermer le fichier et libérer de la ressource


    }
}


    


echo json_encode($tab);
