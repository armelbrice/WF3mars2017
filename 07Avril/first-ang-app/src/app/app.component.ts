// Importer la class component
import { Component, OnInit } from '@angular/core';

// Importer la class router
import { Router } from '@angular/router';

// Définir le décorateur @Component({...})
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
})

// Exporter la class du composant
export class AppComponent implements OnInit {

  constructor(
    private router: Router
  ){}

  private burgerIsOpen = false;

  //  Créer une fonction à appeler au click sur .fa-bars
  openBurger(){

    if( this.burgerIsOpen == false ){
      
    // Changer la valeur de burgerIsOpen
    this.burgerIsOpen = true;

    } else{
      this.burgerIsOpen = false;
    }
    
    

  };

  // Créer une fonction pour fermer le burgermenu
    closeBurger(link){
    console.log(link)

    // Fermer le burgermenu
    this.burgerIsOpen = false;

    //  Naviguer vers la bonne vue
    this.router.navigate([link]);

  }

  

  //  Attendre le chargement du composant
  ngOnInit(){

    console.log('le composant est chargé')

    //  créer une variable pour sélectionner le loader en javascript
    let loader = document.getElementById('appLoader');

    //  Ajouter la class closedLoader à la balise
    loader.classList.add('closedLoader');
  }
  


}
