<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
global $settings_options;
$phone = $settings_options['header_phone'];

?>
<footer id="footer-section" class="site-footer">
    <div class="site-footer-blocks-over">
        <div class="site-footer-first">
            <div class="site-footer-block-logo"> 
                <div class="site-footer-logo">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="site-footer-bloginfo">
                    <a href="/"><?php bloginfo(); ?></a>
                </div>
            </div>
            <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
            <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
                <ul class="footer-navigation-wrapper">
                    <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-menu',
                                    'items_wrap'     => '%3$s',
                                    'container'      => false,
                                    'depth'          => 1,
                                    'link_before'    => '<span>',
                                    'link_after'     => '</span>',
                                    'fallback_cb'    => false,
                                )
                            );
                            ?>
                </ul><!-- .footer-navigation-wrapper -->
            </nav><!-- .footer-navigation -->
            <?php endif; ?>
            <?php if ( ! empty( $settings_options['footer_btn_text'] ) ) : ?>
                <div class="footer-button-over">
                    <button id="footer-form-button" class="footer-button"><?php echo tama_sanitize_text( $settings_options['footer_btn_text'] ); ?></button>
                </div>
            <?php endif; ?>
            <div class="footer-site-info">
                <?php tama_the_copyright();?>
            </div><!-- .site-info -->
            <div class="footer-optional-text"><?php echo  tama_sanitize_textarea( $settings_options['footer_textarea'] ); ?></div>
            <div class="site-footer-counters">
            </div>
        </div>
        <div class="site-footer-second">
            <div class="site-footer-block-logo-mobile">
                <div class="site-footer-logo">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="site-footer-bloginfo">
                    <a href="/"><?php bloginfo(); ?></a>
                </div>
            </div>
            <?php tama_homepage_contacts_block(); ?>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>