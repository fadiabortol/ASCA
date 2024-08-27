<?php
/*
Template Name: Contact US
*/
get_header(); ?>

<main class="container-fluid">
    <section>
        <div>
            <div class="text-part">
                <div>
                    <h1><?= get_field('title', get_the_ID()); ?></h1>
                </div>
                <div>
                    <p><?= get_field('paragraph', get_the_ID()); ?></p>
                </div>

            </div>
            <div class="contact-form">
                <div class="col-7 form">
                    <?php
                    echo do_shortcode('[contact-form-7 id="7d06474" title="Contact form 1"]');
                    ?>
                </div>
                <div class="col-4 chat-part">
                    <div>
                        <h1><?= get_field('chat', get_the_ID()); ?></h1>
                        <p><?= get_field('chat_text', get_the_ID()); ?></p>
                        <ul>
                            <?php $link1  = get_field('link1', get_the_ID()); ?>
                            <?php $link2  = get_field('link2', get_the_ID()); ?>
                            <?php $link3  = get_field('link3', get_the_ID()); ?>

                            <li><img src="<?= get_field('icon1', get_the_ID()); ?>" alt=""> <a href="<?= $link1['url']; ?>"><?= $link1['title'] ?></a></li>
                            <li><img src="<?= get_field('icon2', get_the_ID()); ?>" alt=""> <a href="<?= $link2['url']; ?>"><?= $link2['title'] ?></a></li>
                            <li><img src="<?= get_field('icon3', get_the_ID()); ?>" alt=""> <a href="<?= $link3['url']; ?>"><?= $link3['title'] ?></a></li>
                        </ul>
                    </div>
                    <div>
                        <?php $phone = get_field('phone', get_the_ID()); ?>

                        <h1><?= get_field('call', get_the_ID()); ?></h1>
                        <p><?= get_field('call_text', get_the_ID()); ?></p>
                        <img src="<?= get_field('icon4', get_the_ID()); ?>" alt=""> <a href="<?= $phone['url']; ?>"><?= $phone['title'] ?></a>
                    </div>
                    <div>
                        <?php $location = get_field('location', get_the_ID()); ?>

                        <h1><?= get_field('visit', get_the_ID()); ?></h1>
                        <p><?= get_field('visit_text', get_the_ID()); ?></p>
                        <img src="<?= get_field('icon5', get_the_ID()); ?>" alt=""> <a href="<?= $location['url']; ?>"><?= $location['title'] ?></a>
                    </div>
                </div>
            </div>


        </div>
    </section>
</main>
<?php
get_footer();
?>