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
            'supports'   => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'meta_box' ),
        )
    );
}
add_action('init', 'wporg_custom_post_type');


/**
 * Calls the class on the post edit screen.
 */
function call_someClass() {
    new postAuthorClass();
}
 
if ( is_admin() ) {
    add_action( 'load-post.php',     'call_someClass' );
    add_action( 'load-post-new.php', 'call_someClass' );
}
 
/**
 * The Class.
 */
class postAuthorClass {
 
    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save'         ) );
    }
 
    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'post', 'page', 'infographics' );
 
        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'author_name',
                __( 'Post author name', 'demografik' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'advanced',
                'high'
            );
        }
    }
 
    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {
 
        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */
 
        // Check if our nonce is set.
        if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) ) {
            return $post_id;
        }
 
        $nonce = $_POST['myplugin_inner_custom_box_nonce'];
 
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) ) {
            return $post_id;
        }
 
        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
 
        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
 
        /* OK, it's safe for us to save the data now. */
 
        // Sanitize the user input.
        $mydata = sanitize_text_field( $_POST['myplugin_new_field'] );
 
        // Update the meta field.
        update_post_meta( $post_id, '_my_meta_value_key', $mydata );
    }
 
 
    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );
 
        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta( $post->ID, '_my_meta_value_key', true );
 
        // Display the form, using the current value.
        ?>
        <label for="myplugin_new_field">
            <?php _e( 'Name', 'demografik' ); ?>
        </label>
        <input type="text" id="myplugin_new_field" name="myplugin_new_field" value="<?php echo esc_attr( $value ); ?>" size="25" />
        <?php
    }
}
