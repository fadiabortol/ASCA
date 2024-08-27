<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asca</title>
    <?php
    wp_head();
    ?>
</head>

<body <?= body_class(); ?>>
    <header>
        <div class="container-fluid nav-bar">
            <div class="menu-ligne">
                <div class="logo">
                    <a href="<?= get_site_url(); ?>"><img src="<?= get_field('logo', 'option'); ?>" alt=""></a>
                </div>
                <div class="bars" id="btn">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>

        </div>
        <div class="menu-div" id="Menu">
            <div class="container menu-nav">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul id="" class="">%3$s</ul>'
                    )
                );
                ?>
            </div>
            <div class="container email-list">
                <ul>
                    <li><ins><?= get_field('menu_first_email', 'option'); ?></li></ins>
                    <li><ins><?= get_field('menu_second_email', 'option'); ?></li></ins>
                    <li><ins><?= get_field('third_li', 'option'); ?></li></ins>
                    <li><ins><?= get_field('fourth_li', 'option'); ?></li></ins>
                </ul>
            </div>
            <div>

            </div>
        </div>
        </div>


    </header>