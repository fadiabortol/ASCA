<?php
get_header();
?>
<main>
  <section class="container-fluid section1">
    <div class="first-section">
      <div class="first-section-first-part">
        <div class="text-part">
          <h1><?= get_field('first_section_title', get_the_ID()); ?></h1>
          <p><?= get_field('first_section_paragraph', get_the_ID()); ?></p>
        </div>
        <div class="group-imgs">
          <?php
          $images = get_field('images', get_the_ID());
          if ($images) {
            foreach ($images as $image) {
              $image_url = $image['image'];
          ?>
              <div>
                <img src="<?php echo esc_url($image_url); ?>" alt="Image">
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="first-section-second-part">
        <div class="first-section-second-part-content">
          <div class="first-section-second-part-text">
            <p class="first-section-second-part-par"><?= get_field('first_section_back_paragraph', get_the_ID()); ?></p>
            <div class="information">
              <a href=""><img src="<?= get_field('first_section_first_flag', get_the_ID()); ?>" alt=""></a>
              <ins>
                <a href="">
                  <p><?= get_field('first_section_first_phone_number', get_the_ID()); ?></p>
                </a>
              </ins>
              /
              <a href="" class="email"><?= get_field('first_section_first_email', get_the_ID()); ?></a>
            </div>
            <div class="information">
              <a href=""><img src="<?= get_field('first_section_second_flag', get_the_ID()); ?>" alt=""></a>
              <ins>
                <a href="">
                  <p><?= get_field('first_section_second_phone_number', get_the_ID()); ?></p>
                </a>
              </ins>
              /
              <a href="" class="email"><?= get_field('first_section_second_email', get_the_ID()); ?></a>
            </div>
          </div>
          <div class="planet">
            <img src="<?= get_field('first_section_second_part_image', get_the_ID()); ?>" alt="">
          </div>
        </div>
      </div>
  </section>
  <section class="section2 container-fluid">
    <div class="second-section">
      <div class="second-section-first-part">
        <div>
          <h1><?= get_field('second_section_title', get_the_ID()); ?></h1>
        </div>
        <div>
          <div class="second-section-first-paragraph">
            <?= get_field('second_section_first_paragraph', get_the_ID()); ?>
          </div>
          <div class="second-section-second-paragraph">
            <?= get_field('second_section_second_paragraph', get_the_ID()); ?>
          </div>
        </div>
      </div>
      <div class="container-fluid second-section-second-part">
        <div class="background-div">
          <img src="<?= get_field('second_section_second_paragraph_first_ball', get_the_ID()); ?>" alt="">
          <img src="<?= get_field('second_section_second_paragraph_second_ball', get_the_ID()); ?>" alt="">

        </div>
        <h1><?= get_field('second_section_second_part_title', get_the_ID()); ?></h1>
        <div><button class="second-section-button">Request Quote</button></div>
      </div>
    </div>
  </section>
  <section class="container-fluid">
    <div class="third-section">
      <div class="third-section-first-part">
        <div class="third-section-first-button">
          <span>Shop by category</span>
        </div>
        <div class="third-section-paragraph">
          <?= get_field('third_section_paragraph', get_the_ID()) ?>
        </div>
        <div class="slider-button">
          <div class="btn-group-vertical third-section-vertical-button" role="group" aria-label="Vertical button group">
            <button type="button" class="btn swiper-button-next"></button>
            <button type="button" class="btn swiper-button-prev"></button>
          </div>
        </div>
      </div>
      <div class="swiper home-page-swiper">
        <?php
        // Fetch all terms in the 'custom_category' taxonomy
        $terms = get_terms(array(
          'taxonomy' => 'product_category', // Replace with your taxonomy name
          'hide_empty' => false,           // Show empty terms
          'orderby'      => 'name',     // Order by category name
          'order'        => 'DESC',      // Order in ascending order
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
          echo '<div class="swiper-wrapper">';
          $index = 1;
          foreach ($terms as $term) {
            $image = get_field('category_image', $term);
            // Display each term name
            echo '<div class="swiper-slide">';
            if ($image_url) {
              echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($term->name) . '">';
            }
            echo '<h3 class="number">' . esc_html($index) . '.', '</h3></br>';
            echo '<h2 class="title">' . esc_html($term->name) . '</h2>';

            echo '<button>Learn More</button>';
            echo '</div>';
            $index++;
          }
          echo '</div>';
        } else {
          echo 'No custom categories found.';
        }
        ?>
      </div>
    </div>
  </section>
  <section class="section5 container-fluid">
    <div class="fourth-section">
      <h2><?= get_field('fourth_section_title', get_the_ID()); ?></h2>
      <p><?= get_field('fourth_section_paragraph', get_the_ID()); ?></p>
      <button class="fourth-section-button">Request Quote</button>
    </div>
  </section>

</main>

<?php
get_footer();
?>