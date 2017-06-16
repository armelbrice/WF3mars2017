<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Login/Connexion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
		

		.card-container.card {
			max-width: 350px;
			padding: 40px 40px;
		}

		.btn {
			font-weight: 700;
			height: 36px;
			-moz-user-select: none;
			-webkit-user-select: none;
			user-select: none;
			cursor: default;
		}

		.card {
			background-color: #F7F7F7;
			padding: 20px 25px 30px;
			margin: 0 auto 25px;
			margin-top: 50px;
			-moz-border-radius: 2px;
			-webkit-border-radius: 2px;
			border-radius: 2px;
			-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		}

		.form-signin #inputEmail,
		.form-signin #inputPassword {
			direction: ltr;
			height: 44px;
			font-size: 16px;
		}

		.form-signin input[type=email],
		.form-signin input[type=password],
		.form-signin input[type=text],
		.form-signin button {
			width: 100%;
			display: block;
			margin-bottom: 10px;
			z-index: 1;
			position: relative;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		.form-signin .form-control:focus {
			border-color: rgb(104, 145, 162);
			outline: 0;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
		}

		.btn.btn-signin {
			background-color: rgb(104, 145, 162);
			padding: 0px;
			font-weight: 700;
			font-size: 14px;
			height: 36px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			border: none;
			-o-transition: all 0.218s;
			-moz-transition: all 0.218s;
			-webkit-transition: all 0.218s;
			transition: all 0.218s;
		}

		.btn.btn-signin:hover,
		.btn.btn-signin:active,
		.btn.btn-signin:focus {
			background-color: rgb(12, 97, 33);
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="card card-container">
			<p id="profile-name" class="profile-name-card"></p>
			<form class="form-signin" method="POST">
				<input type="email" name="email" class="form-control" placeholder="Email" autofocus>
				<input type="password" name="password" class="form-control" placeholder="Mot de passe">
				<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit">Se connecter</button>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once('');

// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=authentification', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// Session
session_start();

// Déconnexion demandée par l'élève :
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	// si l'élève demande la déconnexion, on détruit la session :
	session_destroy();
}


// Eleve déjà connecté :
if (EleveEstConnecte()) { // si l'élève est déjà connecté, il n'a rien à faire ici, on le redirige donc vers sa page
	header('Location: http://www.wf3.apolearn.com/pageprotegee.php');  
}
// Formateur déjà connecté :
if (FormateurEstConnecte()) { // si le formateur est déjà connecté, il n'a rien à faire ici, on le redirige donc vers sa page
	header('Location: http://www.wf3.fr/lecole/lequipe-pedagogique.com/pageprotegee.php');  
}

// Traitement du formulaire de connexion, et remplissage de la session :
if (!empty($_POST)) {
	// contrôle de formulaire :
	if (empty($_POST['pseudo'])) {
		$contenu .= '<div class="bg-danger">Le pseudo est requis</div>';
	}
	if (empty($_POST['mdp'])) {
		$contenu .= '<div class="bg-danger">Le mot de passe est requis</div>';
	}
	
	// Si le formulaire est correct, on contrôle les identifiants :
	if (empty($contenu)) {
		$mdp = md5($_POST['mdp']); // on crypte le mdp pour le comparer avec celui de la base
		
		$resultat = executeRequete("SELECT * FROM inscription WHERE pseudo = :pseudo AND mdp = :mdp", array(':pseudo' => $_POST['pseudo'], ':mdp' => $mdp));
		
		if ($resultat->rowCount() != 0) {  // si il y a un enregistrement dans le $resultat, c'est que pseudo et mdp correspondent
			$membre = $resultat->fetch(PDO::FETCH_ASSOC);  
			
			
			$_SESSION['inscription'] = $membre;  // nous remplissons la session avec les éléments provennant de la bdd. 
			
			// le membre étant connecté, on l'envoie vers sa page
			if ($_POST['type'] != 'eleve'){
				header('Location: http://www.wf3.apolearn.com/pageprotegee.php'); 
			} elseif ($_POST['type'] != 'formateur'){
				header('Location: http://www.wf3.fr/lecole/lequipe-pedagogique.com/pageprotegee.php'); 
			}
			exit(); 
			 
			} else {
			// si les identifiants ne correspondent pas, on affiche un message d'erreur :
			$contenu .= '<div class="bg-danger">Erreur sur les identifiants</div>';
		}
	} 
} 