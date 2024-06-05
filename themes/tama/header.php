<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Grand_Expert_Otel
 */
global $settings_options, $sections_fields;
$settings_options = get_option( "s_settings_options" );

if( is_home() ){
    $sections_fields = get_option( 's_settings_options_hp_fields' );

    altss_cforms_generate([
        [ $settings_options['header_form_id'], ".site-header-info-block-second-button" ],
        [ $settings_options['footer_form_id'], "#footer-form-button" ],
    ]);
}
elseif( is_page() ){
    altss_cforms_generate([
        [ get_post_meta( $post->ID, 'meta_page_form_id', true ), ".page-top-button, .page-bottom-button, .page-item-button" ],
        [ $settings_options['footer_form_id'], "#footer-form-button" ]
    ]);
}
else {
    altss_cforms_generate([
        [ $settings_options['footer_form_id'], "#footer-form-button" ]
    ]);
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php
wp_body_open(); 
if ( is_home() ) {
   get_template_part( "template-parts/header", "home", [ 'settings_options' => $settings_options ] );
}
else {
    get_template_part( "template-parts/header", "entry", [ 'settings_options' => $settings_options ] );
}

?>


