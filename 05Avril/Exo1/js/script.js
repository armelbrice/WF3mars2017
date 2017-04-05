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

            // créer une variable pour la validation finale du formulaire
            var formScore = 0;

            // Bloquer le comportement du formulaire
            evt.preventDefault();

            console.log('Submit du formulaire');

            //  Minimum 4 caractères pour l'email et 5 caractères pour le message
            if( $('[type="email"]').val().length < 4 ){
                    console.log('Email manquant');

            } else{
                console.log('Email OK');
                formScore++;

            };

            if( $('textarea').val().length < 5 ){
                console.log('Message manquant');


            } else{
                console.log('Message OK');
                formScore++;
            };

            // Vérifier la valeur de formScore
            if( formScore == 2 ){
                console.log('Le formulaire est validé !')

                // => Envoi des données vers le fichier de traitement PHP
                    // => Le fichier PHP répond true: je peux continuer mon code

                    // Ajouter le message dans la balise aside
                    $('aside').append('<h3>' + $('textarea').val() + '</h3><p>' + $('[type="email"]').val() + '</p>');

                    // Reset du formulaire
                    $('form')[0].reset();
            };




    });



    };

    



}); // Fin d'attente de chargement du DOM
