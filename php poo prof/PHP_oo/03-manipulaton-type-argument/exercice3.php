﻿<?php
//03-manipulaton-type-argument
	//exercice3.php
	
class Vehicule
{
	private $litreEssence; //Nbre de litres d'essence dans le véhicule
	private $reservoir; //Capacité max du réservoir 

	public function getLitreEssence(){
		return $this -> litreEssence; 
	}
	
	public function setLitreEssence($litre){
		$this -> litreEssence = $litre;
	}
	
	public function getReservoir(){
		return $this -> reservoir; 
	}
	
	public function setReservoir($res){
		$this -> reservoir = $res; 
	}
}
//-----------
class Pompe
{
	private $litreEssence; 
	
	public function getLitreEssence(){
		return $this -> litreEssence; 
	}
	
	public function setLitreEssence($litre){
		$this -> litreEssence = $litre;
	}
	
	public function donneEssence(Vehicule $v){
		$litre_a_mettre = $v -> getReservoir() - $v -> getLitreEssence();
		// 45 = 50 - 5 
		// affecter la nouvelle valeur de litreEssence à notre objet Véhicule (50)
		$v -> setLitreEssence($v -> getLitreEssence() + $litre_a_mettre);
		// Affecte 50 au véhicule;
		// Affecter la nouvelle valeur de litreEssence à notre objet Pompe (755)
		$this -> setLitreEssence($this -> getLitreEssence() - $litre_a_mettre); 
	}
}
//-----------------------
$vehicule = new Vehicule;
$vehicule -> setLitreEssence(5);
$vehicule -> setReservoir(50); 

$pompe = new Pompe;
$pompe -> setLitreEssence(800);

echo 'Dans le Véhicule il y a : ' . $vehicule -> getLitreEssence() . ' litres<br/>'; 
echo 'Dans la pompe il y a : ' . $pompe -> getLitreEssence() . ' litres<hr/>'; 

$pompe -> donneEssence($vehicule); 

echo 'Après ravitaillement : <br/>';
echo 'Dans le Véhicule il y a : ' . $vehicule -> getLitreEssence() . ' litres<br/>'; 
echo 'Dans la pompe il y a : ' . $pompe -> getLitreEssence() . ' litres<hr/>';


