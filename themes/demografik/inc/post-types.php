<?php 

function wporg_register_taxonomy_course() {
     $labels = array(
         'name'              => _x( 'Infographic-cats', 'taxonomy general name' ),
         'singular_name'     => _x( 'Infographic-cat', 'taxonomy singular name' ),
         'search_items'      => __( 'Search Infographic-cat' ),
         'all_items'         => __( 'All Infographic-cat' ),
         'parent_item'       => __( 'Parent Infographic-cat' ),
         'parent_item_colon' => __( 'Parent Infographic-cat:' ),
         'edit_item'         => __( 'Edit Infographic-cat' ),
         'update_item'       => __( 'Update Infographic-cat' ),
         'add_new_item'      => __( 'Add New Infographic-cat' ),
         'new_item_name'     => __( 'New Infographic-cat Name' ),
         'menu_name'         => __( 'Infographic category' ),
     );
     $args   = array(
         'hierarchical'      => true, // make it hierarchical (like categories)
         'labels'            => $labels,
         'show_ui'           => true,
         'show_admin_column' => true,
         'query_var'         => true,
         'rewrite'           => [ 'slug' => 'info-cat' ],
     );
     register_taxonomy( 'infographic-cat', [ 'infographics' ], $args );
}
add_action( 'init', 'wporg_register_taxonomy_course' );

function wporg_custom_post_type() {
    register_post_type('infographics',
        array(
            'labels'      => array(
                'name'          => __('Infographics', 'demografik'),
                'singular_name' => __('Infographic', 'demografik'),
            ),
            'public'      => true,
            'menu_icon'   => 'dashicons-format-gallery',
            'has_archive' => true,
            'taxonomies' => ['infographic-cat'],
            'supports'   => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        )
    );
}
add_action('init', 'wporg_custom_post_type');

