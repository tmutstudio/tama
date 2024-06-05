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
        <div class="site-header-info-block">
            <div class="site-header-info-block-first">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/tama-girl_735x703.png" alt="" />
            </div>
            <div class="site-header-info-block-second">
                <h1 class="site-header-info-block-second-title"><?php echo  tama_sanitize_text( $settings_options['opt_header_text'] ); ?></h1>
                <div class="site-header-info-block-second-text"><?php echo  tama_sanitize_textarea( $settings_options['opt_header_textarea'] ); ?></div>
                <div class="site-header-info-block-second-button-over">
                    <button class="site-header-info-block-second-button"><?php echo  tama_sanitize_text( $settings_options['header_btn_text'] ); ?></button>
                </div>
            </div>
        </div>


    </header><!-- #masthead -->
    <div class="mobile-menu-screen">
        <nav id="mobile-site-navigation" class="mobile-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary-home-menu',
                    'menu_id'        => 'primary-home-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    </div>