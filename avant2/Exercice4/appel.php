<?php

// Appelle le fichier qui contient la classe Chat
require('Chat.class.php');

// instancie les objets de la classe Chat et indique ses différentes infos
$chat1 = new Chat();
$chat1 -> setPrenom('Mikado');
$chat1 -> setAge(2);
$chat1 -> setCouleur('noir');
$chat1 -> setSexe('male');
$chat1 -> setRace('bombay');

$chat2 = new Chat();
$chat2 -> setPrenom('Maya');
$chat2 -> setAge(4);
$chat2 -> setCouleur('beige');
$chat2 -> setSexe('femelle');
$chat2 -> setRace('siamois');

$chat3 = new Chat();
$chat3 -> setPrenom('Lily');
$chat3 -> setAge(6);
$chat3 -> setCouleur('bleu');
$chat3 -> setSexe('femelle');
$chat3 -> setRace('chartreux');


// affiche les infos de chaque chat sous forme de tableau
var_dump($chat1 -> getInfos());
echo '<br/><br/>';
var_dump($chat2 -> getInfos());
echo '<br/><br/>';
var_dump($chat3 -> getInfos());