<?php


// Si on reçoit bien les différentes valeurs
if(isset($_POST["marqueVehicule"]) && isset($_POST["modeleVehicule"]) && isset($_POST["anneeConstruction"]) && isset($_POST["couleurVehicule"])){
	
	// Si les valeurs on bien été remplies dans le formulaire (pas vides)
	if(!empty($_POST["marqueVehicule"]) && !empty($_POST["modeleVehicule"]) && !empty($_POST["anneeConstruction"]) && !empty($_POST["couleurVehicule"])){


		// Connexion bases de données
		$pdo = new PDO('mysql:host=localhost;dbname=exercice_vehicules', 'root', '', array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
		));

		// Requête SQL
		$createVehicule = $pdo -> prepare("INSERT INTO vehicule (marque, modele, annee, couleur) VALUES(:marque, :modele, :annee, :couleur)");
		
		$createVehicule -> bindParam(":marque", $_POST["marqueVehicule"]);
		$createVehicule -> bindParam(":modele", $_POST["modeleVehicule"]);
		$createVehicule -> bindParam(":annee", $_POST["anneeConstruction"]);
		$createVehicule -> bindParam(":couleur", $_POST["couleurVehicule"]);

		$createVehicule -> execute();
		
		// Message de réussite de la requête
		$retour["erreur"] = false;

		}
		else{
			$retour["message"] = $resultat->errorInfo()[2];
		}

	}
	else{
		$retour["message"] = "Parametre vide!";  // Gestion erreur if empty variable POST
	}

}
else{
	$retour["message"] = "Parametre manquant!";  // Gestion erreur if isset variable POST
}

echo json_encode($retour);


?>