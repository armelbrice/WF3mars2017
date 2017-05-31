<?php

//06-surcharge-abstraction-finalisation-interface-trait
	// -> interface.php
	
interface Mouvement
{
	public function start(); // Dans une interface les m�thodes n'ont pas de contenu
	public function turnRight();
	public function turnLeft();
}

class Bateau implements Mouvement // On n'utilise pas extends, mais implements dans le cadre des interface. 
{
	public function start(){ // OBLIGATION de d�finir toutes les m�thodes r�cup�r�es via l'impl�mentation de l'interface. 
	}
	
	public function turnRight(){
	}
	
	public function turnLeft(){
	}
}

class Avion implements Mouvement
{
	public function start(){
	}
	
	public function turnRight(){
	}
	
	public function turnLeft(){
	}
}

/*
Commentaires : 
	- Une interface est une liste de m�thodes (sans contenu) qui permet de garantir que toutes les classes qui vont impl�menter l'interface contiendront les m�mes m�thodes, et ces m�thodes auront le m�me nom. C'est une sorte de contrat pass� entre le dev' ma�tre et les autres dev'. Plan de fabrication d'une classe. 

	- Une interface n'est pas instanciable. 
	- Une classe peut impl�menter plusieurs interfaces
	- Une classe peut � la fois extends une autre classe et impl�ments une ou plusieurs interface(s). 
	- Les m�thodes d'une interface doivent forc�ment �tre public sinon elles ne peuvent pas �tre d�finies.
*/



