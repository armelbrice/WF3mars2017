// Attendre le chargement du DOM
$(document).ready(function(){

    

    //  Burger menu classique
    $('.fa-bars').click(function(){

        $('nav ul').fadeIn(500);

    });

    // Fermer le burger menu
    $('li').click(function(){

        $('nav ul').fadeOut(500);

    });


    
});// Fin de la fonction d'attente de chargement du DOM
