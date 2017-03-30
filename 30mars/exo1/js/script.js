/*
  - Créer un tableau contenant 4 prénoms dont le votre
  - Faire une boucle sur le tableau pour saluer dans la console chacun des prénoms
  - Afficher un message spécial pour votre prénom (ex. Salut c'est moi !)
*/

var userName = [ 'Armel', 'henry', 'mathieu', 'napoleon' ];
console.log( userName );

for( var i = 0; i < userName.length; i++ ){
    
    // console.log( 'Salut ' + userName[i]);

    if( userName[i] == 'Armel' ){
        console.log( "Salut c'est moi"); // console.log( 'Salut c\'est moi' );

        //  Modifier une balise HTML
        document.querySelector('p').textContent = "Salut c'est moi !";
        

    } else{
        console.log( 'Salut ' + userName[i] );
    }


};


