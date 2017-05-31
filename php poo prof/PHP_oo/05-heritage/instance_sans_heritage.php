<?php

//05-heritage
	//-> instance_sans_heritage.php

class C{}
	
class A
{
	public function bonjour(){
		return 'Bonjour !';
	}
}
//---------
class B extends C // B n'h�rite pas de A !!!
{ 
	public $maVariable;
	
	public function __construct(){
		$this -> maVariable = new A; 
		// Au moment de l'instanciation de B, on met dans $maVariable un objet de la classe A. 
	}
}
//-------------
$b = new B; 
echo $b -> maVariable -> bonjour(); 

// revient � faire : 
// $maVariable = new A; 
// $maVariable -> bonjour(); 
// $b -> maVariable -> bonjour(); 

/*
Commentaires : 
	nous avons un objet dans un objet, d'o� l'utilisation deux fl�ches successivement. $x -> y -> methode();
	
	L'int�r�t d'avoir une instance sans h�ritage (r�cup�rer un objet dans la propri�t� d'une classe) est de pouvoir h�riter d'une classe m�re d'un cot�, tout en ayant la possibilit� de r�cup�rer les �l�ments d'une autre classe en m�me temps.
*/