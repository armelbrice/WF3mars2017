<div id="comments">
<!-- have_comments() est une fonction interne à wordpress qui renvoie un boolean true tant qu'il y a des commentaires dans la BDD get_comments_number() est une fonction interne à wordpress qui permet de récupérer les commentaires en BDD -->
    <?php if(have_comments()) : echo get_comments_number(); endif; ?>
    commentaire(s) . <br>
    <?php if(get_comment_pages_count > 1 && get_option('page_comments')) : ?>
    <nav>
        <?php __e('Comment navigation', 'eprojet') ?>
        <?php previous_comments_link( __('&larr; Older Comments', 'eprojet')); ?>
        <?php next_comments_link( __('Newer Comments & rarr;', 'eprojet')); ?>
    </nav>
    <?php  endif; ?>

    <?php wp_list_comments(); ?>

    <?php if(comments_open()) : ?>
        <?php comments_form(array('comments_notes_after' => '')); ?>
    <?php elseif(have_comments()) : ?>
        <?php __e('comments are closed', 'eprojet'); ?>
    <?php  endif; ?>
    
</div>