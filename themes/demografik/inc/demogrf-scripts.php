<?php
/**
 * Enqueue scripts and styles.
 */
function demografik_scripts() {
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), _S_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'b4', get_template_directory_uri() . '/assets/css/b4.css', array(), _S_VERSION );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), _S_VERSION );
    wp_enqueue_style( 'flickity', get_template_directory_uri() . '/assets/css/flickity.css', array(), _S_VERSION );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'redisgn', 'https://aral.mptf.uz/css/redesign.css', array(), _S_VERSION );
    wp_enqueue_style( 'redisgn2', 'https://aral.mptf.uz/css/redesign2.css', array(), _S_VERSION );
    wp_enqueue_style( 'redisgn2', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css', array(), _S_VERSION );
	wp_enqueue_style( 'demografik-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'demografik-style', 'rtl', 'replace' );

    wp_enqueue_script( 'core', get_template_directory_uri() . '/assets/js/core.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'flickity.pkgd', get_template_directory_uri() . '/assets/js/flickity.pkgd.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'demografik', get_template_directory_uri() . '/assets/js/demografik.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'demografik-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'ekko-lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'admiral', 'https://aral.mptf.uz/js/admiral-tabs.js', array(), _S_VERSION, true );

    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'demografik_scripts' );
