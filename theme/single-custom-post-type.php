<?php

/**
 * Template Name: Single Custom Post Type
 *
 * Template for displaying single posts of the custom post type.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Your_Theme_Name
 */

// Include the header
get_header();

/* Start the Loop */
while (have_posts()) :
    the_post();

    get_template_part('template-parts/content/single/content', 'page');

    // If comments are open, or we have at least one comment, load
    // the comment template.
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
endwhile; // End of the loop.

get_footer();
