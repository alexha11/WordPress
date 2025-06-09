<?php
function tpcatalog_register_post_type()
{
    add_theme_support('post-thumbnails');

    $labels = array(
        'name' => 'Products',
        'singular_name' => 'Product',
        'add_new' => 'New Product',
        'add_new_item' => 'Add New Product',
        'edit_item' => 'Edit Product',
        'new_item' => 'New Product',
        'view_item' => 'View Product',
        'search_items' => 'Search Products',
        'not_found' => 'No Products Found',
        'not_found_in_trash' => 'No Products found in Trash'
    );

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'products'),
        'show_in_rest' => true,
    );

    register_post_type('product', $args);
}
add_action('init', 'tpcatalog_register_post_type');

/* Add price meta box */
function tpcatalog_add_custom_box()
{
    add_meta_box(
        'tpcatalog_price_id',
        'Price',
        'tpcatalog_price_box_html',
        'product'
    );
}
add_action('add_meta_boxes', 'tpcatalog_add_custom_box');

function tpcatalog_price_box_html($post)
{
    $value = get_post_meta($post->ID, '_tpcatalog_meta_price', true);
    ?>
    <label for="tpcatalog_price">Price (€):</label><br>
    <input type="text" name="tpcatalog_price" id="tpcatalog_price" value="<?php echo esc_attr($value); ?>">
    <?php
}

/* Save price meta */
function tpcatalog_save_postdata($post_id)
{
    if (array_key_exists('tpcatalog_price', $_POST)) {
        update_post_meta(
            $post_id,
            '_tpcatalog_meta_price',
            sanitize_text_field($_POST['tpcatalog_price'])
        );
    }
}
add_action('save_post', 'tpcatalog_save_postdata');

/* Register new taxonomy (product category) */
function tpcatalog_register_taxonomy()
{
    $labels = array(
        'name' => 'Product Categories',
        'singular_name' => 'Product Category',
        'search_items' => 'Search Product Categories',
        'all_items' => 'All Product Categories',
        'edit_item' => 'Edit Product Category',
        'update_item' => 'Update Product Category',
        'add_new_item' => 'Add New Product Category',
        'new_item_name' => 'New Product Category Name',
        'menu_name' => 'Product Categories',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'sort' => true,
        'args' => array('orderby' => 'term_order'),
        'rewrite' => array('slug' => 'product-category'),
        'show_admin_column' => true,
        'show_in_rest' => true,
    );

    register_taxonomy('tpcatalog_category', array('product'), $args);
}
add_action('init', 'tpcatalog_register_taxonomy');

?>