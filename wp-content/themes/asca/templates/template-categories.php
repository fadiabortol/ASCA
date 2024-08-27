<?php
/*
Template Name: Categories Page
*/
get_header(); ?>
<main class="container-fluid">
    <section>
        <div class="products-section">
            <div class="category-buttons">
                <?php
                // Get all terms in the custom taxonomy 'product_category' sorted in descending order
                $terms = get_terms(array(
                    'taxonomy' => 'product_category',
                    'hide_empty' => false,
                ));

                if (!empty($terms) && !is_wp_error($terms)) {
                    $first_term_id = $terms[0]->term_id; // Get the ID of the first term
                    // Loop through each term and create a button
                    foreach ($terms as $index => $term) {
                        $term_link = get_term_link($term);
                        if (is_wp_error($term_link)) {
                            continue;
                        }
                ?>
                        <button class="category-button" data-category-id="<?php echo esc_attr($term->term_id); ?>" <?php if ($index === 0) echo 'id="default-category-button"'; ?>>
                            <?php echo esc_html($term->name); ?>
                        </button>
                <?php
                    }
                } else {
                    echo 'No categories found.';
                }
                ?>
            </div>

            <div id="product-container" class="row product-container"></div> 

            <?php wp_nonce_field('category_nonce', 'ajax_nonce'); ?>
        </div>
    </section>
</main>
<?php
get_footer();
?>
