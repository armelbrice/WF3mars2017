
//  Attendre le chargement du DOM
$(document).ready( function(){

    //  Vérifier le genre de l'avatar
        var avatarWoman = $('#avatarWoman');
        var avatarMan = $('#avatarMan');

    // => avatarWoman Capter le click
        avatarWoman.click(function(){

            console.log('Je suis une ' + avatarWoman.val() );
            

            //  Désactiver avatarMan
            console.log( avatarMan.prop('checked, false') );
            

        });

        // => avatarMan Capter le click
        avatarMan.click(function(){

            console.log('Je suis un ' + avatarMan.val() );

            //  Désactiver avatarWoman
            console.log( avatarWoman.prop('checked, false') );

        }); 


    


//   Capter la soumission du formulaire
$('form').submit(function(evt){

    //  Bloquer le comportement par défaut du formulaire
    evt.preventDefault();
    
    

    //  Variables globales
    var avatarName = $('#avatarName').val();
    var avatarAge = $('#avatarAge').val();

    

    var avatarStyleTop = $('#avatarStyleTop').val();
    var avatarStyleBottom = $('#avatarStyleBottom').val();

    console.log('Nom : ' + avatarName + '- Age : ' + avatarAge + ' - Woman : ' + avatarWoman + ' - Man : ' + avatarMan + ' -Top: ' + avatarStyleTop + ' - Bottom : ' + avatarStyleBottom);

    //  Vérifier les champs du formulaire
        //  => avatarName minimum 5 caractères
        if( avatarName.length < 5 ){
            console.log('Minimum 5 caractères');
        
        } else{
            console.log('avatarName OK');
        };

        // avatarAge entre 1 et 100
        if( avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0 ){
            console.log('avatarAge entre 1 et 100 ans');


        } else{

            console.log('avatarAge OK');
        };

        //  => avatarStyleTop obligatoire
        if(avatarStyleTop == 'null'){
            console.log('Vous devez choisir un avatarStyleTop');

        } else{
            console.log('avatarStyleTop OK')
        }; 

        //  => avatarStyleBottom obligatoire
        if(avatarStyleBottom == 'null'){
            console.log('Vous devez choisir un avatarStyleBottom');

        } else{
            console.log('avatarStyleBottom OK')
        }; 



        

        




});







}); //  Fin de chargement du DOM


