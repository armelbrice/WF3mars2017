<?php
require_once('inc/init.inc.php');

//------------------------- TRAITEMENT --------------------------
// Si visiteur non connecté, on l'envoie vers connexion.php :
if (!internauteEstConnecte()) {
	header('location:connexion.php');  // nous l'invitions à se connecter
	exit();
}

// echo '<pre>'; print_r($_SESSION); echo '</pre>';
$contenu .= '<h2>Bonjour '. $_SESSION['membre']['pseudo'] .' ! </h2>';

// On affiche le statut du membre :
if ($_SESSION['membre']['statut'] == 1) {
	$contenu .= '<p>Vous êtes un administrateur</p>';
} else {
	$contenu .= '<p>Vous êtes un membre</p>';
}


$contenu .= '<div><h3>Voici vos informations de profil</h3>';
	$contenu .= '<p>Votre email : '. $_SESSION['membre']['email'] .'</p>';
	$contenu .= '<p>Votre adresse : '. $_SESSION['membre']['adresse'] .'</p>';
	$contenu .= '<p>Votre code postal : '. $_SESSION['membre']['code_postal'] .'</p>';
	$contenu .= '<p>Votre ville : '. $_SESSION['membre']['ville'] .'</p>';
$contenu .= '</div>';


//  Exercice :
/* 1- Affichez le suivi des commandes du membre (s'il y en a) dans une liste <ul><li> : id_commande, date et état de la commande. S'il n'y en a pas, vous affichez "aucune commande en cours".





   2-

*/

/*
	$suivi_commande = executeRequete("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = :id_membre", array('id_membre' =>$_SESSION['membre']['id_membre']));
	if ($suivi_commande->rowCount()) {
	while ($resultat = $suivi_commande->fetch(PDO::FETCH_ASSOC)) {
		$contenu .= '<ul>
						<li>Numero de commande: '. $resultat['id_commande'] .'</li>
						<li>Date de la commande: '. $resultat['date_enregistrement'] .'</li>
						<li>Etat de la commande: '. $resultat['etat'] .'</li>
		
					</ul>';
	}
} else {
	echo 'Aucune commande en cours';
}
*/

// correction
// Requête
$id_membre = $_SESSION['membre']['id_membre'];

$resultat = executeRequete("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = '$id_membre'"); //  Dans une requête sql on met les variables entre quote comme '$id_membre'. Pour mémoire si on y met un array, celui ci perd ses quotes autour de l'indice. A savoir : on ne peut pas le faire avec un array multidimensionnel.

//  Sil y a des commandes dans $resultat, on les affiche :
if ($resultat->rowCount() > 0) {
	// on affiche les commandes :
	$contenu .= '<ul>';
	while ($commande = $resultat->fetch(PDO::FETCH_ASSOC)) { // transforme objet $resultat en array associatif par fetch_assoc et la valeur est stockée dans $commande
	
		$contenu .= '<li>Votre commande n°'. $commande['id_commande'] .' du '. $commande['date_enregistrement'] .' est actuellement '. $commande['etat'] .'</li>';

	}
	$contenu .= '</ul>';



} else {
	//  il n y a pas de commande :
	$contenu .= 'Aucune commande en cours';
}









//------------------------- AFFICHAGE --------------------------
require_once('inc/haut.inc.php');
echo $contenu;
require_once('inc/bas.inc.php');