<?php

/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `tester` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Tester
 *
 * @package storefront
 */

get_header();
?>

    <main id="tester-section">
        <!-- WP QUERY -->
        <?php
            $args = array(
                'post_type' => 'tester-emott',
                'status' => 'publish',
                'posts_per_page' => '1',
                'offset' => '0'
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) {
                $my_query->the_post();
            ?>

        <div id="banniere-tester" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>')"></div>
        <div class="container">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php } ?>
            <?php Ninja_Forms()->display( 2 ); ?>
        </div>
    </main>

<?php
get_footer();