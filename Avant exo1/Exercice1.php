<!doctype html>
	<html lang="fr">
		<head>
  			<meta charset="utf-8">
  			<title>Titre de la page</title>
  			<link rel="stylesheet" href="css/style.css">

		</head>



		<body>
		
		<?php
		/*Creation du tableau*/

		$tableau= array(
			'Prénom: ' => 'John',
			'Nom:' => 'Doe', 
			'Adresse: ' => '15, main street', 
			'Code Postal: ' => '25063', 
			'Ville: ' => 'Farawayland', 
			'Email: ' => 'johndoe@laposte.fr', 
			'Tel: ' => '01 02 03 04 05', 
			'Date de naissance: ' => '1990/09/31');



		/*Mise au format de date francais via une nouvelle entrée dans le tableau*/

		$tableau['Date de naissance: ']="31/09/1990";



		/*Affichage des données via une boucle foreach */

		foreach ($tableau as $key => $value) {
			echo "<li>$key $value</li>";
		  };  
				
		?>
  
		</body>

</html>