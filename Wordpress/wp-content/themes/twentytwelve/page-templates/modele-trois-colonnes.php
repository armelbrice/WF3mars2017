<?php
/* Template Name: Modele Trois Colonnes */

get_header(); ?>

    <div class="modele-trois-colonne-colonne-gauche"></div>
    <div id="primary" class="site-content modele-trois-colonne-colonne-centrale">
        <div id="content" role="main">
        <?php while (have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'page' ); ?>
            <?php comments_template( '', true); ?>
        <?php endwhile; // end of the loop ?>
        
        </div><!-- #content -->
    </div><!-- #primary -->
    <div class="modele-trois-colonne-colonne-droite"> <?php get_sidebar(); ?> </div>
    <div class="clear"></div>

<?php get_footer();  ?>
