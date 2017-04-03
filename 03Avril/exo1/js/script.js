
//  Attendre le chargement du DOM
$(document).ready( function(){

    //  Vérifier le genre de l'avatar
        var avatarWoman = $('#avatarWoman');
        var avatarMan = $('#avatarMan');
        var avatarGender;

    // => avatarWoman Capter le click
        avatarWoman.click(function(){

            console.log('Je suis une ' + avatarWoman.val() );
            

            //  Désactiver avatarMan
            avatarMan.prop('checked', false);

            //  Modifier la valeur de avatarGender
            avatarGender = avatarWoman.val();

            //  Vider le message d'erreur
            $('.labelGender b').text('');
            

        });

        // => avatarMan Capter le click
        avatarMan.click(function(){

            console.log('Je suis un ' + avatarMan.val() );

            //  Désactiver avatarWoman
            avatarWoman.prop('checked', false);

            //  Modifier la valeur de avatarGender
            avatarGender = avatarMan.val();

            //  Vider le message d'erreur
            $('.labelGender b').text('');

        }); 

    //  Supprimer les messages d'erreur
    $('input, select').focus(function(){

        //  Sélectionner la balise précédent le input
        $(this).prev().children('b').text('');


    });


    


//   Capter la soumission du formulaire
$('form').submit(function(evt){

    //  Bloquer le comportement par défaut du formulaire
    evt.preventDefault();

    // Définir une variable pour la validation finale du formulaire
    var formScore = 0;
    
    

    //  Variables globales
    var avatarName = $('#avatarName').val();
    var avatarAge = $('#avatarAge').val();

    

    var avatarStyleTop = $('#avatarStyleTop').val();
    var avatarStyleBottom = $('#avatarStyleBottom').val();

    console.log('Nom : ' + avatarName + '- Age : ' + avatarAge + ' - Woman : ' + avatarWoman + ' - Man : ' + avatarMan + ' -Top: ' + avatarStyleTop + ' - Bottom : ' + avatarStyleBottom);

    //  Vérifier les champs du formulaire
        //  => avatarName minimum 5 caractères
        if( avatarName.length < 5 ){
            

            // Ajouter un message d'erreur dans le label du dessus
            $('[for="avatarName"] b').text('Minimum 5 caractères');
        
        } else{
            console.log('avatarName OK');

            // Incrémenter la variable formScore
            formScore++;
        };

        // avatarAge entre 1 et 100
        if( avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0 ){
             // Ajouter un message d'erreur dans le label
            $('[for="avatarAge"] b').text('Entre 1 et 100 ans');


        } else{

            console.log('avatarAge OK');

            // Incrémenter la variable formScore
            formScore++;
        };

        //  => avatarStyleTop obligatoire
        if(avatarStyleTop == 'null'){
            // Ajouter un message d'erreur dans le label du dessus
            $('[for="avatarStyleTop"] b').text('Choix obligatoire');

        } else{
            

            // Incrémenter la variable formScore
            formScore++;
        }; 

        //  => avatarStyleBottom obligatoire
        if(avatarStyleBottom == 'null'){
              // Ajouter un message d'erreur dans le label du dessus
            $('[for="avatarStyleBottom"] b').text('Choix obligatoire');

        } else{
            

            // Incrémenter la variable formScore
            formScore++;
        }; 

         // => avatarGender vérifier la valeur
        if( avatarGender == undefined ){
              // Ajouter un message d'erreur dans .labelGender
            $('.labelGender b').text('Choix obligatoire');


        } else{
            

            // Incrémenter la variable formScore
            formScore++;

        };

        // Vérifier la valeur de la variable formScore
        if( formScore == 5 ){
            console.log('Le formulaire est validé !');

            // => Envoyer les données du formulaire et attendre la réponse du serveur
            //  => Le serveur répond true

                //  Vider les champs du formulaire
                $('form')[0].reset();
            



        };



    });

       




}); //  Fin de chargement du DOM


