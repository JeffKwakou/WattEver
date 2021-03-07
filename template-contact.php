<?php

/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `contact` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Contact
 *
 * @package storefront
 */

get_header();
?>

    <main id="contact-form">
            <?php
            $args = array(
                'post_type' => 'contact-section',
                'status' => 'publish',
                'posts_per_page' => '1',
                'offset' => '0',
                'orderby' => 'ID',
                'order' => 'DESC',
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) {
                $my_query->the_post();
                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            ?>
        <div id="banniere-contact" style="background-image: url('<?php echo $feat_image; ?>')"></div>
        <?php } ?>
        <div class="container">
            <div>
                <p>
                    <h3>WattEver</h3>
                    <span class="label-bold"><?php _e('Adresse','wattever2021'); ?> :</span> 7 rue du Cassé, 31240 Saint-Jean <br>
                    <span class="label-bold"><?php _e('Email','wattever2021'); ?> :</span> info@watt-ever.com <br>
                    <span class="label-bold"><?php _e('Téléphone','wattever2021'); ?> :</span> +33 (0)5 62 10 18 76 <br>
                    <span class="label-bold"><?php _e('Téléphone commercial','wattever2021'); ?> :</span> +33 (0)6 49 57 93 04
                </p>
            </div>

            <h2><?php _e('Formulaire de contact','wattever2021'); ?></h2>
            <p><?php _e('Vous avez des questions ou des suggestions ? N\'hésitez pas à nous contacter','wattever2021'); ?></p>
            <?php Ninja_Forms()->display( 1 ); ?>
        </div>
    </main>

<?php
get_footer();