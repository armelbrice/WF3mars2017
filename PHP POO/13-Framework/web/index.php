<?php
session_start();
require_once(__DIR__ . '/../vendor/autoload.php');


// TEST 1 : ENTITY Produit
// $produit = new Entity\Produit;
// $produit -> setTitre('Mon produit');
// echo $produit -> getTitre();

//  TEST 2 : PDOManager
// $pdom = Manager\PDOManager::getInstance();
// $resultat = $pdom -> getPdo() -> query("SELECT * FROM produit");
// $produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($produits);
// echo '</pre>';

//  TEST 3 : EntityRepository
$er = new Manager\EntityRepository;

// $resultat = $er -> findAll();
// $resultat = $er -> find(7);
// $resultat = $er -> delete(5);

$produit = array(
    "id_produit" => NULL,
    "reference" => "dqsdqsd",
    "categorie" => "pantalon",
    "titre" => "wxcwxxc",
    "prix" => "15",
    "taille" => "S",
    "stock" => "15",
    "public" => "m",
    "photo" => "dsqps.jpg",
    "couleur" => "blanc",
    "description" => "efefededeeazdzed",
    
);

$resultat = $er -> register($produit);

echo '<pre>';
print_r($resultat);
echo '</pre>';
