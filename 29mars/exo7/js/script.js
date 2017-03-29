/*
  Le Chifoumy
- L'utilisateur doit choisir entre pierre, feuille et ciseaux
- L'ordinateur doit choisir entre pierre, feuille et ciseaux
- nous comparons le choix de l'utilisateur et l'ordinateur
- selon le résultat, l'utilisateur a gagné ou l'ordinateur a gagné
- une partie se joue en 3 manches

*/

//  Variable globale pour le choix de l utilisateur
var userBet = '';
var userWin = 0;
var computerWin = 0;


/*
  1# L'utilisateur doit choisir entre pierre, feuille et ciseaux
  - Créer une fonction qui prend en paramètres le choix de l'utilisateur
  - Appeler la fonction au clic sur les button du DOM
  - Afficher le résultat dans la console

*/

function userChoice(paramChoice){

    

    //  Assigner à la variable userBet la valeur de paramChoice
    userBet = paramChoice;

};

/*
 2# L'ordinateur doit choisir entre pierre, feuille et ciseaux
 - Faire une fonction pour déclencher le choix au clic sur un bouton
 - Créer un tableau contenant 'pierre', 'feuille' et 'ciseaux'
 - Faire en sorte de choisir aléatoirement l'un des 3 index du tableau
 - Afficher le résultat dans la console
*/

function computerChoice(){

    

    var computerMemory = [ 'pierre', 'feuille', 'ciseaux' ];
    

    //  Choisir aléatoirement l'un des 3 index du tableau

    var computerBet = computerMemory[Math.floor(Math.random() * computerMemory.length)];
   
    

    


    //  Vérifier si userBet est vide
    if( userBet == ''){
        document.querySelector('h2').innerHTML = ' Choisi ton <i>arme<i>';

    } else{

    //  Afficher les 2 choix dans la balise H2
    document.querySelector('h2').textContent = userBet + ' vs. ' + computerBet;

    //  Comparer les variables
    if( userBet == computerBet ){
        document.querySelector('p').textContent = 'Egalité';
    
    } else if( userBet == 'pierre' && computerBet == 'ciseaux' ){
        document.querySelector('p').textContent = 'Gagné';

        //  Incrementer la variable userWin de 1
        userWin++;

    } else if(userBet == 'feuille' && computerBet == 'pierre' ){
        document.querySelector('p').textContent = 'Gagné';

        //  Incrementer la variable userWin de 1
        userWin++;

    } else if(userBet == 'ciseaux' && computerBet == 'feuille' ){
        document.querySelector('p').textContent = 'Gagné';

        //  Incrementer la variable userWin de 1
        userWin++;

    } else{
        document.querySelector('p').textContent = 'Perdu...';

        //  Incrémenter la variable ComputerWin de 1
        computerWin++;
    };

};

    // Vérifier les valeurs de userWin et computerWin
    if( userWin == 3 ){

        // Afficher le message dans le body
        document.querySelector('body').innerHTML = '<h1>Vous avez gagné !</h1><a href="index.html">Rejouer</a>';
    }; 

    if( computerWin == 3 ){
        document.querySelector('body').innerHTML = '<h1>Vous avez perdu !</h1><a href="index.html">Rejouer</a>';
    };


};





