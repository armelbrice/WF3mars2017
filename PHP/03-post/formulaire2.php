<?php
// Exercice : cr�er le formulaire indiqu� au tableau, r�cup�rer les donn�es saisies et les afficher dans la m�me page.  

if (!empty($_POST)) {
	echo 'Ville : ' . $_POST['ville'] . '<br>';
	echo 'Code postal : ' . $_POST['cp'] . '<br>';  // attention : les name sont sensibles � la casse
	echo 'Adresse : ' . $_POST['adresse'] . '<br>';
}




?>

<h1>Formulaire2</h1>
<form method="post" action="">
	
	<label for="ville">Ville</label>
	<input type="text" id="ville" name="ville"><br>
	
	<label for="cp">Code postal</label>
	<input type="text" id="cp" name="cp"><br>
	
	<label for="adresse">Adresse</label>
	<textarea name="adresse" id="adresse"></textarea><br>
	
	<input type="submit" name="validation" value="envoyer">

</form>