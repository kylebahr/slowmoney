<?php

/**
 * The category archive template
 *
 * This is the template that displays an archive of posts for a specific category.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

// Include the header
get_header();

// Get the category title
$header_title = single_cat_title('', false);

// Get the category description and remove <p> tags
$header_desc = strip_tags(category_description());

// Manually set the boolean value
$display_newsletter_form = true; // Set it to true or false based on your logic

// Set the query variables for the header
set_query_var('header_title', $header_title);
set_query_var('header_desc', $header_desc);
set_query_var('display_newsletter_form', $display_newsletter_form);

// Include the archive header
get_template_part('template-parts/content/entry-header/entry-header-markup');

// Include the archive grid loop
get_template_part('template-parts/content/archive/archive', 'grid');

// Include the footer
get_footer_subscribe();
