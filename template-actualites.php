<?php

/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `actualites` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Actualites
 *
 * @package storefront
 */

get_header();
?>

    <main>
        <section id="list-article-actualites">
            <div class="container">
                <h1>Actualités</h1>
                <!-- WP QUERY -->
                <?php
                        $args = array(
                            'post_type' => 'actualites',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categorie',
                                    'field' => 'slug',
                                    'terms' => 'article'
                                )
                            ),
                            'status' => 'publish',
                            'posts_per_page' => '-1',
                            'orderby' => 'ID',
                            'order' => 'DESC',
                        );
                        $my_query = new WP_Query($args);
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                ?>
                    <div class="item-article-list">
                        <div class="row">
                            <div class="col-md-6"><?php the_post_thumbnail('Galerie 600x330'); ?></div>
                            <div class="col-md-6">
                                <h2><?php the_title(); ?></h2>
                                <p><?php echo types_render_field("resume-article"); ?></p>
                                <div id="en-savoir-plus"><a href="<?php echo get_permalink( $post->ID ); ?>">En savoir plus</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
        </section>
    </main>

<?php
get_footer();