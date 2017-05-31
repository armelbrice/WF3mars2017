<?php
// Exercice :
/*
	- Faire 4 liens HTML avec le nom des fruits.
	- Quand on clique sur un lien, on affiche le prix pour 1000g de ce fruit, dans cette page lien_fruits.php.
	
*/

include('fonction.inc.php');

if (isset($_GET['fruit'])) {
	echo calcul($_GET['fruit'], 1000) . '<hr>';
}

?>
<a href="?fruit=cerises">cerises</a>
<br>
<a href="?fruit=bananes">bananes</a>
<br>
<a href="?fruit=pommes">pommes</a>
<br>
<a href="?fruit=peches">pêches</a>