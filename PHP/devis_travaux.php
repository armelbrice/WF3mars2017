<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/
$message = "";
$periode = "";
$afficheResultat ="";

function montantTTc($montantht, $periode) {
	if ($periode == 'plusde5ans') {
		$montant = $montantht * (1 + 10 / 100);
		$taux = 10;
	} else ($periode == '5ansoumoins'){
		$montant = $montantht * (1 + 20 / 100);
		$taux = 20;
	}
	return "Le montant de vos travaux est de $montant avec une TVA à $taux incluse."
}




if(!empty($_POST)){

	if (! in_array($_POST['dateconstruction'], $periode)) $message .= '<div>Erreur sur la periode</div>';

	$montant = (int)$_POST['montantht'];  

	if ($montant <= 0) $message .= '<div>Erreur sur le montant</div>'; 

if (empty($message)) {
	$afficheResultat = montantTTc($_POST['montantht'], $_POST['dateconstruction']);	

}


}





?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devis de travaux</title>

    
</head>

<body>
	<h1>Devis de Travaux</h1>
    <form action="" method="post">
        <label for="Montant HT">Montant HT</label><br>
		<input type="text" id="montantht" name="montantht"><br><br>


		<label for="dateconstruction">Date de construction</label><br>
		<input type="radio" name="dateconstruction" id="plusde5ans" value="-5" checked><label for="plusde5ans">Plus de 5ans</label>
		<input type="radio" name="dateconstruction" id="5ansoumoins" value="+5"><label for="5ansoumoins">5 ans ou moins</label>
		<br><br>

		<input type="submit" value="calculer">


			


    </form>
    


</body>

</html>