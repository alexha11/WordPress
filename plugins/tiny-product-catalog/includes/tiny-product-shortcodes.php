<?php
/* Shortcode to display products */
function tpcatalog_shortcode($atts)
{
    // Handle shortcode attributes
    $atts = shortcode_atts(array(
        'category' => '', // Default: show all
    ), $atts, 'tiny-product-catalog');

    // Query arguments
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
    );

    // Filter by category if provided
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'tpcatalog_category',
                'field' => 'slug',
                'terms' => sanitize_text_field($atts['category']),
            )
        );
    }

    // Output buffer
    ob_start();
    $products = new WP_Query($args);

    if ($products->have_posts()) {
        echo '<div class="tpcatalog-wrapper">';
        while ($products->have_posts()) {
            $products->the_post();
            $price = get_post_meta(get_the_ID(), '_tpcatalog_meta_price', true);
            ?>
            <div class="post">
                <h2><?php the_title(); ?></h2>
                <p><strong>Price:</strong> €<?php echo esc_html($price); ?></p>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('medium');
                } ?>
                <p><?php the_excerpt(); ?></p>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo '<p>No products found in this category.</p>';
    }

    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('tiny-product-catalog', 'tpcatalog_shortcode');
?>