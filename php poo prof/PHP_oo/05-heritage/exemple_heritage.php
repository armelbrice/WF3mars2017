<?php

//05-heritage
	//-> exemple_heritage.php
	
class Membre
{
	public $id_membre;
	public $pseudo;
	public $email; 
	
	public function inscription(){
		return 'Je m\'inscris !';
	}

	public function connexion(){
		return 'Je me connecte !'; 
	}
}
//---------------
class Admin extends Membre // extends signifie "h�rite de "
{
	// tout le code de Membre est ici !!! 
	
	public function accesBackOffice(){
		return 'J\'ai acc�s au backOffice';
	}
}
//-----------------
$admin = new Admin; 
echo $admin -> inscription() . '<br/>';  
echo $admin -> connexion() . '<br/>';  
echo $admin -> accesBackOffice() . '<br/>';  

/* 
Commentaires : 
	Dans notre site, un Admin est avant tout un membre, avec quelques fonctionnalit�s suppl�mentaires (acces backOffice, suppression de membre etc..)
	Il est donc naturel que la classe Admin soit h�riti�re (extends) de la classe Membre et qu'on ne r�-�crive pas tout le code. 
*/


