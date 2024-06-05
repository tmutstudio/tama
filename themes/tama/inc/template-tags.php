<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Grand_Expert_Otel
 */

if ( ! function_exists( 'tama_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function tama_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'tama' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'tama_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function tama_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'tama' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'tama_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function tama_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'tama' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'tama' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'tama' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'tama' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'tama' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'tama' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<br><span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'tama_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function tama_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'tama_phone_to_link' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_phone_to_link( $phone, $print = false ) {
        $return = '<a href="tel:' . preg_replace( "/[^\d\+]/", "", $phone ) . '"><span class="">' . $phone . '</span></a>';
        if( $print ){
            echo $return;
        }
        else {
            return $return;
        }
    }
endif;

if ( ! function_exists( 'tama_phone_to_link_wi' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_phone_to_link_wi( $phone, $print = false ) {
        $return = '<a href="tel:' . preg_replace( "/[^\d\+]/", "", $phone ) . '"><i class="fa fa-phone fa-lg"></i> <span class="">' . $phone . '</span></a>';
        if( $print ){
            echo $return;
        }
        else {
            return $return;
        }
    }
endif;

if ( ! function_exists( 'tama_phone_top_msgs' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_phone_top_msgs( $tel ) {
        $return = '<a href="https://wa.me/=' . preg_replace( "/[^\d\+]/", "", $tel ) . '" class="" title="WhatsApp"><span class="sb-phone-block-msgs-whatsapp"></span></a>';
        $return .= "\n" . '<a href="viber://chat?number=%2B' . preg_replace( "/[^\d]/", "", $tel ) . '" title="Viber"><span class="sb-phone-block-msgs-viber"></span></a>';
        echo $return;
    }
endif;



if ( ! function_exists( 'tama_section_options_items' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_section_options_items( $data ) {
        for( $i = 1; $i < 4; $i++ ){
            ?>
            <div class="section-options-item">
                <div class="section-options-item-title"><?php echo @$data['title_' . $i ]; ?></div>
                <div class="section-options-item-text"><?php echo @$data['text_' . $i ]; ?></div>
            </div>
            <?php
        }
    }
endif;



if ( ! function_exists( 'tama_section_how_items' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_section_how_items( $data ) {
        for( $i = 1; $i < 5; $i++ ){
            ?>
            <div class="section-how-item">
                <div class="section-how-item-title"><?php echo @$data['title_' . $i ]; ?></div>
                <div class="section-how-item-text"><?php echo @$data['text_' . $i ]; ?></div>
            </div>
            <?php
        }
    }
endif;



if ( ! function_exists( 'tama_section_about_items' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_section_about_items( $data ) {
        $text_left = wp_unslash( get_option( "s_settings_options_embedded_text_" . $data['txtblock_left' ] ) );
        $text_right = wp_unslash( get_option( "s_settings_options_embedded_text_" . $data['txtblock_right' ] ) );
            ?>
            <div class="section-about-item-left">
                <div class="section-about-item-title"><?php echo @$data['title_left' ]; ?></div>
                <div class="section-about-item-left-text"><?php echo $text_left; ?></div>
            </div>
            <div class="section-about-item-right">
                <div class="section-about-item-title"><?php echo @$data['title_right' ]; ?></div>
                <div class="section-about-item-right-text"><?php echo $text_right; ?></div>
                <button class="section-about-item-right-button"><?php echo @$data['btxt_right' ]; ?></button>
            </div>
            <?php
    }
endif;

if ( ! function_exists( 'tama_section_about_experts_items' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_section_about_experts_items( $data ) {
        $first_text = wp_unslash( get_option( "s_settings_options_embedded_text_" . $data['first_expert_txtblock' ] ) );
        $second_text = wp_unslash( get_option( "s_settings_options_embedded_text_" . $data['second_expert_txtblock' ] ) );
        $third_text = wp_unslash( get_option( "s_settings_options_embedded_text_" . $data['third_expert_txtblock' ] ) );
        $blocks = ['first', 'second', 'third'];

        foreach ( $blocks as $val ) {
            if( empty ( @$data[ $val . '_expert_fio' ] ) ) continue;
            $txtvarname = $val . '_text';
            ?>
            <div class="section-about-experts-item">
                <div class="section-about-experts-item-fio"><?php echo @$data[ $val . '_expert_fio' ]; ?></div>
                <div class="section-about-experts-item-text"><?php echo $$txtvarname; ?></div>
            </div>
            <?php
        }
    }
endif;

if ( ! function_exists( 'tama_home_contacts_phone' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_home_contacts_phone( $data = '' ) {
            $g_phone_number = get_option( "general_phone_number" );
			if( ! empty( $data ) ){
				if( preg_match( "/;/", $data ) ){
					$tel_ar = explode( ";", $data );
					foreach  ($tel_ar as $val ) {
						$tel = trim( $val );
						echo '<div class="section-contacts-text-phone">'."\n";
						echo tama_phone_to_link_wi( $tel );
						echo "</div>\n";
					}

				}
				else {
					echo '<div class="section-contacts-text-phone">'."\n";
                    echo tama_phone_to_link_wi( $data );
					echo "</div>\n";
				}
			}
			else{
				echo '<div class="section-contacts-text-phone">'."\n";
                echo tama_phone_to_link_wi( $g_phone_number );
				echo "</div>\n";
			}
        }
endif;

if ( ! function_exists( 'tama_home_contacts_whatsapp' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_home_contacts_whatsapp( $data = '' ) {
			if( ! empty( $data ) ){
				if( preg_match( "/;/", $data ) ){
					$tel_ar = explode( ";", $data );
					foreach  ($tel_ar as $val ) {
						$tel = trim( $val );
						echo '<div class="section-contacts-text-whatsapp">'."\n";
						echo '<a href="https://wa.me/' . preg_replace( "/[^\d]/", "", $tel ) . '" class=""><i class="fa fa-whatsapp fa-lg"></i> ' . $tel . '</a>';
						echo "</div>\n";
					}

				}
				else {
					echo '<div class="section-contacts-text-whatsapp">'."\n";
					echo '<a href="https://wa.me/' . preg_replace( "/[^\d]/", "", $data ) . '" class=""><i class="fa fa-whatsapp fa-lg"></i> ' . $data . '</a>';
					echo "</div>\n";
				}
			}
			else{
				echo '';
			}
        }
endif;

if ( ! function_exists( 'tama_home_contacts_telegram' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_home_contacts_telegram( $data = '' ) {
			if( ! empty( $data ) ){
				if( preg_match( "/;/", $data ) ){
					$tel_ar = explode( ";", $data );
					foreach  ($tel_ar as $val ) {
						$tel = trim( $val );
						echo '<div class="section-contacts-text-telegram">'."\n";
						echo '<a href="https://t.me/' . preg_replace( "/[^a-z\d@\+_]/", "", $tel ) . '" class=""><i class="fa fa-telegram fa-lg"></i> ' . $tel . '</a>';
						echo "</div>\n";
					}

				}
				else {
					echo '<div class="section-contacts-text-telegram">'."\n";
					echo '<a href="https://t.me/' . preg_replace( "/[^a-z\d@\+_]/", "", $data ) . '" class=""><i class="fa fa-telegram fa-lg"></i> ' . $data . '</a>';
					echo "</div>\n";
				}
			}
			else{
				echo '';
			}
        }
endif;

if ( ! function_exists( 'tama_email_to_script' ) ) :
	/**
	 * Documentation for function.
	 */
	function tama_email_to_script( $email = '' ) {
        $permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
        $letters = substr( str_shuffle( $permitted_chars ), 0, 3 );

		if( !empty( $email ) && preg_match( "/@/", $email ) ){
			$parts = explode( "@", $email );
			echo '<script>var aeml' . $letters . ',beml' . $letters . ',apart' . $letters . '; aeml' . $letters . '="' . $parts[0] . '"; beml' . $letters . '="' . $parts[1] . '"; apart' . $letters . '="<a href=\""; document.write( apart' . $letters . ' + "mailto:" + aeml' . $letters . ' + "@" + beml' . $letters . ' + "\"><i class=\"fa fa-envelope fa-lg\"></i> "  + aeml' . $letters . ' + "@" + beml' . $letters . ' + "</a>");</script>';
		}
		else {
			echo '';
		}
        }
endif;

if ( ! function_exists( 'tama_the_map' ) ) :
    /**
     * Show geo map
     */
function tama_the_map() {
    if( function_exists('altss_the_map') ){
        altss_the_map();
    }
}
endif;




if ( ! function_exists( 'tama_homepage_contacts_block' ) ) :
    /**
     * Show map from Yamap plugin.
     */
    function tama_homepage_contacts_block(){
        global $settings_options;
        ?>
                <div id="contacts" class="section-contacts-text-over">
                    <?php if( ! empty( $settings_options['contacts']['contacts_title'] ) ){?>
                    <div class="section-contacts-text-title"><?php echo @$settings_options['contacts']['contacts_title']; ?></div>
                    <?php } ?>
                    <?php tama_home_contacts_phone( @$settings_options['contacts']['contacts_phone'] ); ?>
                    <?php tama_home_contacts_whatsapp( @$settings_options['contacts']['contacts_whatsapp'] ); ?>
                    <?php tama_home_contacts_telegram( @$settings_options['contacts']['contacts_telegram'] ); ?>
                    <div class="section-contacts-text-email"><?php tama_email_to_script( @$settings_options['contacts']['contacts_email'] ); ?></div>
                    <div class="section-contacts-text-lacation"><?php echo @$settings_options['contacts']['contacts_location']; ?></div>
                </div>
                <div class="section-contacts-yamap-over">
                    <?php tama_the_map();?>
                </div>
       <?php 
    }
endif;

if ( ! function_exists( 'tama_the_copyright' ) ) :
    /**
     * Add a copyright text to footer.
     */
function tama_the_copyright() {
        $o = get_option( "copyright_info" );
        ?>
            <div id="copyright-site-info">
                &copy <?php echo $o['start_year']; ?> — <?php echo date('Y'); ?>
                <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( htmlentities( $o['holder_text'] ) ); ?>" rel="home">
                <?php echo htmlentities( $o['holder_text'] ); ?>
                </a>
            </div>
            <div id="copyright-site-info-optional">
                <?php echo $o['optional_text']; ?>
            </div>
        <?php
    }
endif;




