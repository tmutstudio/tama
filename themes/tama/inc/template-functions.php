<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Grand_Expert_Otel
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tama_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'tama_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tama_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'tama_pingback_header' );



function tama_rewiew_rating_stars( $n=0, $e = true ){
    $res = '<span class="mh-review-stars-over">';
    for( $i=0; $i<$n; $i++ ){
        $res .= '<span class="mh-review-star-item"></span>';
    }
    $res .= '</span>';
    if( $e ) echo $res;
    else return $res;
}

function tama_sanitize_text( $text ){
    $text = sanitize_text_field( $text );
    $text = preg_replace( "/\[br\]/", "<br>", $text );
    return $text;
}


function tama_sanitize_textarea( $text ){
    $text = wp_kses( $text, "post" );
    $text = wpautop( $text );
    return $text;
}

