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
    <p class="mt-0 mb-5 text-sm text-slate-600"><?php echo get_the_date('l, F j, Y'); ?> <span class="mx-1">&bull;</span> <span class="font-semibold"><?php echo $reading_time; ?></span></p>
    <?php
endif;

// Display the title
the_title('<h1 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">', '</h1>');

// Display author details if post type is post
if ('post' === get_post_type()) :
    // Get author details
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
endif;

// Display featured post image if it exists
if (has_post_thumbnail()) {
    // Rest of the code...
}

// Display post content
the_content();

// Include the subscribe and social sharing elements
get_template_part('template-parts/content/single/content', 'subscribe-and-share');

// Check if the current user has permission to edit the post
if (get_edit_post_link()) : ?>
    <footer class="entry-footer">
        <?php
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', '_kb'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
<?php endif; ?>