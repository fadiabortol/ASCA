<?php

function asca_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'asca_theme_support');

function asca_menus()
{
    $locations = array(
        'primary' => "Desktop Primary Right Sidebar",
        'footer' => "Footer Menu Items"
    );
    register_nav_menus($locations);
}

add_action('init', 'asca_menus');

function asca_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_style('asca-fontawesome', get_template_directory_uri() . "/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css", [], $version, 'all');
    wp_enqueue_style('Montserrat', "https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap", array(), $version, 'all');
    wp_enqueue_style('asca_bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap5.3.3/css/bootstrap.min.css', [], $version, 'all');
    wp_enqueue_style('asca_style', get_template_directory_uri() . "/assets/css/main.css", [], $version, 'all');
    wp_enqueue_script('asca_bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap5.3.3/js/bootstrap.min.js', array(), $version, true);
    wp_enqueue_script('asca_main', get_template_directory_uri() . "/assets/js/main.js", array(), $version, true);
}

add_action('wp_enqueue_scripts', 'asca_register_styles');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Options Page',
        'menu_title' => 'Options Page',
        'menu_slug' => 'options-page',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

function create_product_post_type()
{
    $labels = array(
        'name'                  => _x('Products', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Product', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Products', 'textdomain'),
        'name_admin_bar'        => __('Product', 'textdomain'),
        'archives'              => __('Product Archives', 'textdomain'),
        'attributes'            => __('Product Attributes', 'textdomain'),
        'parent_item_colon'     => __('Parent Product:', 'textdomain'),
        'all_items'             => __('All Products', 'textdomain'),
        'add_new_item'          => __('Add New Product', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'new_item'              => __('New Product', 'textdomain'),
        'edit_item'             => __('Edit Product', 'textdomain'),
        'update_item'           => __('Update Product', 'textdomain'),
        'view_item'             => __('View Product', 'textdomain'),
        'view_items'            => __('View Products', 'textdomain'),
        'search_items'          => __('Search Product', 'textdomain'),
        'not_found'             => __('Not found', 'textdomain'),
        'not_found_in_trash'    => __('Not found in Trash', 'textdomain'),
        'featured_image'        => __('Featured Image', 'textdomain'),
        'set_featured_image'    => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image'    => __('Use as featured image', 'textdomain'),
        'insert_into_item'      => __('Insert into product', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this product', 'textdomain'),
        'items_list'            => __('Products list', 'textdomain'),
        'items_list_navigation' => __('Products list navigation', 'textdomain'),
        'filter_items_list'     => __('Filter products list', 'textdomain'),
    );
    $args = array(
        'label'                 => __('Product', 'textdomain'),
        'description'           => __('Product Description', 'textdomain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'product'),
        'taxonomies'            => array('product_category', 'post_tag'),
    );
    register_post_type('products', $args);
}

add_action('init', 'create_product_post_type', 0);


function create_product_categories_taxonomy()
{
    $labels = array(
        'name'              => _x('Product Categories', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Product Category', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Product Categories', 'textdomain'),
        'all_items'         => __('All Product Categories', 'textdomain'),
        'parent_item'       => __('Parent Product Category', 'textdomain'),
        'parent_item_colon' => __('Parent Product Category:', 'textdomain'),
        'edit_item'         => __('Edit Product Category', 'textdomain'),
        'update_item'       => __('Update Product Category', 'textdomain'),
        'add_new_item'      => __('Add New Product Category', 'textdomain'),
        'new_item_name'     => __('New Product Category Name', 'textdomain'),
        'menu_name'         => __('Product Categories', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'product-category'),
    );

    register_taxonomy('product_category', array('products'), $args);
}

add_action('init', 'create_product_categories_taxonomy', 0);

function enqueue_custom_scripts()
{
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/ajax-script.js', array('jquery'), null, true);

    wp_localize_script('ajax-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('category_nonce')
    ));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function load_products_by_category()
{
    check_ajax_referer('category_nonce', 'nonce');

    $category_id = intval($_POST['category_id']);
    $category = get_term($category_id);

    $query = new WP_Query(array(
        'post_type' => 'products',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_category',
                'field'    => 'term_id',
                'terms'    => $category_id,
            ),
        ),
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $image = get_field('product_image', get_the_ID());
            // Customize the output as needed
            echo ' <div class="col-sm-4 mb-2 mb-sm-0 xs product-item">';
            echo '<a class="card" href="' . get_the_permalink() . '" >';
            echo '<div class="card-body">';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<h4>' . esc_html($category->name) . '</h4>';
            echo '<img class="card-img" src="' . esc_url($image) . '" alt="">';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo 'No products found.';
    }

    wp_die();
}

add_action('wp_ajax_load_products_by_category', 'load_products_by_category');
add_action('wp_ajax_nopriv_load_products_by_category', 'load_products_by_category');

function get_breadcrumb()
{
    echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
    echo " / ";
    $term_slug = 'categories';
    $taxonomy = 'product_category';

    $term = get_term_by('slug', $term_slug, $taxonomy);

    if ($term && !is_wp_error($term)) {
        $term_link = get_term_link($term);
        echo '<a href="' . esc_url($term_link) . '" rel="nofollow">Categories</a>';
    } else {
        echo 'Category not found or an error occurred.';
    }

    if (is_singular('products')) {
        // Custom post type: Products
        echo " / ";

        // Get product categories
        $terms = get_the_terms(get_the_ID(), 'product_category');
        if ($terms && !is_wp_error($terms)) {
            $term = array_shift($terms); // Get the first term
            echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
        }

        echo " / ";
        the_title();
    } elseif (is_category() || is_single()) {
        // Default categories or single posts
        echo " / ";
        the_category(' / ');

        if (is_single()) {
            echo " / ";
            the_title();
        }
    } elseif (is_page()) {
        // Regular pages
        echo " / ";
        echo the_title();
    } elseif (is_search()) {
        // Search results
        echo " / Search Results for... ";
        echo '"<em>' . get_search_query() . '</em>"';
    } elseif (is_tax('product_category')) {
        // Custom taxonomy archive (Product Category)
        echo " / ";
        single_term_title();
    }
}
