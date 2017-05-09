<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	  id_restaurant PK AI INT(3)
	  nom VARCHAR(100)
	  adresse VARCHAR(255)
	  telephone VARCHAR(10)
	  type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	  note INT(1)
	  avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.
	
	3- Effectuer les vérifications nécessaires :
	   Le champ nom contient 2 caractères minimum
	   Le champ adresse ne doit pas être vide
	   Le téléphone doit contenir 10 chiffres
	   Le type doit être conforme à la liste des types de la bdd
	   La note est un nombre entre 0 et 5
	   L'avis ne doit être vide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/



$contenu = '';

$type_restaurant = array('gastronomique', 'brasserie', 'pizzeria', 'autre');

$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// var_dump($_POST);

if(!empty($_POST)) {
	if (strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 100){
		$contenu .= '<div>Le nom doit comporter au moins 2 caractères</div>';
	}

if (!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
		$contenu .= '<div>Le téléphone doit comporter 10 chiffres</div>';
	}

if (!in_array($_POST['type_restaurant'], $type_restaurant)){
		$contenu .= '<div>Le type de restaurant n\'est pas valide</div>';
	}

}


if (empty($contenu)) {

		foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}


		$query = $pdo->prepare('INSERT INTO restaurant (nom, adresse, type_restaurant, note, avis,) VALUES(:nom, :adresse, :type_restaurant, :note, :avis,)');






?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter un restaurant</title>
</head>
<body>

	<h1>Ajouter un restaurant</h1>

	<form action="" method="post">

		
		<div class="input-group">
			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom">
		</div>

		<div class="input-group">
			<label for="adresse ">Adresse</label>
			<input type="text" name="adresse" id="adresse">
		</div>

		<div class="input-group">
			<label for="telephone">Téléphone</label>
			<input type="text" name="telephone" id="telephone">
		</div>

		<div class="input-group">
			
	
			
				
			</select>
		</div>


		<div class="input-group">
			<label for="type_restaurant">Type de restaurant</label>
	
			<select name="type_restaurant" id="type_restaurant">
				<?php 
				foreach($type_restaurant as $key => $value){
					echo "<option value=$value>$value</option>";
				} 
				?>
				
			</select>
		</div>

		<div class="input-group">
			<label for="note">Note</label>
	
			<select name="note" id="note">
			<input type="number" name="note" min="0" max="5">
			</select>
		</div>

		<button type="submit">Envoyer</button>
	
	
	
	
	
	
	
	
	
	</form>


</body>
</html>