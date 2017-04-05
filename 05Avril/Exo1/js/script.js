$(document).ready(function(){


    // Capter le click sur le 1er bouton
    $('button').eq(0).click(function(){

        // Charger le contenu de views/about.html dans la première section du main
        $('section').eq(0).load('views/about.html', function(){
            console.log('Le fichier about.html est chargé');

            //  Animer la première section
            $('section').eq(0).fadeIn();


        });

    });

    // Capter le click sur le 2eme bouton
    $('button').eq(1).click(function(){

        // Charger dans la 2eme section le contenu de l id portfolio de views/content.html
        $('section').eq(1).load('views/content.html #portfolio', function(){

            


        }); 

    });

    // Capter le click sur le 3eme bouton
    $('button').eq(2).click(function(){

        // Charger dans la 3eme section le contenu de l id contact de views/content.html
        $('section').eq(2).load('views/content.html #contacts', function(){
            // Appelez la fonction submitForm
            submitForm();
        });

    });

    //  créer une fonction pour capter la soumission du formulaire
    function submitForm(){
        //  capter la soumission du formulaire
        $('form').submit(function(evt){

            evt.preventDefault();

            console.log('Submit du formulaire');




    });



    }

    



}); // Fin d'attente de chargement du DOM
