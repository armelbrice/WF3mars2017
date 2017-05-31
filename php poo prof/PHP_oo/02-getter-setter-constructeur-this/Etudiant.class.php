<?php

//02-getter-setter-constructeur-this	
	//-> Etudiant.class.php
	
class Etudiant
{
	private $prenom; 

	public function __construct($prenom){ // M�thode magique qui s'ex�cute au moment de l'instanciation. 
		$this -> setPrenom($prenom); 
	}

	public function setPrenom($prenom){
		$this -> prenom = $prenom;
	}
	
	public function getPrenom(){
		return $this -> prenom; 
	}
}
//------------------------
$etudiant = new Etudiant('Yakine');
echo 'Pr�nom : ' . $etudiant -> getPrenom(); 
//EXERCICE : Essayez d'affecter une valeur � prenom en modifiant UNIQUEMENT l'int�rieur de la classe. 