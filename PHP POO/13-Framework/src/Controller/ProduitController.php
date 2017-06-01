<?php
// src/Controller/ProduitController.php

namespace Controller;

use Controller\Controller;

class ProduitController extends Controller
{
    public function afficheAll() {
        $produits = $this -> getRepository() -> getAllProduits();
        $categories = $this -> getRepository() -> getAllCategories();

        // $this -> render();

        // echo '<pre>';
        // print_r($produits);
        // print_r($categories);
        // echo '</pre>';

        $params= array(
            'produits' => $produits,
            'categories' => $categories,
            'title' => 'Boutique de mon site'
        );

        return $this -> render('layout.html', 'boutique.php', $params);

    }

    public function affiche($id) {
        $produit = $this -> getRepository() -> getProduitById($id);
        $suggestions = $this -> getRepository() -> getAllSuggestions($produit['categorie'], $produit['id_produit']);

        // $this -> render();

        // echo '<pre>';
        // print_r($produit);
        // print_r($suggestions);
        // echo '</pre>';

        $params= array(
            'produit' => $produit,
            'suggestions' => $suggestions,
            'title' => 'Fiche produit - ' . $produit['titre']
            
        );


        return $this -> render('layout.html', 'fiche_produit.html', $params);


    }

    public function categorie($categorie) {
        $produits = $this -> getRepository() -> getAllProduitsByCategorie($categorie);
        $categories = $this -> getRepository() -> getAllCategories();

        // $this -> render();
        // echo '<pre>';
        // print_r($produits);
        // print_r($categories);
        // echo '</pre>';

        $params= array(
            'produits' => $produits,
            'categories' => $categories,
            'title' => 'Categorie ' . $categorie
        );

        return $this -> render('layout.html', 'categorie.html', $params);



    }


}