<?php

/**
 * Template part for displaying the archive grid loop
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

?>

<section class="px-6 mx-auto max-w-7xl lg:px-8"> <!-- Structural element -->

    <!-- Start of the blog posts grid -->
    <div class="three-col-grid">

        <?php
        // Start the Loop
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                // Include the template part for displaying a post
                get_template_part('template-parts/content/archive/archive', 'excerpt');
            // End the Loop
            endwhile;
        endif;
        ?>

    </div> <!-- End of the blog posts grid -->

    <?php
    // Include the template part for displaying pagination
    get_template_part('template-parts/content/archive/archive-pagination');
    ?>

</section> <!-- End structural element -->