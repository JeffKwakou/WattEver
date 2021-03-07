<?php

/**
 * The template for displaying the professionnels page.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: professionnels
 *
 * @package storefront
 */

get_header();
?>

<!-- CONTENU -->
<main>
    <div id="space_banniere"></div>
    <!-- WP QUERY -->
    <?php
            $args = array(
                'post_type' => 'post_professionnels',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie-professionnels',
                        'field' => 'slug',
                        'terms' => 'titre_professionnels',
                    )
                ),
                'status' => 'publish',
                'posts_per_page' => '1',
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) {
                $my_query->the_post();
                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            ?>
    <section id="professionnels_banniere" style="background-image: url('<?php echo $feat_image; ?>')">
            <?php
                }
            ?>
        <div class="container">
            <h1><span><?php _e('L\'eMott pour les','wattever2021'); ?></span><br> <?php _e('Professionnels','wattever2021'); ?></h1>
        </div>
    </section>

    <section id="professionnels_content">
        <div class="container">
            <div id="description_professionnels">

                <!-- WP QUERY -->
                <?php
                $args = array(
                    'post_type' => 'post_professionnels',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie-professionnels',
                            'field' => 'slug',
                            'terms' => 'description_professionnels',
                        )
                    ),
                    'status' => 'publish'
                );
                $my_query = new WP_Query($args);
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                ?>
                <h2><?php the_title(); ?></h2>
                <p><?php the_content(); ?></p>
                <?php
                }
                ?>
            </div>


            <div id="detail_professionnels">
                <!-- WP QUERY -->
                <?php
                $order_content = 1;
                $args = array(
                    'post_type' => 'post_professionnels',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie-professionnels',
                            'field' => 'slug',
                            'terms' => 'article_professionnels',
                        )
                    ),
                    'status' => 'publish',
                    'posts_per_page' => '6',
                    'orderby' => 'ID',
                    'order' => 'DESC',
                );
                $my_query = new WP_Query($args);
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                ?>
                <div>
                    <div class="row">
                        <div class="col-12 col-md-6 detail_titre_professionnels <?php if ($order_content % 2 == 0) { echo "order-md-2"; } ?>">
                            <?php the_post_thumbnail('Galerie 570x300'); ?>
                        </div>
                        <div class="col-12 col-md-6 detail_content_professionnels <?php if ($order_content % 2 == 0) { echo "order-md-1"; } ?>">
                            <div>
                                <div class="professionnels-slash-title" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/slash-wattever.svg')">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div>
                                   <p><?php the_content(); ?></p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $order_content++;
                }
                ?>
            </div>
            

            <div id="professionnels_tarif">
                <h3><?php _e('A partir de 400€ HT / mois','wattever2021'); ?></h3>
                <p><?php _e('Possibilité d\'achat en fin de location','wattever2021'); ?></p>
                <div>
                    <a href="<?php echo get_permalink( 202 ); ?>"><?php _e('Contactez-nous','wattever2021'); ?></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();