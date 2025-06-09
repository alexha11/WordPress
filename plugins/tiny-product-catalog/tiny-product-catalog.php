<?php
/*
Plugin Name: Tiny Product Catalog
Description: A plugin to register a custom post type (product) and generate a shortcode to display products by category.
Author: Thu Van Huynh
*/

require_once('includes/tiny-product-post-type.php');
require_once('includes/tiny-product-shortcodes.php');
require_once('includes/tiny-product-catalog-widget.php');

function tpcatalog_setup_menu()
{
    add_menu_page('Tiny Product Catalog', 'Tiny Product Catalog', 'manage_options', 'tiny-product-catalog', 'tpcatalog_display_admin_page');
}
add_action('admin_menu', 'tpcatalog_setup_menu');

function tpcatalog_display_admin_page()
{
    echo '<h1>Tiny Product Catalog</h1>';
    echo '<p>Add [tiny-product-catalog] shortcode to display all products.</p>';
}
?>