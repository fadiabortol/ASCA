<footer class="container-fluid">
    <div class="row footer-section">
        <div class="col col-lg-3">
            <div class="logo">
                <a href=""><img src="<?= get_field('logo', 'option'); ?>" alt=""></a>
            </div>
            <p><?= get_field('footer_paragraph', 'option'); ?></p>
        </div>
        <div class="col col-lg-7">
            <?php
            wp_nav_menu(
                array(
                    'menu' => 'footer',
                    'container' => '',
                    'theme_location' => 'footer',
                    'items_wrap' => '<ul id="" class="list-of-menu">%3$s</ul>'
                )
            );
            ?>
        </div>
    </div>
</footer>
<?php
wp_footer();
?>
</body>

</html>