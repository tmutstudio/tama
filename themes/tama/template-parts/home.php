<?php 



global $sections_fields;

?>

	<section id="options" class="section-options">
        <div class="section-options-entry">
            <div class="section-options-row">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <div class="section-options-item">
                    <div class="">
                        <div class="section-options-item-thumb">
                        <?php tama_post_thumbnail( "medium" ) ?>
                        </div>
                        <div class="section-options-item-title">
                        <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                        </div>
                        <div class="section-options-item-date">
                        <?php the_time('j F Y - G:i'); ?>
                        </div>
                        <div class="section-options-item-text">
                        <?php the_excerpt(); ?>
                        <?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . __('more', 'tama') . '...</a>'; ?>
                        </div>
                    </div>
                </div>
			<?php endwhile; ?>
            </div>
        </div>
    </section><!-- #section options -->
    
	<section id="working" class="section-working">

        <div class="section-working-entry">
            <?php altss_insertable_text_block( 1 ); ?>
        </div>

    </section><!-- #section working -->
	
    