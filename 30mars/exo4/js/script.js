//  Sélectionner la balise h1
var myTitle = document.querySelector('h1');

//  Afficher le contenu de la balise dans la console
console.log( myTitle.textContent );

//  Modifier le contenu texte de la balise
myTitle.textContent = 'Le titre a changé';

//  Sélectionner la balise #myId
var myId = document.querySelector('#myId');

//  Afficher le contenu html dans la console
console.log( myId.innerHTML );

//  Modifier le contenu de la balise
myId.innerHTML = 'contactez <b>moi</b> les gars';
