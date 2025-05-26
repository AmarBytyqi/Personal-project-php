<?php
// Theme setup
function realestate_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'realestate'),
    ));
    
    // Add image sizes
    add_image_size('property-thumbnail', 400, 250, true);
    add_image_size('property-large', 800, 500, true);
}
add_action('after_setup_theme', 'realestate_theme_setup');

// Enqueue styles and scripts
function realestate_scripts() {
    wp_enqueue_style('realestate-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('realestate-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'realestate_scripts');

// Register Custom Post Type for Properties
function create_property_post_type() {
    register_post_type('property',
        array(
            'labels' => array(
                'name' => __('Properties'),
                'singular_name' => __('Property'),
                'add_new' => __('Add New Property'),
                'add_new_item' => __('Add New Property'),
                'edit_item' => __('Edit Property'),
                'new_item' => __('New Property'),
                'view_item' => __('View Property'),
                'search_items' => __('Search Properties'),
                'not_found' => __('No properties found'),
                'not_found_in_trash' => __('No properties found in Trash'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'properties'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-admin-home',
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_property_post_type');

// Add custom meta boxes for property details
function add_property_meta_boxes() {
    add_meta_box(
        'property-details',
        'Property Details',
        'property_details_callback',
        'property',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_property_meta_boxes');

function property_details_callback($post) {
    wp_nonce_field('save_property_details', 'property_details_nonce');
    
    $price = get_post_meta($post->ID, 'price', true);
    $bedrooms = get_post_meta($post->ID, 'bedrooms', true);
    $bathrooms = get_post_meta($post->ID, 'bathrooms', true);
    $square_feet = get_post_meta($post->ID, 'square_feet', true);
    $property_type = get_post_meta($post->ID, 'property_type', true);
    $location = get_post_meta($post->ID, 'location', true);
    $featured = get_post_meta($post->ID, 'featured', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="price">Price</label></th><td><input type="number" id="price" name="price" value="' . esc_attr($price) . '" /></td></tr>';
    echo '<tr><th><label for="bedrooms">Bedrooms</label></th><td><input type="number" id="bedrooms" name="bedrooms" value="' . esc_attr($bedrooms) . '" /></td></tr>';
    echo '<tr><th><label for="bathrooms">Bathrooms</label></th><td><input type="number" id="bathrooms" name="bathrooms" value="' . esc_attr($bathrooms) . '" step="0.5" /></td></tr>';
    echo '<tr><th><label for="square_feet">Square Feet</label></th><td><input type="number" id="square_feet" name="square_feet" value="' . esc_attr($square_feet) . '" /></td></tr>';
    echo '<tr><th><label for="property_type">Property Type</label></th><td>';
    echo '<select id="property_type" name="property_type">';
    echo '<option value="house"' . selected($property_type, 'house', false) . '>House</option>';
    echo '<option value="apartment"' . selected($property_type, 'apartment', false) . '>Apartment</option>';
    echo '<option value="condo"' . selected($property_type, 'condo', false) . '>Condo</option>';
    echo '<option value="commercial"' . selected($property_type, 'commercial', false) . '>Commercial</option>';
    echo '</select></td></tr>';
    echo '<tr><th><label for="location">Location</label></th><td><input type="text" id="location" name="location" value="' . esc_attr($location) . '" /></td></tr>';
    echo '<tr><th><label for="featured">Featured Property</label></th><td><input type="checkbox" id="featured" name="featured" value="yes"' . checked($featured, 'yes', false) . ' /></td></tr>';
    echo '</table>';
}

// Save property meta data
function save_property_details($post_id) {
    if (!isset($_POST['property_details_nonce']) || !wp_verify_nonce($_POST['property_details_nonce'], 'save_property_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = array('price', 'bedrooms', 'bathrooms', 'square_feet', 'property_type', 'location');
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
    
    $featured = isset($_POST['featured']) ? 'yes' : 'no';
    update_post_meta($post_id, 'featured', $featured);
}
add_action('save_post', 'save_property_details');

// Custom excerpt length
function realestate_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'realestate_excerpt_length');

// Format price function
function format_price($price) {
    return '$' . number_format($price);
}
?>
