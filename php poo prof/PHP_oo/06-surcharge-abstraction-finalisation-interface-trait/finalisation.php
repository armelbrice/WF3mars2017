<?php

//06-surcharge-abstraction-finalisation-interface-trait
	// -> finalisation.php
	
final class Application // cr�ation d'une classe finale : signifiant qu'elle ne pourra pas �tre h�rit�e
{
	public function run(){
		return 'L\'application se lance ! ';
	}
}
//-------
//class Extension extends Application{} // IMPOSSIBLE ! Une classe finale ne peut pas �tre h�rit�.
//------- 
$app = new Application; // OK ! Une classe finale peut �tre instanci�e
$app -> run(); 



class Application2
{
	final public function run2(){
		return 'L\'application se lance ! ';
	}
}

class Extension2 extends Application2 // OK, Application2 n'est pas final donc on peut en h�riter
{
	public function run2(){} // ERREUR ! IMPOSSIBLE de red�finir ni de surcharger une m�thode final. 
}

/*
Commentaires : 
	- Une classe finale ne peut pas �tre h�rit�e
	- Une classe finale peut �tre instanci�e
	- Une classe finale n'a forc�ment que des m�thodes finales puisque par d�finition elle ne pourra �tre h�rit�e, donc ses m�thodes ne pourront �tre surcharg�es ou red�finies. 

	- Une m�thode final peut �tre pr�sente dans une classe "normale"
	- Une m�thode final ne peut pas �tre surcharg�e ou red�finie
*/





