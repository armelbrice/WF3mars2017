<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<title>Formulaire véhicule</title>
	</head>

	<body>
		<form method="post" action="ajax.js">
			<fieldset>
				<label>Marque</label>
				<input type="text" name="marque">

				<label>Modèle</label>
				<input type="text" name="modele">

				<label>Année</label>
				<input type="text" name="annee">

				<label>Couleur</label>
				<input type="text" name="couleur">

				<input type="submit" value="Envoyer">
			</fieldset>
		</form>
		<script type="text/javascript" src="ajax.js"></script>
	</body>

</html>