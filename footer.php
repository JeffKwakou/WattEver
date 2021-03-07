<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wattever2021
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div id="footer-social-network">
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-twitter.svg" alt="icone twitter"></a>
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-instagram.svg" alt="icone instagram"></a>
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-facebook.svg" alt="icone facebook"></a>
			</div>
			<div class="row">
				<div class="col-12 col-md-4">
					<h4><?php _e('Infos','wattever2021') ?></h4>
					<ul>
						<li><span class="label-bold"><?php _e('Téléphone','wattever2021'); ?> :</span> +33 (0)5 62 10 18 76</li>
						<li><a href="#">Mentions légales</a></li>
						<li><a href="#">Politique de confidentialité</a></li>
						<li><a href="#">CGV</a></li>
						<li><a href="#">test CI</a></li>
					</ul>
				</div>
				<div class="col-12 col-md-4">
					
				</div>
				<div class="col-12 col-md-4">
						<h4><?php _e('Newsletter','wattever2021') ?></h4>
						<?php Ninja_Forms()->display( 4 ); ?>
				</div>
			</div>
			<div id="footer-signature">Designed and developped by <a href="https://www.digeek.fr/">Digeek</a></div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
