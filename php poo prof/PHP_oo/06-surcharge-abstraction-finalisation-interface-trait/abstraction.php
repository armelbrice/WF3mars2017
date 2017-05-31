<?php

//06-surcharge-abstraction-finalisation-interface-trait
	// -> abstraction.php
	
abstract class Joueur // Cr�ation d'une classe abstraite
{
	public function seConnecter(){
		return $this -> etreMajeur();
	}

	abstract public function etreMajeur(); // Une m�thode abstraite n'a pas de contenu. 

}
//---------
class JoueurFr extends Joueur
{
	public function etreMajeur(){
		return 18; 
	}
}

//---------
class JoueurUs extends Joueur
{
	public function etreMajeur(){
		return 21; 
	}
}
//---------------
$fr = new JoueurFr;
echo $fr -> seConnecter() . '<br/>';

$us = new JoueurUs;
echo $us -> seConnecter() . '<br/>';

/*
Commentaires : 
	- Une classe abstraite ne peut pas �tre instanci�e. 
	- Les m�thodes abstraites n'ont pas de contenu
	- Pour d�clarer une m�thode abstraite on doit obligatoirement �tre dans une classe abstraite. 
	- Une classe abstraite peut contenir des m�thodes normales. 
	- Lorsqu'on h�rite d'une classe abstraite on doit OBLIGATOIREMENT red�finir les m�thodes abstraites. 

	Le d�veloppeur ma�tre, qui est coeur de l'application, va obliger les autres d�veloppeur � red�finir des m�thodes. Ceci est une bonne pratique dans le cadre d'un travail collaboratif et hierarchis�. 
*/




