<?php
		$tableau= array(
			'Prénom: ' => 'John',
			'Nom:' => 'Doe', 
			'Adresse: ' => '15, main street', 
			'Code Postal: ' => '25063', 
			'Ville: ' => 'Farawayland', 
			'Email: ' => 'johndoe@laposte.fr', 
			'Tel: ' => '01 02 03 04 05', 
			'Date de naissance: ' => '1990/09/31');

		$tableau['Date de naissance: ']="31/09/1990";


		foreach ($tableau as $key => $value) {
			echo "<li>$key $value</li>";
		  };  
				
		?>
