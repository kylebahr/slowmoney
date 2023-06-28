<?php

/**
 * Template part for displaying single posts. See below link for details on how to leverage Tailwind's Typography Plugin.
 *
 * @link https://tailwindcss.com/docs/typography-plugin
 *
 * @package _kb
 */

// Checking if post type is post
if ('post' === get_post_type()) :
	// Estimate reading time
	$reading_time = estimate_reading_time(get_the_ID());
?>

	<!-- Display date and reading time -->
	<p class="mt-0 mb-5 text-sm text-slate-600"><?php echo get_the_date('l, F j'); ?> <span class="mx-1">&bull;</span> <span class="font-semibold"><?php echo $reading_time; ?></span></p>
<?php
endif;

// Display the title
the_title('<h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">', '</h1>');

// Check if post type is 'post'
if ('post' === get_post_type()) :

	// Check if a guest author has been selected
	$selected_guest_author = get_field('author');
	if ($selected_guest_author) {
		// Get guest author details
		$guest_author_id = $selected_guest_author->ID;
		$guest_author_name = get_field('guest_author_name', $guest_author_id);
		$guest_author_bio = get_field('guest_author_bio', $guest_author_id);
		$guest_author_headshot = get_field('guest_author_headshot', $guest_author_id);
		$headshot_url = $guest_author_headshot['url'];

		echo '<div class="mt-6 mb-12 not-prose">';
		echo '<div class="flex-shrink-0 block group">'; // You may want to change the link here
		echo '<div class="flex items-center">';
		echo '<div>';
		echo '<img src="' . $headshot_url . '" alt="' . $guest_author_name . '" class="inline-block w-10 h-10 rounded-full" />';
		echo '</div>';
		echo '<div class="ml-3 text-sm leading-6">';
		echo '<p class="font-semibold text-gray-900">' . $guest_author_name . '</p>';
		echo '<p class="text-gray-600">' . $guest_author_bio . '</p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	} else {
		// Get regular author details
		$author_id = get_the_author_meta('ID');
		$author_posts_url = get_author_posts_url($author_id);
		$author_name = get_the_author();
		$author_description = get_the_author_meta('description');

		echo '<div class="mt-6 mb-12 not-prose">';
		echo '<a href="' . esc_url($author_posts_url) . '" class="flex-shrink-0 block group">';
		echo '<div class="flex items-center">';
		echo '<div>';
		echo get_avatar($author_id, 36, '', '', array('class' => 'inline-block h-10 w-10 rounded-full'));
		echo '</div>';
		echo '<div class="ml-3 text-sm leading-6">';
		echo '<p class="font-semibold text-gray-900">' . $author_name . '</p>';
		echo '<p class="text-gray-600">' . esc_html($author_description) . '</p>';
		echo '</div>';
		echo '</div>';
		echo '</a>';
		echo '</div>';
	}
endif;


// Display featured post image if it exists
if (has_post_thumbnail()) {
	echo '<figure>';
	the_post_thumbnail('full', ['class' => 'w-full h-auto']); // Display post thumbnail with full size
	// Display caption if it exists
	if (get_the_post_thumbnail_caption()) {
		echo '<figcaption id="caption-attachment-' . get_post_thumbnail_id() . '" class="wp-caption-text">';
		echo get_the_post_thumbnail_caption();
		echo '</figcaption>';
	}
	echo '</figure>';
}

// Display post content
the_content(); ?>

<footer class="entry-footer">
	<!-- Include the subscribe and social sharing elements -->
	<?php get_template_part('template-parts/content/single/content', 'subscribe-and-share'); ?>
</footer><!-- .entry-footer -->