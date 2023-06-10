<?php

/**
 * Template part for pagination on blog archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

?>

<?php
// Define SVGs
$prev_svg = '<svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>';
$next_svg = '<svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>';

// Wrap the links in a div to center them
echo '<div class="flex justify-center mt-8 md:mt-16">';

// Previous Post Link
previous_posts_link(
    '<span class="inline-flex items-center btn-secondary-lg">' . $prev_svg . 'Previous</span>'
);

// Next Post Link
next_posts_link(
    '<span class="inline-flex items-center btn-secondary-lg">Next' . $next_svg . '</span>',
    $wp_query->max_num_pages
);

echo '</div>'; // close div
