<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

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
