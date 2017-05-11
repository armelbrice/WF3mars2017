<?php

/*
Exercice 2 : « On part en voyage  » 
 
Créer une fonction permettant de convertir un montant en euros vers un montant en dollars américains. 
 
Cette fonction prendra deux paramètres :  
● Le montant de type int ou float 
● La devise de sortie (uniquement EUR ou USD).  
 
Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :  1 euro = 1.085965 dollars américains 
 
Il faut effectuer les vérifications nécessaires afin de valider les paramètres.

*/
$conversion = array('EUR', 'USD');



function conversionDevise($montant, $devise) {
	switch($devise) {
		case 'EUR' : $resultat = $montant * 1.085965; 
		case 'USD' : $resultat = $montant / 1.085965; 
		
		default : return 'devise invalide';
	}
return '' . $montant . ' est egal à ' . $resultat . '  ' . $devise . ' ';
}

echo conversionDevise(3,'EUR');
