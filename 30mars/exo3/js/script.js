//  Sélecteur de balises HTML (tag)
var myParaTag = document.getElementsByTagName ('p');
console.log( myParaTag );

//  Sélecteur de class
var myClass = document.getElementsByClassName('myClass');
console.log( myClass );

//  Sélecteur d'Id
var myId = document.getElementById('myId');
console.log( myId );

//  Sélecteur queryselector
console.log( document.querySelector('h1') );

//  Sélecteur queryselectorAll
console.log( document.querySelectorAll('.myClass') );

