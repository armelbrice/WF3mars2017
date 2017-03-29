/*
Créer un tableau contenant 4 index
- 1 string
- 1 number
2 booleans différents
*/

var myArray = [ 'Du texte', 1979, true, false ];
console.log( myArray );

/* 
   Ajouter un string dans le tableau
   Afficher le tableau dans la console
*/

myArray.push( 'Hello World' );
console.log( myArray );

/* 
   Ajouter dans la console la taille du tableau
   Afficher le premier et le dernier index du tableau dans la console
*/

console.log( myArray.length , myArray[0], myArray[4] );


/*
Créer un objet contenant 3 propriétes:
- le tableau
- 1 prénom
- 1 âge
Afficher l'objet dans la console
*/

var myObject = {

    array: myArray,
    name: 'Armel',
    age: 37
};
console.log( myObject );

/*
Afficher toutes les propriétes de l'objet dans la console une par une
*/

console.log( myObject.array );
console.log( myObject.name );
console.log( myObject.age );

/*
Modifier la propriété age de l'objet
Afficher l'objet dans la console
*/

myObject.age = 39;
console.log( myObject);



