<?php


$pdo = new PDO("mysql:host=localhost;dbname=entreprise", 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));

if($_POST){

	extract($_POST);

	/*$pdo = new PDO("mysql:host=localhost;dbname=$bdd", 'root', '', array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	));*/

	

	if(isset($requete) && !empty($requete)){

		//if(strpos($_POST['requete'], 'SELECT', 6)){
		
		echo'<p>Requete : ' . $requete . '</p>';

		
		$resultat = $pdo -> query("SHOW DATABASES");


		$database = $resultat -> fetchAll(PDO::FETCH_ASSOC);
		echo '<p>BDD : ' . $database[4]['Database'] . '</p>';

		echo "Pour information, les tables sur la BDD Entreprise sont les suivantes : "; 
		// echo "Pour information, les tables sur la BDD " . $bdd . " sont les suivantes : "; 
		mysql_connect("localhost", "root", "");
		$result = mysql_list_tables('entreprise');
		//$result = mysql_list_tables($bdd);
		$num_rows = mysql_num_rows($result);
		for ($i = 0; $i < $num_rows; $i++) {
  			echo mysql_tablename($result, $i) . "\n";
		}


		echo '<p style="background-color: green; height: 30px; vertical-align: middle;">Voici les résultats de votre requête.';

		$resultat = $pdo -> prepare($requete);
		$resultat -> bindValue(':requete', $requete, PDO::PARAM_STR);
		$resultat -> execute();
			

		echo 'Nombre de résultat : ' . $resultat -> rowCount() . '<br/><br/><br/>';

		echo '<table border="1">';
		echo ' <tr>';
		for($i = 0; $i < $resultat -> columnCount(); $i ++){
			$meta = $resultat -> getColumnMeta($i);
			echo '<th>' . $meta['name'] . '</th>';
		}
		echo ' </tr>';

		while($infos = $resultat -> fetch(PDO::FETCH_ASSOC)){
			echo '<tr>';
			foreach($infos as $indice => $valeur){
				echo '<td>' . $valeur . '</td>';
			}
			echo '</tr>';
		}
		echo '</table><br/><br/>';
		
		//}


		// -------------- Historique ----------------

		$f = fopen('historique.txt', 'a'); 
		fwrite($f, $bdd . "-" . $requete . "\r\n");
		$f = fclose($f);



		$historique = file('historique.txt');

		echo '<fieldset>
		<legend>Historique</legend>';
		for($i = 0; $i < count($historique); $i++){
			echo $historique[$i] . '<br/>';
		}
		echo '</fieldset>';

	}
	else{
		echo 'Aucune requête indiquée.';
	}
	
}


?>


<form action="" method="post">
	<label>Bdd :</label><br/>
	<select name="bdd">
		<?php
			
			for($i=0; $i<count($database); $i++){
				echo '<option value="' . $database[$i]['Database'] . '">' . $database[$i]['Database'] . '</option>';
			}
			
		?>
	</select><br/><br/>

	<label>Requete :</label><br/>
	<textarea name="requete" rows="10" cols="70"></textarea><br/><br/>

	<input type="submit" value="OK"/>

</form>