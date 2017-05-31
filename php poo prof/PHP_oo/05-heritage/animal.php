﻿<?php

//05-heritage
	//-> animal.php

class Animal
{
	protected function deplacement(){
		return 'Je me déplace';
	}

	public function manger(){
		return 'Je mange';
	}
}
//---------------
class Elephant extends Animal
{
	// tout le code de Animal est ici !! 
	
	public function quiSuisJe(){
		return 'Je suis un élephant et ' . $this -> deplacement();
		//Je peux appeler la méthode deplacement() avec $this car en tant que méthode protected elle est accessible dans la classe où elle est déclarée et dans les classes héritières. 
	}
}
//---------------
class Chat extends Animal
{
	public function quiSuisJe(){
		return 'Je suis un chat';
	}

	public function manger(){ // redéfinition de méthode seulement pour la classe Chat. 
		return 'Je mange peu !';
	}
}
//----------------------
$eleph = new Elephant; 
echo $eleph -> manger() . '<br/>';
echo $eleph -> quiSuisje() . '<br/>';

$chat = new Chat;
echo $chat -> manger() . '<br/>';
echo $chat -> quiSuisJe() . '<br/>';

/*
Commentaires : 
	L'héritage est l'un des fondements de la programmation orientée objet. 
	Lorsqu'une classe classe hérite d'une autre classe, c'est comme si tout le code était importé. Les éléments (non private) sont donc accessibles avec $this. 
	
	Redéfinition : Une classe enfant (héritère) peut modifier le comportement global d'une méthode héritée.
	Surcharge : Une classe enfant (héritière) peut modifier en partie le comportement d'un méthode héritée (voir chapitre 6, fichier surcharge.php)
	
	L'interprêteur va d'abord regarder si une méthode existe dans la classe qui l'éxécute, et s'il ne la trouve pas, il va ensuite regarder dans la classe mère. 
*/
