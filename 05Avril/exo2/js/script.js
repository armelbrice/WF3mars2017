// Attendre le chargement du DOM
$(document).ready(function(){

    // Créer une fonction pour l'animation d'une compétence
    function mySkills( paramEq, paramWidth){

        // Animation des balises p des skills
         $('h3 + ul').children('li').eq(paramEq).find('p').animate({
             width: paramWidth
         });

    };

    // Créer une fonction pour ouvrir la modal
    function openModal(){

        // Ouvrir la modal au click sur les boutons
        $('button').click(function(){
             $('#modal').fadeIn();

        });
       

        $('.fa-times').click(function(){
            $('#modal').fadeOut()
        });

    };
    
    

    //  Charger le contenu de home.html dans le main
    $('main').load('views/home.html');


    /*
    Burger menu
    */
        // Burger menu : ouverture
        $('h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();

            // Appliquer la fonction slideToggle sur la nav
            $('nav').slideToggle();

        });

        // Burger menu : navigation
        $('nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();

            // masquer le main
            $('main').fadeOut();

            var viewToload = $(this).attr('href');

            // Fermer le burger menu
            $('nav').slideUp(function(){

                // Charger la vue
                console.log('vous voulez afficher la vue : ' + viewToload);

                //  Charger la bonne vue pour afficher le main (callBack)
                $('main').load( 'views/' + viewToload, function(){

                    $('main').fadeIn(function(){

                        //  vérifier si l'utilisateur veut voir la page about.html
                        if( viewToload == 'about.html' ){
                            // Appeler la fonction mySkills
                        mySkills( 0, '84%' );
                        mySkills( 1, '24%' );
                        mySkills( 2, '80%' );

                    };
                    
                    // vérifier si l'utilisateur est sur la page portfolio.html
                    if( viewToload == 'portfolio.html'){

                        // Appelez la fonction pour ouvrir la modal
                        openModal();
                    };

                        

                    });
                });

            });

        });

        


}); // Fin de la fonction d'attente de chargement du DOM