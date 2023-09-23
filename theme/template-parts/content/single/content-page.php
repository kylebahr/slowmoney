<?php

/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

get_header();

// Display the entry title if not the Woocommerce checkout page
if (!is_checkout()) :
    entry_title();
endif;


// Main content section
?>
<section class="relative px-6 lg:px-8">
    <article id="post-<?php the_ID(); ?>" <?php post_class('mx-auto max-w-[40rem] prose md:prose-base prose-a:border-b prose-a:border-green-300 prose-a:font-semibold prose-a:no-underline hover:prose-a:border-b-2'); ?>>

        <?php
        // Display the content of the page
        the_content();

        // Display page pagination if available
        wp_link_pages(
            array(
                'before' => '<div>' . __('Pages:', '_kb'),
                'after'  => '</div>',
            )
        );

        // Check if the current user has permission to edit the post
        if (get_edit_post_link()) :
            ?>
            <footer class="entry-footer">
                <?php
                // Display the edit post link
                edit_post_link(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers. */
                            __('Edit <span class="sr-only">%s</span>', '_kb'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    )
                );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>

    </article>
</section><!-- .entry-content -->
<?php
get_footer();
?>