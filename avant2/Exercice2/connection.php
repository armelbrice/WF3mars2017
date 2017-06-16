<?php
require_once('inc/init.inc.php');


// ----------------------- TRAITEMENT ---------------------------
// Déconnexion demandée par l'élève :
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	// si l'élève demande la déconnexion, on détruit la session :
	session_destroy();
}


// Eleve déjà connecté :
if (EleveEstConnecte()) { // si l'élève est déjà connecté, il n'a rien à faire ici, on le redirige donc vers sa page
	header('Location: http://www.wf3.apolearn.com/pageprotegee.php');  
}

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
			
			
			$_SESSION['membre'] = $membre;  // nous remplissons la session avec les éléments provennant de la bdd. Cette session permet de conserver les infos du membre dans l'ensemble du site
			
			header('location:profil.php');  // le membre étant connecté, on l'envoie vers son profil
			exit();  
		} else {
			// si les identifiants ne correspondent pas, on affiche un message d'erreur :
			$contenu .= '<div class="bg-danger">Erreur sur les identifiants</div>';
		}
	} // fin du if (empty($contenu))
} // fin du if (!empty($_POST))


// ----------------------- AFFICHAGE ---------------------------
require_once('inc/haut.inc.php');
echo $contenu;
?>
<h3>Veuillez renseigner vos identifiants pour vous connecter</h3>
<form method="post" action="">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" id="pseudo" name="pseudo" value=""><br><br>
	
	<label for="mdp">Mot de passe</label><br>
	<input type="password" id="mdp" name="mdp" value=""><br><br>

	<input type="submit" value="se connecter" class="btn">
</form>

<?php
require_once('inc/bas.inc.php');