<?php
require_once('../inc/init.inc.php');


// ---------------------------------TRAITEMENT--------------------------
// 1- vérification ADMIN
if (!internauteEstConnecteEtEstAdmin()) {
    header('location:../connexion.php'); // si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
    exit();
    
    
}

//  7- Suppression d'un produit
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_produit'])) {

    //  on sélectionne en base la photo pour pouvoir supprimer le fichier photo correspondant :
    $resultat = executeRequete("SELECT photo FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

    $produit_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car on n'a qu'un seul produit

    $chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo']; // chemin du fichier à supprimer

    if (!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)) {
        //  s'il y'a un chemin de photo en base ET que le fichier existe (file_exists est une fonction prédéfinie), on peut le supprimer :
        unlink($chemin_photo_a_supprimer); //  supprime le fichier spécifié
    }

    //  puis suppression du produit en BDD :
    executeRequete("DELETE FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

    $contenu .= '<div class="bg-success">Le produit a été supprimé ! </div>';
    $_GET['action'] = 'affichage'; // pour lancer l'affichage des produits dans le tableau HTML (point6)

    
    


}






//  4- Enregistrement du produit en BDD
if ($_POST) { //  équivalent à !empty($_POST) car si le $_POST est rempli, il vaut TRUE = formulaire posté

    // ici il faudrait mettre les contrôles sur le formulaire

    $photo_bdd = '';
    //  la photo subit un traitement spécifique en BDD. Cette variable contiendra son chemin d'accès


    //  9- Modification de la photo (suite) :
    if (isset($_GET['action']) && $_GET['action'] == 'modification') {
        // si je suis en modification, je mets en base la photo du champ hidden photo_actuelle du formulaire :
        $photo_bdd = $_POST['photo_actuelle'];
    }




    //  5- Traitement de la photo :
    // echo '<pre>'; print_r($_FILES); echo '</pre>';
    if (!empty($_FILES['photo'] ['name'])) {  //  si une image a été uploadée, $_FILES est remplie

    //  on constitue un nom unique pour le fichier photo :
    $nom_photo = $_POST['reference'] . '_' . $_FILES['photo'] ['name'];

    //  on constitue le chemin de la photo enregistrée en BDD :
    $photo_bdd = RACINE_SITE . 'photo/' . $nom_photo;
    //  on obtient ici le nom et le chemin de la photo depuis la racine du similar_text

    //  on constitue le chemin absolu complet de la photo depuis la racine serveur:
    $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . $photo_bdd;

    // echo '<pre>'; print_r($photo_dossier); echo '</pre>';

    // Enregistrement du fichier photo sur le serveur :
    copy($_FILES['photo'] ['tmp_name'], $photo_dossier); //  on copie le fichier temporaire de la photo stockée au chemin indiqué par $_FILES['photo'] ['tmp_name'] dans le chemin $photo_dossier de notre serveur
    

       
    }



    //  4- suite de l'enregistrement en BDD : 
    executeRequete("REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:id_produit, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo_bdd, :prix, :stock)", array('id_produit' => $_POST['id_produit'], 'reference' => $_POST['reference'], 'categorie' => $_POST['categorie'], 'titre' => $_POST['titre'], 'description' => $_POST['description'], 'couleur' => $_POST['couleur'], 'taille' => $_POST['taille'], 'public' => $_POST['public'], ':photo_bdd' => $photo_bdd, 'prix' => $_POST['prix'], 'stock' => $_POST['stock'] ));

    $contenu .= '<div class="bg-success">Le produit a été enregistré</div>';
    $_GET['action'] = 'affichage';
    // on met la valeur 'affichage' dans $_GET['action'] pour afficher automatiquement la table HTML des produits plus loin dans le script (point 6)
    
    

}

// 2- Les liens "Affichage" et "ajout d'un produit" :
$contenu .= '<ul class="nav nav-tabs">
                <li><a href="?action=affichage">Affichage des produits</a></li>
                <li><a href="?action=ajout">Ajout d\'un produit</a></li>
            </ul>';


// 6- Affichage des produits dans le back-office:
if (isset($_GET['action']) && $_GET['action'] == 'affichage' || !isset($_GET['action'])) {
    // si $_GET contient affichage ou que l'on arrive sur la page la 1ere fois $_GET['action'] n'existe pas

    $resultat = executeRequete("select * FROM produit"); //  on selectionne tous les produits
    

    $contenu .= '<h3>Affichage des produits</h3>';
    $contenu .= '<p>Nombre de produit(s) dans la boutique: ' . $resultat->rowcount() . '</p>';

    $contenu .= '<table class="table">';
    //  la ligne des entêtes
    $contenu .= '<tr>';
        for($i = 0; $i < $resultat->columnCount(); $i++)  {
            $colonne = $resultat->getColumnMeta($i);
            // echo '<pre>'; print_r($colonne); echo '</pre>';
            $contenu .= '<th>' . $colonne['name'] . '</th>'; // getColumnMeta() retourne un array contenant notamment l'indice name contenant le nom de la colonne
            
        }

        $contenu .= '<th>Action</th>'; //on ajoute une colonne "action"
    $contenu .= '</tr>';

    //  Affichage des lignes :
    while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $contenu .= '<tr>';
            // echo '<pre>'; print_r($ligne); echo '</pre>';
            foreach($ligne as $index => $data) { //$index réceptionne les indices, $data les valeurs
                if ($index == 'photo') {
                    $contenu .= '<td><img src="'. $data .'" width="70" height="70"></td>';

                } else {
                    $contenu .= '<td>' . $data . '</td>';
                }

                
        
            }

            $contenu .= '<td>
                            <a href="?action=modification&id_produit='. $ligne['id_produit'] .'">modifier</a> /
                            <a href="?action=suppression&id_produit='. $ligne['id_produit'] .'" onclick="return(confirm(\'Etes-vous certain de vouloir supprimer ce produit ? \'));"  >supprimer</a>
                        </td>';
        $contenu .= '</tr>';
    }


