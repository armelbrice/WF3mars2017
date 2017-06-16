<?php
require_once('login.php');

$inscription = false;   // variable qui permet de savoir si l'élève ou le formateur est inscrit, pour ne pas réafficher le formulaire d'inscription
$contenu = '';
// Traitement du POST :
if (!empty($_POST)) {   // si le formulaire est posté
	
	// validation du formulaire :
	if (strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) {
		$contenu .= '<div class="bg-danger">Le pseudo doit contenir au moins 4 caractères</div>';
	}

	if (strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) {
		$contenu .= '<div class="bg-danger">Le mot de passe doit contenir au moins 4 caractères</div>';
	}

	if (strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
		$contenu .= '<div class="bg-danger">Le nom doit contenir au moins 2 caractères</div>';
	}

	if (strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
		$contenu .= '<div class="bg-danger">Le prénom doit contenir au moins 2 caractères</div>';
	}

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$contenu .= '<div class="bg-danger">Email est invalide</div>';
	}

  if ($_POST['type'] != 'eleve' && $_POST['civilite'] != 'formateur') {
		$contenu .= '<div class="bg-danger">Le type est incorrecte</div>';
	}

  // Si aucune erreur sur le formulaire, on vérifie l'unicité du pseudo avant inscription en BDD :
	if (empty($contenu)) {  // si $contenu est vide, cela veut dire qu'il n'y a pas d'erreur
		
		$membre = executeRequete("SELECT id_membre FROM inscription WHERE pseudo = :pseudo", array(':pseudo' => $_POST['pseudo'])); // on vérifie l'existence du pseudo
		
		if ($membre->rowCount() > 0) {  // si il y a des lignes dans le résultat de la requête
			$contenu .= '<div class="bg-danger">Le pseudo est indisponible : veuillez en choisir un autre</div>';
		} else {
		// Si le pseudo est unique, on peut faire l'inscription en BDD :
		
		$_POST['mdp'] = md5($_POST['mdp']);  // permet d'encrypter le mot de passe selon l'algorithme md5. Il faudra le faire aussi sur la page de connexion pour comparer 2 mots cryptés
		
		executeRequete("INSERT INTO inscription (pseudo, mdp, nom, prenom, email, type) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :type)", array(':pseudo' => $_POST['pseudo'], ':mdp' => $_POST['mdp'], ':nom' => $_POST['nom'], ':prenom' => $_POST['prenom'], ':email' => $_POST['email'], ':type' => $_POST['type']));
		
		$contenu .= '<div class="bg-success">Vous êtes inscrit. <a href="connection.php">Cliquez ici pour vous connecter</a></div>';
		$inscription = true;  // pour ne plus afficher le formulaire d'inscription
		
		}  
	} 
} 


?>




<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <style>
    .myform-container.myform {
      max-width: 600px;
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

    .myform {
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
  </style>
</head>
<body>

  <div class="myform myform-container">
    <form class="form-horizontal" method="POST">

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="inscription[pseudo]" placeholder="pseudo" autofocus>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="inscription[nom]" placeholder="Nom" autofocus>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="inscription[prenom]" placeholder="Prénom">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" name="inscription[email]" class="form-control" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="password" name="inscription[password]" class="form-control" placeholder="Mot de passe">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <div class="radio">
            <label>
              <input type="radio" name="inscription[type]" value="eleve"> Elève
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="inscription[type]" value="formateur"> Formateur
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <button type="submit" name="submit" class="btn btn-default">S'inscrire</button>
        </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>