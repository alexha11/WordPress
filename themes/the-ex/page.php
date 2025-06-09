<?php get_header(); ?>

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="post">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    <?php endwhile;
else :
    echo '<p>Sorry, nothing here yet 💔</p>';
endif;

get_sidebar();
get_footer();
?>
