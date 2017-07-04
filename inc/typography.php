<?php
/**
 *  Typography
 */

function washington_typography($custom) {

    $custom = '';

    // General
    $layout_wrap = get_theme_mod( 'layout', '1170' );
    $custom .= ".container-fluid,#container { max-width:" . intval($layout_wrap) . "px;}";
    $margin_top = get_theme_mod( 'margin_top', '60' );
    $custom .= ".margin-top-60 ,#container{ margin-top:" . intval($margin_top) . "px;}";
    $margin_bottom = get_theme_mod( 'margin_bottom', '60' );
    $custom .= ".content-area,#container { margin-bottom:" . intval($margin_bottom) . "px;}";

    // Color

    ## General Color ##

    $body_text_color = get_theme_mod( 'body_text_color', '#a1b1bc' );

    $custom .= "a,body,.navbar-default .navbar-nav>li>a { color:" . esc_attr($body_text_color) . "}";

    $link_color = get_theme_mod( 'link_color', '#a1b1bc' );

    $custom .= ".dropdown-menu>li>a,.read-more,.sidebar-fix a,.post-items .entry-title a { color:" . esc_attr($link_color) . "}";
    $link_hover_color = get_theme_mod( 'link_hover_color', '#1bbc9b' );

    $custom .= ".sidebar-fix a:hover,.post-items .entry-title a:hover,.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover,.read-more:hover,.logo a:hover,a:hover { color:" . esc_attr($link_hover_color) . "}";

    $heading_color = get_theme_mod( 'heading_color', '#2c3e50' );

    $custom .= "h1,h2,h3,h4,h5,h6, .site-title a, .site-description { color:" . esc_attr($heading_color) . "}";

    ## Default Button Color ##

    $default_text_color = get_theme_mod( 'default_text_color', '#fff' );
    $default_bg_color = get_theme_mod( 'default_bg_color', '#2c3e50' );
    $default_border_color = get_theme_mod( 'default_border_color', '#2c3e50' );
    $custom .= ".wpcf7-form .wpcf7-submit,.camera_wrap .slider-button .btn-default,.search-submit,.form-submit input,.btn-default, .btn-default.disabled{ background-color:" . esc_attr($default_bg_color) . "; color: " . esc_attr($default_text_color) . ";border-color: " . esc_attr($default_border_color) . "; } ";

    $default_hover_text_color = get_theme_mod( 'default_hover_text_color', '#fff' );
    $default_hover_bg_color = get_theme_mod( 'default_hover_bg_color', '#1bbc9b' );
    $default_hover_border_color = get_theme_mod( 'default_hover_border_color', '#1bbc9b' );
    $custom .= ".wpcf7-form .wpcf7-submit:hover,.camera_wrap .slider-button .btn-default:hover,.form-submit input:hover,.form-submit input:focus,.btn-default.active, .btn-default.focus, .btn-default:active, .btn-default:focus, .btn-default:hover, .open>.dropdown-toggle.btn-default{ background-color:" . esc_attr($default_hover_bg_color) . "; color: " . esc_attr($default_hover_text_color) . ";border-color: " . esc_attr($default_hover_border_color) . "; } ";

    ## Primary Button Color ##
    $btn_primary_bg = get_theme_mod( 'primary_bg_color', '#1bbc9b' );
    $btn_primary_text = get_theme_mod( 'primary_text_color', '#fff' );
    $btn_primary_border = get_theme_mod( 'primary_border_color', '#1bbc9b' );

    $custom .= ".camera_wrap .slider-button .btn-primary,.btn-primary, .btn-primary.disabled,.sidebar-fix .search-form .search-submit{ background-color:" . esc_attr($btn_primary_bg) . "; color: " . esc_attr($btn_primary_text) . ";border-color: " . esc_attr($btn_primary_border) . "; } ";

    $btn_primary_bg_hover = get_theme_mod( 'btn_primary_bg_hover', '#003b64' );
    $btn_primary_text_hover = get_theme_mod( 'btn_primary_text_hover', '#fff' );
    $btn_primary_border_hover = get_theme_mod( 'btn_primary_border_hover', '#003b64' );

    $custom .= ".camera_wrap .slider-button .btn-primary:hover,.btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open>.dropdown-toggle.btn-primary,.sidebar-fix .search-form .search-submit:hover,.search-submit:hover,.search-submit:focus{ background-color:" . esc_attr($btn_primary_bg_hover) . "; color: " . esc_attr($btn_primary_text_hover) . ";border-color: " . esc_attr($btn_primary_border_hover) . "; } ";

    ## Success Button Color ##
    $btn_success_bg = get_theme_mod( 'success_bg_color', '#ed1b2e' );
    $btn_success_text = get_theme_mod( 'btn_success_text', '#fff' );
    $btn_success_border = get_theme_mod( 'success_border_color', '#ed1b2e' );

    $custom .= ".camera_wrap .slider-button .btn-success,.btn-success,.btn-success.disabled{ background-color:" . esc_attr($btn_success_bg) . "; color: " . esc_attr($btn_success_text) . ";border-color: " . esc_attr($btn_success_border) . "; } ";

    $btn_success_bg_hover = get_theme_mod( 'btn_success_bg_hover', '#0033a1' );
    $btn_success_text_hover = get_theme_mod( 'btn_success_text_hover', '#fff' );
    $btn_success_border_hover = get_theme_mod( 'btn_success_border_hover', '#0033a1' );

    $custom .= ".camera_wrap .slider-button .btn-success:hover,.btn-success.active, .btn-success.focus, .btn-success:active, .btn-success:focus, .btn-success:hover, .open>.dropdown-toggle.btn-success{ background-color:" . esc_attr($btn_success_bg_hover) . "; color: " . esc_attr($btn_success_text_hover) . ";border-color: " . esc_attr($btn_success_border_hover) . "; } ";

    // Typography

    $body_font_family = get_theme_mod('body_font_family');
    if ( $body_font_family !='' ) {
        $custom .= "body{ font-family:" . $body_font_family . ";}";
    }else{
        $custom .= "body{ font-family: 'Lato', sans-serif;}";
    }
    $heading_font_family = get_theme_mod('heading_font_family');
    if ( $heading_font_family !='' ) {
        $custom .= "h1,h2,h3,h4,h5,h6{ font-family:" . $heading_font_family . ";}";
    }else{
        $custom .= "h1,h2,h3,h4,h5,h6{ font-family: 'Lato', sans-serif;}";
    }

    //Output inline styles
    wp_add_inline_style( 'washington-style', $custom );
}
add_action( 'wp_enqueue_scripts', 'washington_typography' );