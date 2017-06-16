<?php

// accès à la base de données
require_once 'connect.php';


$order = '';
$errors=array();

// Vérifie si "order" et "column" sont bien définis en URL
if(isset($_GET['order']) && isset($_GET['column'])){

	// Définit par quel paramètre les données seront triées
	if($_GET['column'] == 'lastname'){
		$order = ' ORDER BY lastname';
	}
	elseif($_GET['column'] == 'firstname'){
		$order = ' ORDER BY firstname';
	}
	elseif($_GET['column'] == 'birthdate'){
		$order = ' ORDER BY birthdate';
	}
	
	// Définit si les données seront classées par ordre croissant (ASC) ou décroissant (DESC)
	if($_GET['order'] == 'asc'){
		$order.= ' ASC';
	}
	elseif($_GET['order'] == 'desc'){
		$order.= ' DESC';
	}
}

// Vérifie si le formulaire a bien été rempli
if(!empty($_POST)){
	foreach($_POST as $key => $value){
		// supprime d'éventuelles balises dans les valeurs envoyées, ainsi que les espaces placés avant et après
		$_POST[$key] = strip_tags(trim($value));
	}
	// Vérifie le nombre de caractère de chaque champ (définit un message d'erreur si pas assez de caractères)
	if(strlen($_POST['firstname']) < 3){
		$errors[] = 'Le prénom doit comporter au moins 3 caractères';
	}
	if(strlen($_POST['lastname']) < 3){
		$errors[] = 'Le nom doit comporter au moins 3 caractères';
	}
	// Vérifie si l'adresse email est valide, sinon définit un message d'erreur
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = 'L\'adresse email est invalide';
	}
	// Vérifie si les champs ont une valeur (définit un message d'erreur si champ vide)
	if(empty($_POST['birthdate'])){
		$errors[] = 'La date de naissance doit être complétée';
	}
	if(empty($_POST['city'])){
		$errors[] = 'La ville ne peut être vide';
	}


	// Vérifie s'il n'y a aucune erreur dans le remplissage du formulaire
	if(count($errors) == 0){ 
		// Si pas d'erreur, on ajoute un nouvel utilisateur dans la base de données
		$insertUser = $db->prepare('INSERT INTO users (gender, firstname, lastname, email, birthdate, city) VALUES(:gender, :firstname, :lastname, :email, :birthdate, :city)');
		
		$insertUser->bindValue(':gender', $_POST['gender'], PDO::PARAM_STR);
		$insertUser->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
		$insertUser->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
		$insertUser->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
		$insertUser->bindValue(':birthdate', date('Y-m-d', strtotime($_POST['birthdate'])), PDO::PARAM_STR);
		$insertUser->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
		
		// exécution de la requête
		if($insertUser->execute()){
			$createUser = true;
		}
		// Si échec d'exécution, on définit un message d'erreur
		else {
			$errors[] = 'Erreur SQL';
		}

	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Exercice 1</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>

		<div class="container">

			<h1>Liste des utilisateurs</h1>

			<p>Trier par :
				<!-- Définit la manière dont sont triés les utilisateurs --> 
				<a href="index.php?column=firstname&order=asc">Prénom (croissant)</a> |
				<a href="index.php?column=firstname&order=desc">Prénom (décroissant)</a> |
				<a href="index.php?column=lastname&order=asc">Nom (croissant)</a> |
				<a href="index.php?column=lastname&order=desc">Nom (décroissant)</a> |
				<a href="index.php?column=birthdate&order=asc">Âge (croissant)</a> |
				<a href="index.php?column=birthdate&order=desc">Âge (décroissant)</a>
			</p>
			<br/>

			<div class="row">
				<?php
					// Indique que l'utilisateur a bien été ajouté à la base de données (requête bien exécutée)
					if(isset($createUser) && $createUser == true){
						echo '<div class="col-md-6 col-md-offset-3">';
						echo '<div class="alert alert-success">Le nouvel utilisateur a été ajouté avec succès.</div>';
						echo '</div><br/>';
					}
					// Affiche un message d'erreur
					elseif(!empty($errors)){
						echo '<div class="col-md-6 col-md-offset-3">';
						echo '<div class="alert alert-danger">'.implode('<br/>', $errors).'</div>';
						echo '</div><br/>';
					}
				?>

				<div class="col-md-7">
					<table class="table">
						<thead>
							<tr>
								<th>Civilité</th>
								<th>Prénom</th>
								<th>Nom</th>
								<th>Email</th>
								<th>Age</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								// affiche les utilisateurs triés de la façon définie en URL
								$queryUsers = $db->prepare("SELECT * FROM users $order");
		
								if($queryUsers->execute()){
									$users = $queryUsers->fetchAll(PDO::FETCH_ASSOC);
								}
								
								foreach($users as $user) : ?>
								<tr>
									<td><?php echo $user['gender'];?></td>
									<td><?php echo $user['firstname'];?></td>
									<td><?php echo $user['lastname'];?></td>
									<td><?php echo $user['email'];?></td>
									<td><?php echo DateTime::createFromFormat('Y-m-d', $user['birthdate'])->diff(new DateTime('now'))->y;?> ans</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="col-md-5">

					<form method="post" class="form-horizontal well well-sm">
						<fieldset>
							<legend>Ajouter un utilisateur</legend>

							<div class="form-group">
								<label class="col-md-4 control-label" for="gender">Civilité</label>
								<div class="col-md-8">
									<select id="gender" name="gender" class="form-control input-md" required>
										<option value="Mlle">Mademoiselle</option>
										<option value="Mme">Madame</option>
										<option value="M">Monsieur</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="firstname">Prénom</label>
								<div class="col-md-8">
									<input id="firstname" name="firstname" type="text" class="form-control input-md" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="lastname">Nom</label>  
								<div class="col-md-8">
									<input id="lastname" name="lastname" type="text" class="form-control input-md" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="email">Email</label>  
								<div class="col-md-8">
									<input id="email" name="email" type="email" class="form-control input-md" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="city">Ville</label>  
								<div class="col-md-8">
									<input id="city" name="city" type="text" class="form-control input-md" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="birthdate">Date de naissance</label>  
								<div class="col-md-8">
									<input id="birthdate" name="birthdate" type="text" placeholder="JJ-MM-AAAA" class="form-control input-md" required>
									<span class="help-block">au format JJ-MM-AAAA</span>  
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-4 col-md-offset-4">
									<button type="submit" class="btn btn-primary">Envoyer</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>

		</div>

	</body>

</html>