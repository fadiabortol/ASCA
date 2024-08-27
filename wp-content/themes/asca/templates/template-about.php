<?php
/*
Template Name: About Page
*/
get_header(); ?>
<main class="container-fluid">
    <section class="section1">
        <div class="section1-content">
            <div class="section1-content-first-part">
                <p><?= get_field('first_section_first_part_content_paragraph', get_the_ID()); ?></p>
            </div>
            <div class="section1-content-second-part">
                <div class="left-part">
                    <img src="<?= get_field('first_section_second_part_first-image', get_the_ID()); ?>" alt="">
                </div>
                <div class="right-part">
                    <div>
                        <img src="<?= get_field('first_section_second_part_second_image', get_the_ID()); ?>" alt="">
                    </div>
                    <div>
                        <p><?= get_field('first_section_second_part_paragraph', get_the_ID()); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section2">
        <div class="second-section-title">
            <h1><?= get_field('second_section_title', get_the_ID()); ?></h1>
        </div>
        <div class="paragraphs-part">
            <?php
            $second_section_paragraphs = get_field('second_section_paragraphs', get_the_ID());
            if ($second_section_paragraphs) {
                foreach ($second_section_paragraphs as $paragraph) {
            ?>
                    <div class="paragraph">
                        <p><?php echo $paragraph['paragraph']; ?></p>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <section class="section3">
        <?php
        if(get_field('third_section_background'));
        ?>
        <div style="background-image: url('<?php the_field('third_section_background') ?>');" class="back-img">
        <div class="section3-content">
            <h1><?= get_field('third_section_title', get_the_ID()); ?></h1>
        </div>
        <div class="cards">
            <?php
            $third_section_card = get_field('third_section_card', get_the_ID());
            if ($third_section_card) {
                foreach ($third_section_card as $paragraph) {
            ?>
                    <div class="card">
                        <p><?php echo $paragraph['paragraph']; ?></p>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        </div>

        
    </section>
    <section class="section4">
        <div class="fourth-section">
            <h1><?= get_field('fourth_section_title', get_the_ID()); ?></h1>
            <p><?= get_field('fourth_section_paragraph', get_the_ID()); ?></p>
            <button class="fourth-section-button">Request Quote</button>
        </div>
    </section>
</main>

<?php
get_footer(); ?>