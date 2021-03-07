<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wattever2021
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) {
			the_post();
		?>

			<section id="article-section-layout">
				<div id="image-presentation-article"><?php the_post_thumbnail('Galerie 1920x400'); ?></div>

				<div class="container">
					<?php 
						$postType = get_post_type( $post->ID );
						if($postType == "actualites") {
					?>
						<div id="liste-article"><a href="<?php echo get_permalink( 277 ); ?>">Actualités ></a></div>
					<?php } ?>
					<h1><?php the_title(); ?></h1>
					<h2><?php echo types_render_field("phrase-accroche-article"); ?></h2>
					<?php 
						$postType = get_post_type( $post->ID );
						if($postType == "actualites") {
					?>
					<p>
						<span info-article-bold>By WattEver</span> le <?php echo types_render_field("date-redaction-article"); ?>
					</p>
					<?php } ?>
					<div id="content-article">
						<?php the_content(); ?>
					</div>
				</div>

			</section>
			

		<?php
		}
		?> 

	</main><!-- #main -->

<?php
get_footer();
