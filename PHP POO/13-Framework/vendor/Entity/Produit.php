<?php
// vendor/Entity/Produit.php

namespace Entity;

class Produit
{
    private $id_produit;
    private $reference;
    private $description;
    private $titre;
    private $categorie;
    private $couleur;
    private $taille;
    private $public, $photo, $prix, $stock;

    /**
    * GETTERS
    *
    *
    */

    public function getId_produit(){
        return $this -> id_produit;
    }

    public function getCategorie(){
        return $this -> titre;
    }

    public function getDescription(){
        return $this -> description;
    }

    public function getTaille(){
        return $this -> taille;
    }

    public function getPrix(){
        return $this -> Prix;
    }


    public function getStock(){
        return $this -> stock;
    }


    public function getCouleur(){
        return $this -> couleur;
    }

    public function getReference(){
        return $this -> reference;
    }

    public function getPhoto(){
        return $this -> photo;
    }

    public function getTitre(){
        return $this -> titre;
    }

    public function getPublic(){
        return $this -> public;
    }


    /**
    * SETTERS
    *
    */
    public function setId_produit($id){
        $this -> id_produit = $id;
    }

    public function setReference($ref){
        $this -> reference = $ref;
    }


    public function setDescription($desc){
        $this -> description = $des;
    }


    public function setTaille($taille){
        $this -> taille = $taille;
    }


    public function setPrix($prix){
        $this -> prix = $prix;
    }

    public function setStock($stock){
        $this -> stock = $stock;
    }

    public function setPhoto($photo){
        $this -> photo = $photo;
    }

    public function setCouleur($couleur){
        $this -> couleur = $couleur;
    }

    public function setCategorie($categorie){
        $this -> categorie = $categorie;
    }

    public function setTitre($titre){
        $this -> titre = $titre;
    }

    public function setPublic($public){
        $this -> public = $public;
    }





}