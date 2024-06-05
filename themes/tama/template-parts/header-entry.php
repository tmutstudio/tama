<?php 
$settings_options = $args['settings_options'];
$phone = $settings_options['header_phone'];
?>
    <header id="masthead" class="site-header">
        <div class="site-branding">
            <div class="site-branding-left">
                <div class="site-branding-left-logo">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="site-branding-left-bloginfo">
                    <a href="/"><?php bloginfo(); ?></a>
                </div>
            </div>
            <div class="site-branding-right">
                <div class="sb-toggle-block">
                    <ul class="nav-header-burger-over"><li class="nav-header-burger"><i></i><i></i><i></i></li></ul>
                </div>
                <div class="sb-phone-block">
                        <div class=""><?php tama_phone_to_link( $phone, true ); ?></div>
                </div>
            </div>
        </div><!-- .site-branding -->

    </header><!-- #masthead -->
    <div class="mobile-menu-screen">
        <nav id="mobile-site-navigation" class="mobile-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary-entry-menu',
                    'menu_id'        => 'primary-entry-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    </div>