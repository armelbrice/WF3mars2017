<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	3- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

$affichage = "";
$email= "";
$pdo = new PDO('mysql:host=localhost;dbname=contact', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if (!empty($_POST)) {  
	if (strlen($_POST['nom'] < 2)) {
		$affichage .= '<p>Minimum 2 caractères</p>';

	}
} 

if (!empty($_POST)) {  
	if (strlen($_POST['prenom'] < 2)) {
		$affichage .= '<p>Minimum 2 caractères</p>';

	}

} 

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $affichage = "format invalide"; 
}

/*
if (empty($contenu)) {  // si $contenue est vide, c'est qu'il n'y a pas d'erreur
		
		$contact = executeRequete("SELECT id_contact FROM contact WHERE id_contact = :id_contact", array('id_contact' => $_POST['id_contact'])); // 
		
		if ($membre->rowCount() > 0) {  // si il y a des lignes dans le résultat de la requête
			$contenu .= '<div class="bg-danger">Le pseudo est indisponible : veuillez en choisir un autre</div>';
		} else {
		// Si le pseudo est unique, on peut faire l'inscription en BDD :
		
		$_POST['mdp'] = md5($_POST['mdp']);  // permet d'encrypter le mot de passe selon l'algorithme md5. Il faudra le faire aussi sur la page de connexion pour comparer 2 mots cryptés
		
		executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0)", array(':pseudo' => $_POST['pseudo'], ':mdp' => $_POST['mdp'], ':nom' => $_POST['nom'], ':prenom' => $_POST['prenom'], ':email' => $_POST['email'], ':civilite' => $_POST['civilite'], ':ville' => $_POST['ville'], ':code_postal' => $_POST['code_postal'], ':adresse' => $_POST['adresse']));
		
		$contenu .= '<div class="bg-success">Vous êtes inscrit. <a href="connexion.php">Cliquez ici pour vous connecter</a></div>';
		$inscription = true;  // pour ne plus afficher le formulaire d'inscription
		
		}  // fin du else de if ($membre->rowCount() > 0) 
	} // fin du if (empty($contenu))
*/



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout contact</title>

    
</head>
<body>

	<form action="" method="post">

		
        	<label for="id_contact">ID contact :</label>
        	<input type="text" id="id_contact" />
    	

		
        	<label for="nom">Nom :</label>
        	<input type="text" id="nom" />
    	

		
        	<label for="prenom">Prenom :</label>
        	<input type="text" id="prenom" />
    	

	
        	<label for="courriel">Courriel :</label>
        	<input type="email" id="courriel" />

			<label for="telephone">Telephone :</label>
        	<input type="number" id="prenom" nom="telephone"/>

			<select>
			<?php
			/*$a = date('Y') - 100; //equivaut a 1917
			while($a <= date('Y')) { // équivaut à $a <=2017
    		echo "<option>$a</option>";
    		$a++;
			} */

			
			$a = 1917;
			while($a <= 2017) {
			echo "<option>$a</option>";
    		$a++;
			}

			echo '</select>';


			?>	

			<label for="typedecontact">Type de Contact :</label>
        	<select name="typedecontact" id="typedecontact">
				<option value="ami">Ami</option>
				<option value="famille">Famille</option>
				<option value="professionnel">Professionnel</option>
				<option value="autre">Autre</option>


			</select>
    	


	</form>





</body>

</html>

