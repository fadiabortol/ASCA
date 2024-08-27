<?php get_header(); ?>
<main class="container-fluid single-product-page">
    <?php $images = get_field('product_gallery', get_the_ID()); ?>
    <section>
        <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
    </section>
    <section class="product-detail">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="row product-info" style="justify-content: space-between;">
                    <div class="col-md-5 swiper-part">
                        <swiper-container style="--swiper-pagination-color: #fff" class="mySwiper"
                            thumbs-swiper=".mySwiper2" space-between="10">
                            <?php if (count($images) > 0) {
                                foreach ($images as $image) { ?>
                                    <swiper-slide>
                                        <img src="<?= $image['product_image'] ?>" />
                                    </swiper-slide>
                            <?php }
                            } ?>

                        </swiper-container>

                        <swiper-container class="mySwiper2" direction="vertical" space-between="15" slides-per-view="4" free-mode="true"
                            watch-slides-progress="true">
                            <?php if (count($images) > 0) {
                                foreach ($images as $image) { ?>
                                    <swiper-slide>
                                        <img src="<?= $image['product_image'] ?>" />
                                    </swiper-slide>
                            <?php }
                            } ?>
                        </swiper-container>

                        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

                    </div>
                    <div class="col-md-5 text-part">
                        <h1 class="product-title"><?php the_title(); ?></h1>

                        <?php
                        // Get product categories
                        $terms = get_the_terms(get_the_ID(), 'product_category');
                        if ($terms && !is_wp_error($terms)) {
                            $term = array_shift($terms); // Get the first term
                            echo '<h2 class="product-category"><span class="highlight">' . esc_html($term->name) . '</span></h2>';
                        }
                        ?>
                        <div class="product-content">
                            <?php
                            // Display the custom ACF product text
                            $product_text = get_field('product_text');
                            if ($product_text) {
                                echo wp_kses_post($product_text); // Allows some HTML if needed
                            }
                            ?>
                        </div>


                    </div>
                </div>
        <?php endwhile;
        endif; ?>
    </section>
</main>
<?php get_footer(); ?>