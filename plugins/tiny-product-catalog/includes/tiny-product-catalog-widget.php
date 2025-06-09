<?php
class Tiny_Product_Catalog_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'tiny_product_catalog_widget',
            __('Tiny Product Catalog Widget', 'text_domain'),
            array('description' => __('Displays a random product from your catalog.', 'text_domain'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $query = new WP_Query(array(
            'post_type' => 'product',
            'posts_per_page' => 1,
            'orderby' => 'rand',
        ));

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $price = get_post_meta(get_the_ID(), '_tpcatalog_meta_price', true);
                ?>
                <div class="widget-product">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <p><strong>Price:</strong> €<?php echo esc_html($price); ?></p>
                </div>
                <?php
            }
        } else {
            echo '<p>No products found.</p>';
        }

        wp_reset_postdata();
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Featured Product', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}
add_action('widgets_init', 'tpcatalog_register_widget');

function tpcatalog_register_widget()
{
    register_widget('Tiny_Product_Catalog_Widget');
}

