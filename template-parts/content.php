<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wattever2021
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- <header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				wattever2021_posted_on();
				wattever2021_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header> -->

<!-- WP QUERY -->
<?php
                    $args = array(
                        'post_type' => 'product',
                        'status' => 'publish',
                        'posts_per_page' => '1',
                        'offset' => '0',
                        'orderby' => 'ID',
                        'order' => 'DESC',
                    );
                    $my_query = new WP_Query($args);
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
    ?>
		<div id="banner-single-product" style="background-image: url('<?php 
		echo types_render_field('banniere-image', array("output"=>"raw", "size"=>"custom"));?>')"></div>
	<?php } ?>

	<?php wattever2021_post_thumbnail(); ?>

	<div class="container">
		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wattever2021' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wattever2021' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">
		<?php wattever2021_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
