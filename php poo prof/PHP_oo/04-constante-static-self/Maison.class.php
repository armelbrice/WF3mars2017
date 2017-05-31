<?php

//04-constante-static-self
	//Maison.class.php

class Maison
{
	public $couleur = 'blanc'; 
	public static $espaceTerrain = '500m2';
	private $nbPorte = 10;
	private static $nbPiece = 7;
	const HAUTEUR = '10m';
	
	public function getNbPorte(){
		return $this -> nbPorte;	
	}
	
	public static function getNbPiece(){
		return self::$nbPiece;
	}



}
//------------------
echo 'Terrain : ' . Maison::$espaceTerrain . '<br/>'; // OK je fais appel � un �l�ment appartenant � la classe depuis la classe. 
echo 'Pieces : ' . Maison::$nbPiece . '<br/>'; // ERREUR : Je fais appel � une propri�t� static via ma classe, mais elle est private donc innacessible � l'ext�rieur de la classe. 
echo 'Pieces : ' . Maison::getNbPiece() . '<br/>'; //OK je fais appel � un �l�ment private via son getter static, donc par la classe. 
echo 'Hauteur  :' . Maison::HAUTEUR . '<br/>'; // OK je fais appel � une propri�t� constante appartenant � la classe. 

$maison = new Maison; 
echo 'Couleur : ' . $maison -> couleur . '<br/>'; // OK ! Je fais appel � un �l�ment de l'objet par l'objet. 
//echo 'Terrain : ' . $maison -> espaceTerrain . '<br/>'; // ERREUR ! Je tente d'appeler un �l�ment appartenant � la classe par l'objet. 
//echo 'Porte : ' . $maison -> nbPorte . '<br/>'; //Erreur : Je tente d'appeler une propri�t� private � l'ext�rieur de la classe. 
echo 'Portes : ' . $maison -> getNbPorte() . '<br/>'; // OK ! Je fais appel � une propri�t� private via son getter qui lui est public et donc accessible � l'ext�rieur de la classe. 
//echo 'Pieces : ' . $maison -> nbPiece; // ERREUR : private donc innacessible � l'ext�rieur... et en plus static donc innaccessible via l'objet. 

/*
commentaires : 
	Op�rateurs : 
		- $objet ->    	: �l�ment d'un objet � l'ext�rieur de la classe
		- $this ->		: �l�ment d'un objet � l'int�rieur de la classe
		- Class::		: �l�ment d'une classe � l'ext�rieur de la classe
		- self::		: �l�m�nt d'une classe � l'int�rieur de la classe
		
	2 questions � se poser : 
		- est-ce que c'est static ? 
			- Si oui : 
				Suis-je � l'int�rieur de la classe ?
					si oui : self::
					si non : Class::
					
			- si non : 
				Suis-je � l'int�rieur de la classe ?
					si oui : $this ->
					si non : $objet -> 
	
	
	static, signifie qu'un �l�ment appartient � la classe. Pour y acc�der il faut l'appeler par la classe (Class:: ou self::)
	
	const signifie qu'un �l�ment appartient � la classe et ne sera jamais modifiable. 
	
*/










