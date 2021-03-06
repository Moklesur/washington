<?php

/**
 *  Theme Functions
 */

// Header Social
add_action( 'washington_header_social', 'washington_header_social_widget' );
function washington_header_social_widget() {
    if(get_theme_mod('enable_social_settings')) :
        ?>
        <ul class="list-inline header-social text-right pull-right">
            <?php
            if(get_theme_mod('header_fb') ) {
                echo '<li><a href="'.esc_url(get_theme_mod('header_fb')).'"  target="_blank"><i class="fa fa-facebook"></i></a></li>';
            }
            if(get_theme_mod('header_tw')) {
                echo '<li><a href="'.esc_url(get_theme_mod('header_tw')).'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
            }
            if(get_theme_mod('header_li')) {
                echo '<li><a href="'.esc_url(get_theme_mod('header_li')).'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
            }
            if(get_theme_mod('header_pint')) {
                echo '<li><a href="'.esc_url(get_theme_mod('header_pint')).'" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
            }
            if(get_theme_mod('header_ins')) {
                echo '<li><a href="'.esc_url(get_theme_mod('header_ins')).'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
            }
            if(get_theme_mod('header_dri')) {
                echo '<li><a href="'.esc_url(get_theme_mod('header_dri')).'" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
            }
            if(get_theme_mod('header_plus')) {
                echo '<li><a href="'.esc_url(get_theme_mod('header_plus')).'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
            }
            if(get_theme_mod('header_you')) {
                echo '<li><a href="'.esc_url(get_theme_mod('header_you')).'" target="_blank"><i class="fa fa-youtube"></i></a></li>';
            }
            ?>
        </ul>
    <?php  endif;
}

## Breadcrumb ##
add_action( 'washington_title_breadcrumb', 'washington_after_header_breadcrumb' );
function washington_after_header_breadcrumb() {
    if (!is_front_page()): ?>
        <section class="breadcrumb-washington">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-sm-6">
                        <h4>
                            <?php if (is_home() && !is_front_page()) { ?>
                                <?php single_post_title(); ?>
                            <?php } elseif (class_exists('WooCommerce') && is_woocommerce() ) { ?>
                                <?php woocommerce_page_title(); ?>
                            <?php } elseif (is_archive()) { ?>
                                <?php the_archive_title(); ?>
                            <?php } elseif ( is_search() ) { ?>
                                <?php printf( esc_html__( 'Search Results for: %s', 'washington' ),  get_search_query() ); ?>
                            <?php } elseif (is_404()) { ?>
                                <?php esc_html_e('Error 404', 'washington'); ?>
                            <?php } else { ?>
                                <?php single_post_title(); ?>
                            <?php } ?>
                        </h4>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6 text-right breadcrumb-fix">
                        <?php washington_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
        </section><!-- Breadcrumbs -->
    <?php endif;
}

// Footer
## Widgets ##
add_action( 'washington_footer_widget', 'washington_footer_three_widget' );
function washington_footer_three_widget(){
    if ( (is_active_sidebar( 'footer-widget-1' )) || (is_active_sidebar( 'footer-widget-2' )) || (is_active_sidebar( 'footer-widget-3' )) || (is_active_sidebar( 'footer-widget-4' )) ) {?>
        <section class="footer-top">
            <div class="container-fluid">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-widget-1' ) ) {?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                        </div>
                    <?php } ?>
                    <?php if ( is_active_sidebar( 'footer-widget-2' ) ) {?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                        </div>
                    <?php } ?>
                    <?php if ( is_active_sidebar( 'footer-widget-3' ) ) {?>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                        </div>
                    <?php } ?>
                    <?php if ( is_active_sidebar( 'footer-widget-4' ) ) {?>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}