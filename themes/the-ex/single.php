<?php get_header(); ?>

<?php
if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <div class="post">
            <h2><?php the_title(); ?></h2>
            <p><?php echo get_the_date(); ?> | <?php echo get_the_category_list(', '); ?></p>
            <?php the_content(); ?>
        </div>
    <?php endwhile;
else:
    echo '<p>This post could not be found 💔</p>';
endif;

get_sidebar();
get_footer();
?>