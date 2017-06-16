<?php

$pdo = new PDO('mysql:host=localhost;dbname=vehicules', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	));
$resultat = $pdo -> prepare("SELECT * FROM voiture");
$resultat -> execute();

$voitures =  $resultat -> fetchAll(PDO::FETCH_ASSOC);

$tableau = "<table><tr>";
foreach($voitures[0]  as $key => $value) {
	$tableau .= '<th>' . $key . '</th>';
}
$tableau .= "</tr>";

foreach ($voitures as $key => $value) {
	$tableau .= "<tr>";
	foreach ($voitures[$key] as $key => $value) {
		$tableau .= "<td>" . $value . "</td>";
	}
	$tableau .= "</tr>";
}
$tableau .= "</table>";

echo $tableau;

?>