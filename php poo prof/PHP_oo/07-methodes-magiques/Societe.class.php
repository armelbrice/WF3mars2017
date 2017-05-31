﻿<?php

//07-methodes-magiques
	// -> Societe.class.php

class Societe
{
	public $adresse;
	public $ville;
	public $cp;
	
	public function __construct(){} 
	
	public function __set($nom, $valeur){ // s'éxécute au moment où on essaie d'affecter une valeur à une propriété qui n'existe pas. 
		echo '<p style="color: white; background: red; padding: 5px">Désolé, mais la propriété ' . $nom . ' n\'existe pas dans cette classe ! Donc la valeur <strong>' . $valeur . '</strong> n\'a pas pu être affectée !</p>';
	}
	
	public function __get($nom){
		echo '<p style="color: white; background: red; padding: 5px">Désolé, mais la propriété ' . $nom . ' n\'existe pas dans cette classe !';
	}
	
	/*
	__call() = quand j'appelle une méthode qui n'existe pas.
	__callstatic = quand j'appelle une méthode static qui n'existe pas
	__isset() = quand on fait une condition isset ou empty sur une propriété de mon objet
	__destruct() = s'éxécute quand le script est terminé (pratique pour ferme une connexion à la BDD)
	__toString() : se lance quand on essaie de faire un echo sur un objet
	
	__wakeup(), __sleep(), __invoke(), __clone()...
	*/
	
	
	
	
	
}

//-----------------------
$societe = new Societe; 
//$societe -> pays = 'France';

echo $societe -> titre;

