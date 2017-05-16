<?php get_header(); //  appelle le fichier header.php?>

    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="contenu"><?php the_content(); ?></div>

    <img src="<?php the_field('photo'); ?>"><br><br>
    <?php the_field('telephone') ?><br><br>
    <?php the_field('adresse') ?><br><br>
    <?php the_field('horaires') ?><br><br>
    <?php the_field('carte') ?><br><br>
    <?php the_field('promotions') ?><br><br>
    <?php the_field('brunch') ?><br><br>
    <?php the_field('type_de_cuisine') ?><br><br>
    <?php the_field('prix moyen') ?><br><br>
    <?php the_field('acces') ?><br><br> 
    
    <!-- the fields() est une fonction interne à wordpress permettant de récupérer les informations des champs -->
    <script src="https//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <!-- chemin et intégration du fichier js -->
    <script src="<?php bloginfo('template_directory'); ?>/assets/acf-map.js"></script>

    <!-- déclaration d'une variable adresse qui contient notre carte si la variable $adresse n'est pas vide, c'est donc qu'une carte existe -->

    <?php
        $adresse = get_field('carte');
        if(!empty('adresse')) :
        ?>
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo $adresse['lat'], ?>;" data-lng="<?php echo $adresse['lng'] ?>">
            </div>
        </div>
        <?php endif; ?>









    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria', 'eprojet'); ?></p>
    <?php endif; ?>

<?php get_footer(); // appelle le fichier footer.php ?>
