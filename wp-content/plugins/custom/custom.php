<?php
/**
 * Plugin Name: Custom Post
 */

defined('ABSPATH') or die(''); // Prevents access to the file through its URL in the browser

function yourPostTypeFunction() {
    register_post_type('your-post-type', array(
            'labels'=>array(
                'name'=>__('Post type pages'),
                'singular_name'=>__('Post type page')
            ),
            'description'=>'Your description',
            'public'=>true,
            'hierarchical'=>true, // Allows parent–child relationships
            'show_in_rest'=>true,
            'supports'=>array( // Features the post type should support
                'title',
                'editor',
                'thumbnail',
                'revisions',
                'page-attributes' /* Necessary to show the metabox for setting parent–child
relationships if you are not using the 'Template Post Type' header field method */
            ),
            'has_archive'=>true,
        )
    );
}
add_action('init', 'yourPostTypeFunction');

function CPTFlushPermalinks() {
    yourPostTypeFunction();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'CPTFlushPermalinks');

?>
