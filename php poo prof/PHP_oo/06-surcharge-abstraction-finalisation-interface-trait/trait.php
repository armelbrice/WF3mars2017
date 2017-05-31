<?php

//06-surcharge-abstraction-finalisation-interface-trait
	// -> trait.php

// Attention : Les traits ne fonctionnent que depuis PHP 5.4
	
trait TPanier
{
	public $nbProduit = 1; 
	
	public function affichageProduit(){
		return 'Affichage des produits dans le panier';
	}
}
//------------
trait TMembre
{
	public function affichageMembres(){
		return 'Affichage des membres'; 
	}

}
//----------
class Site
{
	use TPanier, TMembre;
	//use permets d'importer le code contenu dans un ou plusieurs traits. 
}
//---------

$site = new Site; 
echo $site -> affichageProduits() . '<br/>';
echo $site -> affichageMembres() . '<br/>';

/*
Commentaires : 
	- Les traits permettent d'importer du code dans une classe
	- Ils ont �t� invent�s pour repousser l'h�ritage non multiple
	- Une classe peut importer plusieurs traits
	- Un trait peut importer un trait
*/



