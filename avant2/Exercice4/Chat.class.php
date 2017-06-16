<?php

class Chat{
	private $prenom;
	private $age;
	private $couleur;
	private $sexe;
	private $race;

	function __construct(){}

	// Setters
	public function setPrenom($prenom){
		if(strlen($prenom)>3 && strlen($prenom)<20){
			$this -> prenom = $prenom;
		}
	}
	public function setAge($age){
		if(is_int($age)){
			$this -> age = $age;
		}
	}
	public function setCouleur($couleur){
		if(strlen($couleur)>3 && strlen($couleur)<10){
			$this -> couleur = $couleur;
		}
	}
	public function setSexe($sexe){
		if($sexe=="male" || $sexe=="femelle"){
			$this -> sexe = $sexe;
		}
	}
	public function setRace($race){
		if(strlen($race)>3 && strlen($race)<20){
			$this -> race = $race;
		}
	}



	// Getters
	public function getPrenom(){
		return $this -> prenom;
	}
	public function getAge(){
		return $this -> age;
	}
	public function getCouleur(){
		return $this -> couleur;
	}
	public function getSexe(){
		return $this -> sexe;
	}
	public function getRace(){
		return $this -> race;
	}

	// récupère les infos de chaque objet de la classe Chat et les retourne dans un tableau
	public function getInfos(){
		return array(
			'prenom' => $this -> getPrenom(),
			'age' => $this -> getAge(),
			'couleur' => $this -> getCouleur(),
			'sexe' => $this -> getSexe(),
			'race' => $this -> getRace()
		);
	}
}