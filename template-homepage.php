<?php

/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header();
?>



<!-- CONTENU -->
<main id="content-homepage">
    <!-- BANNIERE -->
    <section>
        <div class="banniere-slider">
            <!-- WP QUERY -->
            <?php
            $args = array(
                'post_type' => 'diaporama',
                'status' => 'publish',
                'posts_per_page' => '3',
                'offset' => '0',
                'orderby' => 'ID',
                'order' => 'DESC',
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) {
                $my_query->the_post();
                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            ?>
                <div class="banniere-item" style="background-image: url('<?php echo $feat_image; ?>')">
                    <!-- <?php the_post_thumbnail('Galerie 1920x700'); ?> -->
                    <div class="title-banner">
                        <h1><?php echo types_render_field('title-slide'); ?></h1>
                    </div>
                        <div class="commanderButton">
                            <!-- WP QUERY -->
                            <?php
                            $argsShop = array(
                                'post_type' => 'product',
                                'status' => 'publish',
                                'posts_per_page' => '1',
                                'offset' => '0',
                                'orderby' => 'ID',
                                'order' => 'DESC',
                            );
                            $my_queryShop = new WP_Query($argsShop);
                            while ($my_queryShop->have_posts()) {
                                $my_queryShop->the_post();
                            ?>
                                <a href="<?php echo get_permalink( $post->ID ); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg> <?php _e('Commander','wattever2021'); ?></a>
                            <?php } ?>
                        </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- DESCRIPTION PRODUITS -->
    <section id="description_produit">
        <div class="container">
            <div class="row">

                <!-- WP QUERY -->
                <?php
                $args = array(
                    'post_type' => 'univers-produit',
                    'status' => 'publish',
                    'posts_per_page' => '3',
                );
                $my_query = new WP_Query($args);
                while ($my_query->have_posts()) {
                    $my_query->the_post();

                ?>

                    <div class="col-12 col-md-4 description-card">
                        <div class="img_texte">

                            <?php the_post_thumbnail('Galerie 400x500'); ?>

                            <div class="legende_img">
                                <span><?php echo types_render_field('categorie-produit');?></span>
                                <a href="<?php echo get_permalink( $post->ID ); ?>">></a>
                            </div>
                        </div>

                        <h2 class="title_description_product" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/slash-wattever.svg')">
                            <?php echo types_render_field('titre-description-1'); ?> <br>
                            <?php echo types_render_field('titre-description-2'); ?>
                        </h2>
                        <p>
                            <?php the_content(); ?>
                        </p>

                    </div>
                <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <!-- EN SITUATION -->
    <section id="situation-products">
        <div class="row">
            <div class="col-md-6" id="situation-center-title">
                <div class="situation_title">
                    <h2><span><?php _e('L\'emott','wattever2021'); ?></span><br> <?php _e('En situation','wattever2021'); ?></h2>
                </div>
            </div>
            <div class="col-md-6">
                <div id="situation_a_la_une">
                    <!-- WP QUERY -->
                    <?php
                    $args = array(
                        'post_type' => 'situation',
                        'status' => 'publish',
                        'posts_per_page' => '1',
                        'offset' => '3',
                        'orderby' => 'ID',
                        'order' => 'DESC',
                    );
                    $my_query = new WP_Query($args);
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                    ?>
                        <?php the_post_thumbnail('Galerie 600x330'); ?>
                        <div>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    <?php
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>

        <!-- Slider des articles de mise en situation -->
        <div class="situation-slider">
            <!-- WP QUERY -->
            <?php
            $args = array(
                'post_type' => 'situation',
                'status' => 'publish',
                'posts_per_page' => '-1',
                'offset' => '0',
                'orderby' => 'ID',
                'order' => 'DESC',
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) {
                $my_query->the_post();
            ?>
                <div class="slider-item-situation <?php $terms = wp_get_post_terms($post->ID, 'categorie-situation'); foreach($terms as $term) { echo $term->slug . ' '; } ?>">
                    <?php the_post_thumbnail('Galerie 570x570'); ?>
                    
                    <div>
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_excerpt(); ?></p>
                    </div>

                </div>
            <?php } ?>
        </div>
        <div id="filter-situations">
            <a id="tous-filter"><?php _e('Tous','wattever2021'); ?></a>
            <a id="tout-chemin-filter"><?php _e('Tout chemin','wattever2021'); ?></a>
            <a id="montagne-filter"><?php _e('Montagne','wattever2021'); ?></a>
            <a id="littoral-filter"><?php _e('Littoral','wattever2021'); ?></a>
            <a id="neige-filter"><?php _e('Neige','wattever2021'); ?></a>
        </div>
    </section>

    <!-- CONCEPTION -->
    <section id="conception">
        <div id="detail-conception">
            <div id="detail-conception-title">
            <!-- WP QUERY -->
            <?php
                $args = array(
                    'post_type' => 'conception',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie_conception',
                            'field' => 'slug',
                            'terms' => 'titre_conception'
                        )
                    ),
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
                    <h2><span><?php _e('Une conception','wattever2021'); ?></span><br> <?php _e('française','wattever2021'); ?></h2>
                    <p><?php the_content(); ?></p>
                <?php } ?>
            </div>


            <div id="detail-conception-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bike-wattever.png" alt="Vélo WattEver">
            </div>
            <div id="detail-conception-description">
                <h3><?php _e('Points forts matériels','wattever2021'); ?></h3>
                <!-- LOOP DESCRIPTION -->
                <?php
                $args = array(
                    'post_type' => 'conception',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie_conception',
                            'field' => 'slug',
                            'terms' => 'materiel_conception'
                        )
                    ),
                    'status' => 'publish',
                    'posts_per_page' => '-1',
                );
                $my_query = new WP_Query($args);
                // Variable à incrémenter
                $idMarqueur = 1;
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                ?>
                    <div id="description-marqueur-<?php echo $idMarqueur; ?>" class="description-marqueur-conception">
                        <div>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                <?php $idMarqueur++;
                } ?>
            </div>

            <div class="form-group" id="detail-conception-dropdown">
                <select class="form-control" id="item-conception">
                <!-- LOOP DROPDOWN -->
                <?php
                $args = array(
                    'post_type' => 'conception',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie_conception',
                            'field' => 'slug',
                            'terms' => 'materiel_conception'
                        )
                    ),
                    'status' => 'publish',
                    'posts_per_page' => '-1',
                );
                $my_query = new WP_Query($args);
                // Variable à incrémenter
                $idMarqueur = 1;
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                ?>
                    <option value="value-marqueur-<?php echo $idMarqueur; ?>"><?php the_title(); ?></option>
                <?php $idMarqueur++;
                } ?>
                </select>
            </div>

            <!-- LOOP MARQUEUR -->
            <?php
                $args = array(
                    'post_type' => 'conception',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie_conception',
                            'field' => 'slug',
                            'terms' => 'materiel_conception'
                        )
                    ),
                    'status' => 'publish',
                    'posts_per_page' => '-1',
                );
                $my_query = new WP_Query($args);
                // Variable à incrémenter
                $idMarqueur = 1;
                while ($my_query->have_posts()) {
                    $my_query->the_post();
            ?>
                <!-- Marqueur des éléments du vélo -->
                <div id="marqueur-<?php echo $idMarqueur; ?>" class="marqueur-conception"></div>
            <?php $idMarqueur++;
                } ?>

            <!-- SCRIPT JS MARQUEUR -->
            <script>
            // Boucle pour chaque marqueur
            <?php
                $args = array(
                    'post_type' => 'conception',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie_conception',
                            'field' => 'slug',
                            'terms' => 'materiel_conception'
                        )
                    ),
                    'status' => 'publish',
                    'posts_per_page' => '-1',
                );
                $my_query = new WP_Query($args);
                // Variable à incrémenter
                $idMarqueur = 1;
                while ($my_query->have_posts()) {
                    $my_query->the_post();
            ?>
                // Call function display si description hover
                $("#description-marqueur-<?php echo $idMarqueur; ?>").hover(() => {
                    displayMarqueur(<?php echo $idMarqueur; ?>);
                });

                // Call function display si option dropdown cliqué
                $("#item-conception").on('change', () => {
                    if ($("#item-conception").val() == "value-marqueur-<?php echo $idMarqueur; ?>") {
                        displayMarqueur(<?php echo $idMarqueur; ?>);
                    }
                });
            <?php $idMarqueur++;
                } ?>

                // Fonction Affiche le marqueur sélectionné
                function displayMarqueur(idTracker) {
                    // Modifie background de la description sélectionné
                    $(".description-marqueur-conception").css("background", "transparent");
                    $("#description-marqueur-" + idTracker).css("background", "rgba(255, 255, 255, 0.3")

                    // Affiche le marqueur lié à la description
                    $(".marqueur-conception").css("display", "none");
                    $("#marqueur-" + idTracker).css("display", "block");
                }
            </script>
        </div>
    </section>

    <!-- DETAILS TECHNIQUES -->
    <section id="detail-technique">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 detail-slash" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/slash-wattever.svg')">
                <!-- WP QUERY -->
                        <?php
                        $args = array(
                            'post_type' => 'technique',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categorie_technique',
                                    'field' => 'slug',
                                    'terms' => 'titre_technique'
                                )
                            ),
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
                    <h3><?php _e('Détails techniques','wattever2021'); ?></h3>
                </div>
                <div class="col-lg-8" id="description-title-technique">
                    <?php the_content(); ?>  
                </div>
                <?php } ?>
            </div>

            <div class="row" id="critere_technique">
                <!-- WP QUERY -->
                <?php
                $args = array(
                    'post_type' => 'technique',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie_technique',
                            'field' => 'slug',
                            'terms' => 'detail_technique'
                        )
                    ),
                    'status' => 'publish',
                    'posts_per_page' => '-1',
                    'offset' => '0',
                    'orderby' => 'ID',
                    'order' => 'ASC',
                );
                $my_query = new WP_Query($args);
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                ?>
                    <div class="col-lg-4 col-sm-6 critere-item">
                        <div class="row">
                            <div class="col-3">
                            <img src="<?php echo types_render_field('pictogramme-detail', array( "output" => "raw", "size" => "full")); ?>" alt="Pictogramme option">
                            </div>
                            <div class="col-9">
                                <h4><?php the_title(); ?></h4>
                                <p><?php the_content(); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- TEAM WATTEVER -->
    <section id="team-wattever">
        <div class="container">
            <!-- WP QUERY -->
            <?php
            $args = array(
                'post_type' => 'equipe',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie_team',
                        'field' => 'slug',
                        'terms' => 'titre_team'
                    )
                ),
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
                <div id="background-team" style="background-image: url('<?php echo $feat_image; ?>')">
                    <div class="row">
                        <div class="col-lg-5">
                            <h2><?php _e('L\'équipe wattever','wattever2021'); ?></h2>
                            <p><?php echo types_render_field('presentation-team'); ?></p>
                        
                        <div id="voir-plus-team">
                            <a href="<?php echo get_permalink( $post->ID ); ?>"><?php _e('Voir plus','wattever2021'); ?> ></a>
                        </div>
            <?php } ?>
                        </div>
                        <div class="col-lg-6" id="rating_team">
                            <div class="row">
                                <div class="col-4" id="cascadeur">
                                    <span class="pourcentage">50%</span> <br> <?php _e('Cascadeurs','wattever2021'); ?>
                                </div>
                                <div class="col-4" id="sportif">
                                    <span class="pourcentage">75%</span> <br> <?php _e('Sportifs','wattever2021'); ?>
                                </div>
                                <div class="col-4" id="passion">
                                    <span class="pourcentage">100%</span> <br><span id="passion-uppercase"><?php _e('Passionnés','wattever2021'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </section>

    <!-- PRESENTATION DES MEMBRES DE L'EQUIPE -->
    <section id="presentation-team">
        <div class="container">
            <div class="row">
                <!-- WP QUERY -->
                <?php
                $membreCounter = 1;
                $args = array(
                    'post_type' => 'equipe',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categorie_team',
                            'field' => 'slug',
                            'terms' => 'membre_team'
                        )
                    ),
                    'status' => 'publish',
                    'posts_per_page' => '-1',
                );
                $my_query = new WP_Query($args);
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                ?>
                    <div class="col-lg-3">
                        <div class="membre <?php echo "membreTeam" . $membreCounter; ?>">
                            <div class="membre-img">
                                <?php the_post_thumbnail('Galerie 400x500'); ?>
                            </div>
                            <div class="description-membre">
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo types_render_field("poste-membre"); ?></p>
                            </div>
                            <!-- <div class="membre-network">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-twitter-white.svg" alt="Icone twitter">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-instagram-white.svg" alt="Icone instagram">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-facebook-white.svg" alt="Icone facebook">
                            </div> -->
                            <div class="membre-hover">
                                <div class="membre-hover-content">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                $membreCounter++;
                } ?>
            </div>
        </div>
    </section>

    <!-- AMBASSADEUR WATTEVER -->
    <section id="ambassadeur">
        <div class="container">
            <h2><?php _e('Nos ambassadeurs','wattever2021'); ?></h2>
            <div id="typo_wattever">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/typo-whatever.png" alt="Logo Wattever">
            </div>
        </div>

        <!-- Slider des ambassadeurs -->
        <div class="ambassadeur-slider">
            <!-- WP QUERY -->
            <?php
            $args = array(
                'post_type' => 'ambassadeur',
                'status' => 'publish',
                'posts_per_page' => '-1',
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) {
                $my_query->the_post();
            ?>
                <div class="slider-item-ambassadeur">
                    <div class="social-network">
                        <div class="row">
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-twitter.svg" alt="icone twitter"></a>
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-instagram.svg" alt="icone instagram"></a>
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-facebook.svg" alt="icone facebook"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="image-profil">
                                <?php the_post_thumbnail('Profil 50px'); ?>
                            </div>
                        </div>
                        <div class="col-9 description-profil">
                            <h3><?php the_title(); ?></h3>
                            <h4><?php echo types_render_field('type-ambassadeur'); ?></h4>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- ACTUALITES -->
    <section id="actualites">
        <div class="container">
            <div class="row">
                <div class="col-md-4 slash-actualite" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/slash-wattever.svg')">
                    <h2><?php _e('Actualités','wattever2021'); ?></h2>
                </div>
                <div class="col-md-8" id="actualites-undertitle">
                    <!-- WP QUERY -->
                <?php
                    $args = array(
                        'post_type' => 'actualites',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categorie',
                                'field' => 'slug',
                                'terms' => 'titre'
                            )
                        ),
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
                        <div>
                            <p><?php the_content(); ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Liste des articles -->
            <div id="article-actualites">
                <div class="column">
                    <div class="article-item1">
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
                            'posts_per_page' => '1',
                            'offset' => '0',
                            'orderby' => 'ID',
                            'order' => 'DESC',
                        );
                        $my_query = new WP_Query($args);
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                        ?>
                            <?php the_post_thumbnail('Galerie 1000x1000'); ?>
                            <div class="article-network">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-twitter-white.svg" alt="Icone twitter"></a>
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-instagram-white.svg" alt="Icone instagram"></a>
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-facebook-white.svg" alt="Icone facebook"></a>
                            </div>
                            <div class="description-article">
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo types_render_field("phrase-accroche-article"); ?></p>
                            </div>

                            <div class="hover-article">
                                <div class="description-hover">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php
                                        $content = types_render_field("resume-article");
                                        $content = strip_tags($content);
                                        echo substr($content, 0, 350) . " ...";
                                        ?></p>
                                </div>
                                <div class="link-hover">
                                    <a href="<?php echo get_permalink( $post->ID ); ?>"><?php _e('Lire la suite','wattever2021'); ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="column">
                    <div class="article-item2">
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
                            'posts_per_page' => '1',
                            'offset' => '1',
                            'orderby' => 'ID',
                            'order' => 'DESC',
                        );
                        $my_query = new WP_Query($args);
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                        ?>
                            <?php the_post_thumbnail('Galerie 1000x396'); ?>
                            <div class="article-network">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-twitter-white.svg" alt="Icone twitter"></a>
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-instagram-white.svg" alt="Icone instagram"></a>
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-facebook-white.svg" alt="Icone facebook"></a>
                            </div>
                            <div class="description-article">
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo types_render_field("phrase-accroche-article"); ?></p>
                            </div>
                            <div class="hover-article">
                                <div class="description-hover">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php
                                        $content = types_render_field("resume-article");
                                        $content = strip_tags($content);
                                        echo substr($content, 0, 350) . " ...";
                                        ?></p>
                                </div>
                                <div class="link-hover">
                                    <a href="<?php echo get_permalink( $post->ID ); ?>"><?php _e('Lire la suite','wattever2021'); ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="article-item3">
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
                            'posts_per_page' => '1',
                            'offset' => '2',
                            'orderby' => 'ID',
                            'order' => 'DESC',
                        );
                        $my_query = new WP_Query($args);
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                        ?>
                            <?php the_post_thumbnail('Galerie 1000x596'); ?>
                            <div class="article-network">
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-twitter-white.svg" alt="Icone twitter"></a>
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-instagram-white.svg" alt="Icone instagram"></a>
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/socials/icon-facebook-white.svg" alt="Icone facebook"></a>
                            </div>
                            <div class="description-article">
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo types_render_field("phrase-accroche-article"); ?></p>
                            </div>
                            <div class="hover-article">
                                <div class="description-hover">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php
                                        $content = types_render_field("resume-article");
                                        $content = strip_tags($content);
                                        echo substr($content, 0, 350) . " ...";
                                        ?></p>
                                </div>
                                <div class="link-hover">
                                    <a href="<?php echo get_permalink( $post->ID ); ?>"><?php _e('Lire la suite','wattever2021'); ?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ON VOUS SUIT -->
    <section id="gallery">
        <div class="row">
            <div class="col-lg-6" id="gallery-center-title">
                <div class="gallery_title">
                    <h2><span><?php _e('Nous aussi','wattever2021'); ?></span><br> <?php _e('On vous suit','wattever2021'); ?></h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row" id="photo_a_la_une">
                    <!-- Contenu rempli en jquery -->
                </div>
            </div>
        </div>

        <!-- Slider des photos de la communautéee -->
        <div class="follow-slider">
            <!-- Contenu rempli en jquery -->
        </div>
    </section>

    <div>
        <ul id="instagram">

        </ul>
    </div>

    <section id="contact-homepage">
        <div id="background-contact">
            <div class="container">
                <?php Ninja_Forms()->display( 3 ); ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
