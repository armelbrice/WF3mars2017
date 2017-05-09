<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/

$jourDeLocation = "";
switch (true) {
    case 'A' == $categorie && 30 == $prix:
    // ...
    case 'B' == $categorie && 50 == $prix:
    // ...
    case 'C' == $categorie && 70 == $prix:
    // ...
    case 'D' == $categorie && 90 == $prix:
    // ...
}

function prixLoc($prix, $jourDeLocation) {
    $prixTotal = $prix * $jourDeLocation;
    return $prixTotal;
} 

echo prixLoc(30, 8);


if (prixLoc() > 150) {
    
    
    $pourcentage = 10;

    $resultat = ($prixTotal * $pourcentage)/100;
    echo $resultat;
}







?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Location voiture</title>

    
</head>

<body>
    <form action="" method="post">
        <label for="categorie">Categorie :</label>
        	<select name="categorie" id="categorie">
				<option value="a">A</option>
				<option value="b">B</option>
				<option value="c">C</option>
				<option value="d">D</option>


			</select>
            

            <select name="jour">
			<?php

            
         for ($jour = 1 ; $jour <= 31 ; $jour++) {

            ?>
                  <option value="<?php echo $jour ?>"><?php echo $jour; ?></option>
            <?php              
            }

			

			
			

			echo '</select>';


			?>	


        
    	
    
    
    
    
    
    
    
    </form>
    






</body>

</html>




