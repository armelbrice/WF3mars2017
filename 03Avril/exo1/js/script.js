
//  Attendre le chargement du DOM
$(document).ready( function(){

    //  Créer un tableau vide pour enregistrer les avatars
    var myTown = [];

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

            // Modifier l'attribut src de #avatarBody
            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png')
            

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

            // Modifier l'attribut src de #avatarBody
            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png')

        }); 

    //  Supprimer les messages d'erreur
    $('input, select').focus(function(){

        //  Sélectionner la balise précédent le input
        $(this).prev().children('b').text('');


    });

    // Capter l' évènement change() sur les selects
    $('select').change(function(){


        console.log( $(this).attr('id'), 'change : ' + $(this).val() );

        //  Condition if pour modifier la valeur src de avatarTop ou avatarStyleBottom
        if($(this).attr('id') == 'avatarStyleTop'){
            

            // Modidifer la valeur de l'attribut src de #avatarTop
            $('#avatarTop').attr('src', 'img/top/' + $(this).val() + '.png');



        } else{
            // Modidifer la valeur de l'attribut src de #avatarBottom
            $('#avatarBottom').attr('src', 'img/bottom/' + $(this).val() + '.png')

        };
        





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

            //  Ajouter une ligne dans le tableau HTML
            $('table').append('' + 
            '<tr>'+
            '<td><b>' + avatarName + '</b></td>'+
            '<td>' + avatarAge + 'an(s)</td>'+
            '<td>' + avatarGender + '</td>'+
            '<td>' + avatarStyleTop + ', ' + avatarStyleBottom + '</td>' + '<tr>'
            );

                 //  Ajouter l'avatar dans le tableau JS
                 myTown.push({
                     name: avatarName,
                     gender: avatarGender,
                     age: parseInt(avatarAge),
                     top: avatarStyleTop,
                     bottom: avatarStyleBottom

                 });

                //  Vider les champs du formulaire
                $('form')[0].reset();   

                //  revenir aux valeurs 'null pour l'avatar
                $('#avatarBody').attr('src', 'img/null.png');
                $('#avatarTop').attr('src', 'img/top/null.png');
                $('#avatarBottom').attr('src', 'img/bottom/null.png');

                //  Afficher les données du tableau JS dans la console
                console.log( myTown.length );

                // Afficher la taille totale de la ville dans #totalSims 
                $('#totalSims').text( myTown.length );
                

                //  Définir les variables globales pour les statistiques
                var totalGirls = 0;
                var totalBoys = 0;
                var totalAge = 0;


                //  faire une boucle for sur myTown pour connaitre les statistiques
                for( var i = 0; i < myTown.length; i++ ){
                    console.log( myTown[i].gender );

                    // Condition pour le gender
                    if( myTown[i].gender == 'girl' ){
                        totalGirls++;

                    } else{
                        totalBoys++;

                    }

                    //  Additionner les âges
                    totalAge += myTown[i].age; //  totalAge = totalAge + myTown[i].age
                    

                };

                // Afficher dans le tableau HTML le nombre de girls et boys
                
                $('#simsWoman').html(totalGirls + '<b>/' + myTown.length + '</b>');
                $('#simsMan').html(totalBoys + '<b>/' + myTown.length + '</b>');

                //  Afficher l'âge moyen dans le tableau HTML
                var ageAmountRounded = Math.round( totalAge / myTown.length );
                $('#simsAgeAmount').html( ageAmountRounded + '<b>/ans</b>' );
                

                

            



        };



    });

       




}); //  Fin de chargement du DOM


