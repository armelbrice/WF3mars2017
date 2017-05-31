<?php

//10-autoload
	//-> autoload.php
	
function inclusion_automatique($nom_de_la_classe){
	require($nom_de_la_classe . '.class.php');
	
	//------------
	echo 'On passe dans l\'autoload<br/>';
	echo 'On fait un require(' . $nom_de_la_classe . '.class.php)<br/>';
}
	
	
//-------------------------
spl_autoload_register('inclusion_automatique');
//--------------------------
/*
Commentaires : 
	spl_autoload_register : 
		- C'est une fonction super pratique ! Elle va s'�x�cuter � chaque fois que l'interpr�teur voit le mot "new". 
		- Elle va ex�cuter une fonction, dont on lui fournit le nom en argument
		- Elle va apporter � notre fonction le mot vient apr�s 'new' c'est � dire le nom de la classe � instancier.
*/