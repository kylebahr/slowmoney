<?php

/**
 * Template part for displaying the entry header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

function entry_title()
{
    // Get the ID of the current page
    $page_id = get_queried_object_id();

    // Get the title of the current page
    $header_title = get_the_title($page_id);

    // Fetch the subtitle and 'display_newsletter_form' custom fields from the current page
    $raw_subtitle = get_field('subtitle', $page_id);
    $display_newsletter_form = get_field('display_newsletter_form', $page_id);

    // Sanitize the subtitle before displaying it
    $header_desc = wp_kses(
        $raw_subtitle,
        array(
            'a' => array(
                'href' => array(),
                'title' => array()
            )
        )
    );
    // Sanitize the 'display_newsletter_form' field
    $display_newsletter_form = filter_var($display_newsletter_form, FILTER_VALIDATE_BOOLEAN);

    // Pass the variables to the template part
    set_query_var('header_title', $header_title);
    set_query_var('header_desc', $header_desc);
    set_query_var('display_newsletter_form', $display_newsletter_form);

    // Include the template part
    get_template_part('template-parts/content/entry-header/entry-header-markup');
}
