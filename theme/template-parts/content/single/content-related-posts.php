<?php

/**
 * Template part for displaying related posts
 *
 * @package _kb
 */

// Get the current post's categories
$categories = get_the_category();
$category_ids = array();

// Check if the post has any categories
if ($categories) {
    foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
    }
}

// Query for posts in the same categories
$related_posts = new WP_Query(array(
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID()), // Exclude the current post
    'orderby' => 'date',
    'order' => 'DESC',
));

// Output the related posts, if any were found
if ($related_posts->have_posts()) :
    ?>

    <section class="mt-24 sm:mt-32">

        <h2 class="w-full mb-10 text-3xl font-extrabold tracking-tight text-center text-gray-900 sm:text-4xl">Related reads</h2>

        <div class="grid max-w-2xl grid-cols-1 px-0 mt-16 gap-x-10 gap-y-20 lg:mx-auto lg:max-w-7xl lg:grid-cols-3 lg:px-8">
            <?php
            while ($related_posts->have_posts()) :
                $related_posts->the_post();
                get_template_part('template-parts/content/archive/archive', 'excerpt');
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

    </section>

<?php endif; ?>