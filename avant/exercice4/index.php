<?php

require 'Chat.class.php';

$chat1 = new Chat("Basile", 5, "roux", "male", "gouttiere");
$chat2 = new Chat("Pupuce", 3, "blanc", "femelle", "persan");
$chat3 = new Chat("Hector", 6, "noir", "male", "sphynx");

$array1 = $chat1->getInfos();
var_dump($array1);
echo '<hr>';
$array2 = $chat2->getInfos();
var_dump($array2);
echo '<hr>';
$array3 = $chat3->getInfos();
var_dump($array3);
echo'<hr>';

?>