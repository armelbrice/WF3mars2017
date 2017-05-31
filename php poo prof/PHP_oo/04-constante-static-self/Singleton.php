<?php

//04-constante-static-self
	//Singleton.php
	
//Design Pattern : Litt�ralement "Patron de conception", est une r�ponse donn� � un probl�me que rencontre plusieurs (tous) d�veloppeurs. 

// Le singleton est la r�ponse � la question : Comment cr�er une classe qui ne sera instanciable qu'une seule et unique fois.

class Singleton 
{
	private static $instance = NULL;  
	
	private function __construct(){} // Fonction private donc notre classe n'est plus instanciable. 
	private function __clone(){} // Fonction private donc la classe n'est pas clonable. 
	
	
	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new Singleton; // je mets dans la propri�t� $instance un objet de la classe self/Singleton
			//self::$instance = new self; 
		}
		return self::$instance; 	
	}
}

//$singleton = new Singleton; // IMPOSSIBLE d'instancier notre classe.
$objet = Singleton::getInstance(); //$objet est le seul et unique objet de cette classe Singleton !!!  
$objet2 = Singleton::getInstance();

echo '<pre>';
var_dump($objet);
var_dump($objet2);
echo '</pre>';

// Le singleton est notamment utilis� pour la connexion � la base de donn�es ! Cela est plus s�r ! 




