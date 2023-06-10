<?php

/**
 * Template Name: Custom Post Type Archive
 *
 * Template for displaying the archive of a custom post type.
 *
 *
 * @package _kb
 */

// Include the header
get_header();

// Display the entry header
entry_title();
?>

<div class="bg-white">
    <div class="px-6 mx-auto max-w-7xl lg:px-8">

        <!-- Start of the blog posts grid -->
        <div class="three-col-grid">

            <?php
            // Define the query arguments
            $args = array(
                'post_type' => 'custom-post-type', // Custom post type
                'posts_per_page' => -1, // Gets all posts
            );

            // Get the posts
            $custom_posts = new WP_Query($args);

            // Start the Loop
            if ($custom_posts->have_posts()) :
                while ($custom_posts->have_posts()) :
                    $custom_posts->the_post();
                    ?>

                    <!-- Template for displaying a single post -->
                    <div class="overflow-hidden rounded-lg">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto object-cover']); ?>
                            </a>
                        <?php endif; ?>

                        <div class="p-6">
                            <a href="<?php the_permalink(); ?>" class="text-lg font-extrabold leading-8 tracking-tight text-gray-900">
                                <?php the_title(); ?>
                            </a>
                            <p class="mt-2 text-gray-600">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                        </div>
                    </div>
                    <!-- End of the single post -->

                    <?php
                // End the Loop
                endwhile;
                // Reset Post Data
                wp_reset_postdata();
            endif;
            ?>

        </div> <!-- End of the blog posts grid -->

        <?php
        // Include the template part for displaying pagination
        get_template_part('template-parts/content/archive/archive-pagination');
        ?>

    </div> <!-- End of "mx-auto max-w-7xl px-6 lg:px-8" div -->
</div> <!-- End of the blog post container -->

<?php
// Include the footer
get_footer();
?>