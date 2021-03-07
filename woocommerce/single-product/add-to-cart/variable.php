<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>

		<!-- TITRE DU PRODUIT -->
		<div id="header-single-product" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/slash-wattever.svg')">
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
				<h1><?php the_title(); ?></h1>
			<?php } ?>
		</div>

		<!-- RESUME DU PRODUIT -->
		<div id="resume-single-product-summary">
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
				<p><?php echo types_render_field('accroche-produit'); ?></p>
			<?php } ?>
		</div>

		<!-- SCROLLDOWN OPTION BOOTSTRAP -->
		<div class="btn-group" id="option_box_product">
			<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php _e('Choisissez vos options','wattever2021'); ?>
			</button>
			<div class="dropdown-menu scrollable-menu">
			<?php $option_ID = 1;
				$child_posts = toolset_get_related_posts( get_the_ID(), 'options-produits', array( 'query_by_role' => 'parent', 'return' => 'post_object' ) );
				foreach ($child_posts as $child_post) 
				{ ?>
				<div id="<?php echo  'optionProduct' . $option_ID; $option_ID++; ?>" class="row item_option_product">							
					<div class="col-2"><img src="<?php echo types_render_field('image-option', array("id"=> "$child_post->ID", "output" => "raw", "size" => "full")); ?>" alt="Pictogramme option"></div>
					<div class="col-8">
						<h3><?php echo types_render_field( "nom-option", array( "id"=> "$child_post->ID")); ?></h3>
						<p><?php echo types_render_field( "description-option", array( "id"=> "$child_post->ID")); ?></p>									
					</div>
					<div class="col-2"><?php echo types_render_field( "valeur-option", array( "id"=> "$child_post->ID")) . "€"; ?></div>
				</div>
			<?php } ?>
			</div>
		</div>

		<!-- SELECTEUR DE LA COULEUR -->
		<div id="selecteur-couleur-custom">
			<h2>Sélectionnez vos couleurs</h2>
			<div class="row">
				<div class="col-12 col-md-6">
					<h3>Couleur de l'eMott</h3>
					<div id="couleur-custom-emott">
						<?php $color_ID = 1;
								$couleurs_emott = toolset_get_related_posts( get_the_ID(), 'couleur-emott', array( 'query_by_role' => 'parent', 'return' => 'post_object' ) );
								foreach ($couleurs_emott as $couleur_emott) 
						{ ?>
							<img src="<?php echo types_render_field('image-couleur-emott', array("id"=> "$couleur_emott->ID", "output" => "raw", "size" => "full")); ?>" alt="" class="color-emott-number-<?php echo $color_ID; ?> color-emott">
						<?php $color_ID++; } ?>
					</div>
				</div>

				<div class="col-12 col-md-6">
					<h3>Couleur du covering</h3>
					<div id="couleur-custom-covering">
						<?php $color_ID = 1;
								$couleurs_covering = toolset_get_related_posts( get_the_ID(), 'couleur-covering', array( 'query_by_role' => 'parent', 'return' => 'post_object' ) );
								foreach ($couleurs_covering as $couleur_covering) 
						{ ?>
							<img src="<?php echo types_render_field('image-couleur-covering', array("id"=> "$couleur_covering->ID", "output" => "raw", "size" => "full")); ?>" alt="" class="color-covering-number-<?php echo $color_ID; ?> color-covering">
						<?php $color_ID++; } ?>
					</div>
				</div>
			</div>
		</div>

		<!-- RECAPITULATIF DES OPTIONS CHOISIES -->
		<div id="recap_option_product">
			<h3><?php _e('Récapitulatif des options','wattever2021'); ?></h3>
			<div id="recap-button-option">
				<a class="btn btn-primary noOption"><?php _e('Aucune option sélectionnée','wattever2021'); ?></a>
			</div>
		</div>

		


		<!-- SCRIPT JS -->
		<script>
			var nbItemSelected = 0;

			// Affiche "Aucune option sélectionnée" dans le récapitulatif
			function displayRecap() {
				if (nbItemSelected > 0) {
					removeItemSelected("noOption");
				} else if (nbItemSelected == 0) {
					displayItemSelected("<?php _e('Aucune option sélectionnée','wattever2021'); ?>", "noOption");
				}
			}

			// Affiche dans le récap l'item sélectionné
			function displayItemSelected(nameOption, classOption) {
				var itemOption = document.createElement("a");
				itemOption.innerHTML = nameOption;
				itemOption.className = "btn btn-primary " + classOption;
				$("#recap_option_product div").append(itemOption);
			}

			// Supprime l'item du récap s'il est décoché
			function removeItemSelected(classOption) {
				$("." + classOption).remove();
			}


			// BOUCLE PHP POUR CHAQUE OPTION
			<?php 
			$optionIdBoolean = 1;
			$child_posts = toolset_get_related_posts( get_the_ID(), 'options-produits', array( 'query_by_role' => 'parent', 'return' => 'post_object' ) );
			foreach ($child_posts as $child_post) 
			//foreach ( $attributes as $attribute_name => $options )
			{
			?>

			// Supprimer étiquette récap au click
			$("#recap-button-option").on("click", "a.idProduct<?php echo $optionIdBoolean; ?>", () => {
				// Masque le sélecteur quand on choisit personnalisation de la couleur
				if ("<?php echo types_render_field( "custom-option-id", array( "id"=> "$child_post->ID")); ?>" == "personnalisation-de-la-couleur") {
						$("#selecteur-couleur-custom").css("display", "none");
						$(".color-emott").css("border", "none");
						$(".color-covering").css("border", "none");
						console.log(couleurEmottSelected);
						$(`:checkbox[value=${couleurEmottSelected}]`).prop("checked",false).trigger("change");
						$(`:checkbox[value=${couleurCoveringSelected}]`).prop("checked",false).trigger("change");
						couleurCoveringSelected = "couleur-covering-1";
						couleurEmottSelected = "couleur-emott-1";
						$(".color-emott-number-1").css("border", "2px solid blue");
						$(":checkbox[value=couleur-emott-1]").prop("checked",true).trigger("change");
						$(".color-covering-number-1").css("border", "2px solid blue");
						$(":checkbox[value=couleur-covering-1]").prop("checked",true).trigger("change");
					}

				$(".idProduct<?php echo $optionIdBoolean; ?>").remove();
				$("#optionProduct<?php echo $optionIdBoolean; ?>").css("display", "");
				$(":checkbox[value=<?php echo types_render_field( "custom-option-id", array( "id"=> "$child_post->ID")); ?>]").prop("checked",false).trigger("change");
				booleanOption<?php echo $optionIdBoolean; ?> = false;
				nbItemSelected--;
				displayRecap();

				var priceValue = $("p.price span.amount").text()
				$("#price-total").text("Total : " + priceValue);
			});

			// Sélection des options dans la liste
			var booleanOption<?php echo $optionIdBoolean; ?> = false;

			$("#optionProduct<?php echo $optionIdBoolean; ?>").on("click", () => {
				if (booleanOption<?php echo $optionIdBoolean; ?> == false) {
					// Affiche le sélecteur quand on choisit personnalisation de la couleur
					if ("<?php echo types_render_field( "custom-option-id", array( "id"=> "$child_post->ID")); ?>" == "personnalisation-de-la-couleur") {
						$("#selecteur-couleur-custom").css("display", "block");
					}

					$("#optionProduct<?php echo $optionIdBoolean; ?>").css("display", "none");

					$(":checkbox[value=<?php echo types_render_field( "custom-option-id", array( "id"=> "$child_post->ID")); ?>]").prop("checked",true).trigger("change");

					booleanOption<?php echo $optionIdBoolean; ?> = true;

					nbItemSelected++;
					displayRecap();
					displayItemSelected("<?php echo types_render_field( "nom-option", array( "id"=> "$child_post->ID")); ?> <img src='<?php echo get_template_directory_uri(); ?>/assets/img/icons/x-mark.svg' width='15px' alt=''/>", "idProduct<?php echo $optionIdBoolean; ?>");

					var priceValue = $("p.price span.amount").text()
					$("#price-total").text("Total : " + priceValue);
					
				}
			});

			<?php $optionIdBoolean++; } ?>

			// SELCTEUR DE COULEUR
			// Couleur emott
			<?php $color_ID = 1;
								$couleurs_emott = toolset_get_related_posts( get_the_ID(), 'couleur-emott', array( 'query_by_role' => 'parent', 'return' => 'post_object' ) );
								foreach ($couleurs_emott as $couleur_emott) 
						{ ?>
				var couleurEmottSelected = "couleur-emott-1";
				$(".color-emott-number-<?php echo $color_ID; ?>").on("click", () => {
					$(`:checkbox[value=${couleurEmottSelected}]`).prop("checked",false).trigger("change");
					couleurEmottSelected = "<?php echo types_render_field( "id-couleur-emott", array( "id"=> "$couleur_emott->ID")); ?>";
					$(`:checkbox[value=${couleurEmottSelected}]`).prop("checked",true).trigger("change");
					$(".color-emott").css("border", "none");
					$(".color-emott-number-<?php echo $color_ID; ?>").css("border", "2px solid blue");
				});
			<?php $color_ID++; } ?>

			// Couleur covering
			<?php $color_covering_ID = 1;
								$couleurs_covering_emott = toolset_get_related_posts( get_the_ID(), 'couleur-covering', array( 'query_by_role' => 'parent', 'return' => 'post_object' ) );
								foreach ($couleurs_covering_emott as $couleur_covering_emott) 
						{ ?>
				var couleurCoveringSelected = "couleur-covering-1";
				$(".color-covering-number-<?php echo $color_covering_ID; ?>").on("click", () => {
					$(`:checkbox[value=${couleurCoveringSelected}]`).prop("checked",false).trigger("change");
					couleurCoveringSelected = "<?php echo types_render_field( "id-couleur-covering", array( "id"=> "$couleur_covering_emott->ID")); ?>";
					$(`:checkbox[value=${couleurCoveringSelected}]`).prop("checked",true).trigger("change");
					$(".color-covering").css("border", "none");
					$(".color-covering-number-<?php echo $color_covering_ID; ?>").css("border", "2px solid blue");
				});
			<?php $color_covering_ID++; } ?>

			// AFFICHAGE DU PRIX
			$(document).ready(function() {
				setTimeout(
				function() 
				{
					$(".color-emott-number-1").css("border", "2px solid blue");
					$(":checkbox[value=couleur-emott-1]").prop("checked",true).trigger("change");
					$(".color-covering-number-1").css("border", "2px solid blue");
					$(":checkbox[value=couleur-covering-1]").prop("checked",true).trigger("change");
					var priceValue = $("p.price span.amount").text();
					$("#price-total").text("<?php _e('Total','wattever2021'); ?> : " + priceValue);
				}, 500);
			 });
		</script>


		<!-- SYSTEME DE PRIX AVEC LES VARIATIONS -->
		<table class="variations table" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></td>
						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
								echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<!-- AFFICHAGE PRIX TOTAL -->
		<div id="price-total"></div>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
