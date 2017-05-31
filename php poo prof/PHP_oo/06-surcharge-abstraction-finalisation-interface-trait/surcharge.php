<?php

//06-surcharge-abstraction-finalisation-interface-trait
	// -> surcharge.php
	
//Surcharge ou Override : permet de modifier le comportement d'une m�thode h�rit�e et d'y apporter des traitements suppl�mentaires
// surcharge != red�finition

class A
{
	public function calcul(){
		return 10; 
	}
	
}

class B extends A // B h�rite de A
{
	public function calcul(){
		
		//return $this -> calcul() + 5; // Ne fonctionne pas car s'appelle soi-m�me : recursivit�
		
		//return A::calcul() +5; // Ne fonctionne pas car calcul() n'est pas static
			
		return parent::calcul() + 5; // OK ! Permet d'appeler le comportement de la m�thode calcul() telle que d�finie dans la classe parente. 
	}
}






