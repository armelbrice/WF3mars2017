<?php

//05-heritage
	//-> heritage_sens.php
	
//Transitivit� : Si une classe B h�rite d'une classe A et qu'une classe C h�rite de la classe B, alors C h�rite de A. 
	
class A
{
	public function testA(){
		return 'testA';
	}
}
//-----
class B extends A
{
	public function testB(){
		return 'testB';
	}
}
//-----
class C extends B
{
	public function testC(){
		return 'testC';
	}
}
//-----
$c = new C; 
echo $c -> testA() . '<br/>'; // m�thode de A accessible par C (h�ritage indirect)
echo $c -> testB() . '<br/>'; // M�thode de B accessible par C (h�ritage direct)
echo $c -> testC() . '<br/>'; // m�thode de C accessible par C

var_dump(get_class_methods($c)); // Affiche les 3 m�thodes, car elles appartiennent toutes � C


/*
Commentaires : 
	Transitivit� : 
		Si B h�rite de A
			Et que C h�rite de B...
				... alors C h�rite de A
		Les m�thodes protected de A sont �galement disponibles dans C, m�me si l'h�ritage est indirect. 

	L'h�ritage est : 
		- non reflexif : class D extends D : Une classe ne peut pas h�riter d'elle-m�me. 
		- non sym�trique : Si class F extends E, alors E n'est pas extends de F automatiquement. 
		- Sans cycle : Si class F extends E, alors il est impossible que E extends F. 
		- non multiple : Class N extends M, P : IMPOSSIBLE en PHP. Pas d'h�ritage multiple en PHP !!!! 
		
		Un classe parent (m�re) peut avoir un nombre infini d'h�ritiers. 
*/
