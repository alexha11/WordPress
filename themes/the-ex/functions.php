<?php

// Register primary navigation menu
register_nav_menus([
    'primary' => 'Primary Menu',
]);

// Enqueue styles (with typo fixed)
function the_ex_assets()
{
    wp_enqueue_style('the-ex-style', get_stylesheet_uri()); // ← fixed function name + added handle
}
add_action('wp_enqueue_scripts', 'the_ex_assets');

// Automatically create "Contact Us" page if it doesn't exist
function the_ex_create_contact_page()
{
    $page_title = 'Contact Us';
    $page_check = get_page_by_title($page_title);

    if (empty($page_check)) {
        $new_page = array(
            'post_title' => $page_title,
            'post_content' => '',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_author' => get_current_user_id(), // safer than hardcoding 1
            'page_template' => 'contact.php', // Make sure this file exists in your theme
        );
        wp_insert_post($new_page);
    }
}
add_action('after_setup_theme', 'the_ex_create_contact_page');

function the_ex_register_sidebars()
{
    register_sidebar(array(
        'name' => __('Main Sidebar', 'the-ex'),
        'id' => 'main-sidebar',
        'description' => __('Widgets in this area will appear in the sidebar.', 'the-ex'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'the_ex_register_sidebars');

