// Attendre la fonction de chargement du DOM
$(document).ready(function(){







    // Choix du chat correspond à l'image
    $('#catName').change(function(){
        
        $('#chatFirst').attr('src', $(this).val() );

        
    });

    // Supprimer les class error
    $('input, select, textarea').focus(function(){
        $(this).removeClass('error');
    });


    //   Capter la soumission du formulaire
    $('form').submit(function(evt){

        //  Bloquer le comportement par défaut du formulaire
    evt.preventDefault();

    // Définir une variable pour la validation finale du formulaire
    var formScore = 0;

    // Définir les variables globales
    var catName = $('#catName');
    var userMessage = $('textarea');

    // Vérifier que l'utilisateur a bien saisi au moins 15 caractères
        if( userMessage.val().length < 15 ){
            // Ajouter un message d'erreur 
            $('[for="catChoice"] b').text('Minimum 15 caractères');


        } else{
            console.log('Message OK')
            // Incrémenter la variable formScore
            formScore++;
        };

    // Vérifier que l'utilisateur a bien choisi un chat
    if( catName == 'null' ){


        // Ajouter un message d'erreur 
        $('[for="catName"] b').text('Choix obligatoire');

    } else{
        console.log('catName OK')
        // Incrémenter la variable formScore
        formScore++;

    }

    

    // Validation finale du formulaire

        if(formScore == 2){

            console.log('Formulaire validé !');
            // Envoi des données dans le fichier de traitement PHP
            // PHP répond true => continuer le traitement du formulaire

        }

        //  Vider les champs du formulaire
        $('form')[0].reset();

        

    

    


        






    
    
    











    });



















});// Fin de la fonction d'attente de chargement du DOM
