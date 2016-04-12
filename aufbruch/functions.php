<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}

add_action( 'spacious_footer_copyright', 'spacious_footer_copyright', 10 );
/**
 * function to show the footer info, copyright information
 */
if ( ! function_exists( 'spacious_footer_copyright' ) ) :
    function spacious_footer_copyright() {
        $site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';

        $wp_link = '<a href="'.esc_url( 'http://wordpress.org' ).'" target="_blank" title="' . esc_attr__( 'WordPress', 'spacious' ) . '"><span>' . __( 'WordPress', 'spacious' ) . '</span></a>';

        $tg_link =  '<a href="'.esc_url( 'http://themegrill.com/themes/spacious' ).'" target="_blank" title="'.esc_attr__( 'ThemeGrill', 'spacious' ).'" rel="designer"><span>'.__( 'ThemeGrill', 'spacious') .'</span></a>';

        $default_footer_value = sprintf( __( 'Copyright &copy; %1$s %2$s.', 'spacious' ), date( 'Y' ), $site_link ).'. <a href="http://creativecommons.org/licenses/by-nc-nd/4.0/">cc by-nc-nd</a>. '.sprintf( __( 'Powered by %s.', 'spacious' ), $wp_link ).' '.sprintf( __( 'Theme: %1$s by %2$s.', 'spacious' ), 'Spacious', $tg_link );

        $spacious_footer_copyright = '<div class="copyright">'.$default_footer_value.'</div>';
        echo $spacious_footer_copyright;
    }
endif;
