<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tama
 */

$meta_page_button_text = get_post_meta( $post->ID, 'meta_page_button_text', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-page-header">
        <div class="entry-page-header-picture">
            <?php tama_post_thumbnail(); ?>
        </div>
        <div class="entry-page-header-info">
            <div class="entry-page-header-info-texts">
                <h1 class="entry-page-title"><?php echo tama_sanitize_text( get_the_title() ); ?></h1>
                <div class="entry-page-header-text"><?php echo tama_sanitize_textarea( get_post_meta( $post->ID, 'meta_page_header_text', true ) ); ?></div>
            </div>
            <div class="entry-page-header-button-over">
            <?php if( ! empty( $meta_page_button_text ) ){?>
                <button class="page-top-button"><?php echo tama_sanitize_text( $meta_page_button_text ); ?></button>
            <?php } ?>
            </div>
        </div>
		
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tama' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
    <?php if( ! empty( $meta_page_button_text ) ){?>
    <div class="entry-page-bottom-button-over">
        <button class="page-bottom-button"><?php echo tama_sanitize_text( $meta_page_button_text ); ?></button>
    </div>
    <?php } ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
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
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
