<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _kb
 */

// Getting header of the page
get_header();
?>

<!-- Content Wrapper -->
<div class="mx-auto max-w-7xl">
    <!-- Navigation -->
    <nav class="flex px-6 pt-8 pb-10 lg:px-8">
        <!-- Link to the blog home -->
        <?php
        // Try to get the referrer URL
        $referer = $_SERVER['HTTP_REFERER'] ?? '';

        // If it's not available or empty, use the URL of the posts page
        if (empty($referer)) {
            $referer = get_permalink(get_option('page_for_posts'));
        }
        ?>
        <a class="flex text-sm font-semibold leading-6 group text-slate-700 hover:text-slate-900" href="<?php echo esc_url($referer); ?>">
            <!-- SVG for the left arrow icon -->
            <svg viewBox="0 -9 3 24" class="w-auto h-6 mr-3 overflow-visible text-slate-400 group-hover:text-slate-600">
                <path d="M3 0L0 3L3 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>Go back
        </a>
    </nav>
</div>



<!-- Article Wrapper -->
<div class="px-6 bg-white sm:px-6 md:px-8">

    <!-- Article -->
    <article id="post-<?php the_ID(); ?>" class="max-w-3xl mx-auto prose md:prose-base prose-a:border-b prose-a:border-green-300 prose-a:font-semibold prose-a:no-underline hover:prose-a:border-b-2">

        <!-- Article content -->
        <div class="pb-6 mb-10 border-b border-slate-200">
            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();
                // Include the single post content template part
                get_template_part('template-parts/content/single/content', 'single'); ?>

        </div>

                <?php
                // If comments are open, or we have at least one comment, load
                // the comment template.
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
                <?php
            /* End the Loop */
            endwhile;
            ?>

    </article><!-- #post-<?php the_ID(); ?> -->

    <!-- Related posts section -->
    <?php
    // Include the related posts template part
    get_template_part('template-parts/content/single/content', 'related-posts');
    ?>

</div><!-- #primary -->

<?php
// Get footer subscribe section
get_footer_subscribe();
?>