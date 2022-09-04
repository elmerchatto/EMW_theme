<header>
    <div class="header--inner">
        <div class="container">
            <div class="row justify--space-between">
                <div class="site--logo">
                    <a href="<?php echo site_url(); ?>">
                        <?php emw_img_acf('main_logo','option'); ?>
                    </a>
                </div>
                <nav class="nav">
                    <?php echo wp_nav_menu( array('theme_location' => 'main-menu','fallback_cb' => false ) );  ?>
                </nav>
            </div>
        </div>
    </div>
   
</header>