<?php get_header(); ?>

<div class="post">
    <h2>Welcome to 💖 the_ex_in_finland 💖</h2>
    <p>✨ Discover our cutest pre-order bags and accessories made just for you! ✨</p>
    <p>🎀 Scroll down to view our latest posts!</p>
</div>


<?php
if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <div class="post">
            <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo get_the_date(); ?> | <?php echo get_the_category_list(', '); ?></p>
            <?php the_excerpt(); ?>
        </div>
    <?php endwhile;
else:
    echo '<p>No posts found.</p>';
endif;
?>


get_sidebar();
get_footer();
?>