$contenu .= '</table>';


}








// -------------------------------AFFICHAGE------------------------------
require_once('../inc/haut.inc.php');
echo $contenu;

// 3- Formulaire HTML
if (isset($_GET['action']) && ($_GET['action'] == 'ajout' || 
$_GET['action'] == 'modification')) :
//  Si on a demandé l'ajout d'un produit ou sa modification, on affiche le formulaire :



    // 8- Formulaire de modification avec présaisie des infos dans le formulaire:
    if (isset($_GET['id_produit'])) {
        // Pour préremplir le formulaire, on requête en BDD les infos du produit passé dans l'url:
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

        $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC); //  pas de while car qu'un seul produit

        
    }



?>
<h3>Formulaire d'ajout ou de modification d'un produit</h3>
<form method="post" enctype="multipart/form-data" action="">
<!-- "multipart/form-data" permet d'uploader un fichier et de générer une superglobale $_FILES -->

        <input type="hidden" id="id_produit" name="id_produit" value="<?php echo $produit_actuel['id_produit'] ?? 0;   ?>">
        <!-- champ caché qui réceptionne l'id_produit nécessaire lors de la modification d'un produit existant -->

        <label for="reference">Référence</label><br>
        <input type="text" id="reference" name="reference" value="<?php echo $produit_actuel['reference'] ?? '';   ?>"><br><br>

        <label for="categorie">Catégorie</label><br>
        <input type="text" id="categorie" name="categorie" value="<?php echo $produit_actuel['categorie'] ?? '';   ?>"><br><br>

        <label for="titre">Titre</label><br>
        <input type="text" id="titre" name="titre" value="<?php echo $produit_actuel['titre'] ?? '';   ?>"><br><br>

        <label for="description">Description</label><br>
        <textarea id="description" name="description"><?php echo $produit_actuel['description'] ?? '';   ?></textarea><br><br>

        <label for="couleur">Couleur</label><br>
        <input type="text" id="couleur" name="couleur" value="<?php echo $produit_actuel['couleur'] ?? '';   ?>"><br><br>

        <label>Taille</label>
        <select name="taille" >
            <option value="S" selected>S</option>
            <option value="M" <?php if(isset($produit_actuel['taille']) && $produit_actuel['taille'] == 'M') echo 'selected';  ?> >M</option>
            <option value="L" <?php if(isset($produit_actuel['taille']) && $produit_actuel['taille'] == 'L') echo 'selected';  ?>>L</option>
            <option value="XL" <?php if(isset($produit_actuel['taille']) && $produit_actuel['taille'] == 'XL') echo 'selected';  ?>>XL</option>
        
        
        </select><br><br>

        <label>Public</label>
        <input type="radio" name="public" value="m" checked> Homme
        <input type="radio" name="public" value="f" <?php if(isset($produit_actuel['public']) && $produit_actuel['public'] == 'f') echo 'checked';  ?> > Femme
        <input type="radio" name="public" value="mixte"  <?php if(isset($produit_actuel['public']) && $produit_actuel['public'] == 'mixte') echo 'checked';  ?>> Mixte<br><br>

        <label for="photo">Photo</label><br><br>
        <input type="file" id="photo" name="photo"><br><br>
        <!-- coupler avec l'attribut enctype="multipart/form-data" de la balise <form>, le type 'file' permet d'uploader un fichier (ici une photo) -->

        <!-- 9- Modification de la photo -->
        <?php
            if (isset($produit_actuel['photo'])) {
            echo '<i>Vous pouvez uploader une nouvelle photo</i><br>';
            // Afficher la photo actuelle :
            echo '<img src="'. $produit_actuel['photo'] .'" width="90" height="90"><br>';
            // Mettre le chemin de la photo dans un champ caché pour l'enregistrer en base :
            echo '<input type="hidden" name="photo_actuelle" value="'. $produit_actuel['photo'] .'">';
            //  ce champ renseigne le $_POST['photo_actuelle'] qui va en base quand on soumet le formulaire de modification. Si on ne remplit pas le formulaire ici, le champ photo de la base est remplacé par un vide, ce qui efface le chemin de la photo

            }






        ?>






        <label for="prix">Prix</label><br>
        <input type="text" id="prix" name="prix" value="<?php echo $produit_actuel['prix'] ?? 0;   ?>"><br><br>

        <label for="stock">Stock</label><br>
        <input type="text" id="stock" name="stock" value="<?php echo $produit_actuel['stock'] ?? 0;   ?>"><br><br>

        <input type="submit" value="valider" class="btn">

    
</form>









<?php
endif;
require_once('../inc/bas.inc.php');