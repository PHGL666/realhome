</div><!-- #page -->

<footer class="footer bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="navbar-brand mr-auto"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img
                        class="logo-footer"
                        src="<?= get_stylesheet_directory_uri() ?>/images/logo_footer.svg"
                        alt="<?php bloginfo('name'); ?>"></a>
        </div>
        <div class="row footer_social_menu">
            <?php dynamic_sidebar('sidebar-footer') ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>



