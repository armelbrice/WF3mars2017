<?php
// -----REGION/WIDGET
add_action('widgets_init', 'eprojet_init_sidebar'); //  j'exécute la fonction nommée "eprojet_init_sidebar"
function eprojet_init_sidebar() {

    if(function_exists('register_sidebar')) { //  si la fonction register_sidebar existe(c'est une fonction interne à wordpress), alors je déclare des régions

        register_sidebar(array(
            'name'         => __('region-entete', 'eprojet'),
            'id'           => 'region-entete',
            'description'  => __('Add widgets here to appear in your entete region', 'eprojet')

            ));

        
        register_sidebar(array(
            'name'         => __('colonne de droite', 'eprojet'),
            'id'           => 'colonne-droite',
            'description'  => __('Add widgets here to appear in your colonne droite region', 'eprojet')

            ));


        register_sidebar(array(
            'name'         => __('region-footer', 'eprojet'),
            'id'           => 'colonne-footer',
            'description'  => __('Add widgets here to appear in your region footer region', 'eprojet')

            ));

    }
    
}

// --- MENU
add_action('init', 'eprojet_init_menu'); //  j' exécute la fonction nommée "eprojet_init_menu"

function eprojet_init_menu(){ // fonction qui contient la déclaration de mes régions

    if(function_exists('register_nav_menu')) { // si la fonction register_nav_menu existe (c'est une fonction interne à wordpress), alors je déclare mes régions

        register_nav_menu('primary', __('Primary Menu', 'eprojet'));


    }
    
}

