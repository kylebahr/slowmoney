<?php

/**
 * The blog archive template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

// Include the header
get_header();

// Display the entry title
entry_title();

// Include the archive grid loop
get_template_part('template-parts/content/archive/archive', 'grid');

// Include the subscribe footer
get_footer_subscribe();
