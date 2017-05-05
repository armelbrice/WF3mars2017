<?php

/*

 1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement. Cette fonction prend 2 paramètres : une date (valide) et le format de conversion "US" ou "FR"

 2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas. 
*/
/*
 function conversionDate($date, $conversion) {
     if ($conversion= 'FR') {
         return strftime('d/m/Y', $date); 
         
         
     } elseif ($date = 'd/m/Y' && $conversion= 'US') {
         return strftime('Y-m-d', $date);
         

     } else {
         return 'Date non valide';
     }
 }

 echo conversionDate('1980-05-03', 'FR');
*/



function afficheDate($date, $format) {
    /*
    //  Version avec objet date :
    $objetDate = new Datetime($date);

    if ($format == 'FR') {
        return $objetDate->format('d-m-y') . '<br>';
    } elseif ($format == 'US'){
        return $objetDate->format('Y-m-d') . '<br>';

    } else {
        return 'le format n\'est pas correct';

    }

    */

    // ---------
    // Autre version:

    if ($format == 'FR') {
        return strftime('%d-%m-%Y', strtotime($date)) . '<br>'; // strtotime retourne la date donnée en timestamp. strftime retourne le timestamp formaté selon le format indiqué avec des %
    } elseif ($format == 'US') {
        return strftime('%Y-%m-%d', strtotime($date)) . '<br>';

    } else {
        return 'le format n\'est pas correct';

    }




}






echo afficheDate('05-05-2017', 'US');
echo afficheDate('2017-05-05', 'FR');