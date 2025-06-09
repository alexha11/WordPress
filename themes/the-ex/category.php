<?php get_header(); ?>

<div class="post">
    <h2>🗂 Category: <?php single_cat_title(); ?></h2>
    <p>✨ View all items in this category ✨</p>
</div>
<main>
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <div class="post">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php echo get_the_date(); ?> | <?php echo get_the_category_list(', '); ?></p>
                <?php the_excerpt(); ?>
            </div>
        <?php endwhile;
    else:
        echo '<p>No items in this category yet 🥲</p>';
    endif;
    ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>