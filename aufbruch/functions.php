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


/****************************************************************************************/

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


/****************************************************************************************/

if ( ! function_exists( 'spacious_entry_meta' ) ) :
    /**
     * Shows meta information of post.
     */
    function spacious_entry_meta() {
        if ( 'post' == get_post_type() ) :
            echo '<footer class="entry-meta-bar clearfix">';
            echo '<div class="entry-meta clearfix">';

            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
            }
            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( 'c' ) ),
                esc_html( get_the_modified_date() )
            );
            printf( __( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></span>', 'spacious' ),
                esc_url( get_permalink() ),
                esc_attr( get_the_time() ),
                $time_string
            ); ?>

            <?php if( has_category() ) { ?>
            <span class="category"><?php the_category(', '); ?></span>
        <?php } ?>

            <?php if ( comments_open() ) { ?>
            <span class="comments"><?php comments_popup_link( __( 'No Comments', 'spacious' ), __( '1 Comment', 'spacious' ), __( '% Comments', 'spacious' ), '', __( 'Comments Off', 'spacious' ) ); ?></span>
        <?php } ?>

            <?php edit_post_link( __( 'Edit', 'spacious' ), '<span class="edit-link">', '</span>' ); ?>

            <?php if ( ( spacious_options( 'spacious_archive_display_type', 'blog_large' ) != 'blog_full_content' ) && !is_single() ) { ?>
            <span class="read-more-link"><a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'spacious' ); ?></a></span>
        <?php } ?>

            <?php
            echo '</div>';
            echo '</footer>';
        endif;
    }
endif;

/****************************************************************************************/

add_action( 'wp_enqueue_scripts', 'aufbruch_scripts_method' );
/**
 * Register jquery scripts
 */
function aufbruch_scripts_method() {
    wp_enqueue_script( 'form_autofill', get_stylesheet_directory_uri() . '/form_autofill.js', array( 'jquery' ), false, true );
}
