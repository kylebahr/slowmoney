<!-- Blog Section Container -->
<div class="px-6 mx-auto my-32 max-w-7xl sm:my-40 lg:px-8">

    <!-- Blog Intro -->
    <div class="max-w-2xl mx-auto lg:mx-0">
        <!-- Blog Section Title -->
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">From the blog</h2>
        <!-- Blog Section Description -->
        <p class="mt-2 text-lg leading-8 text-gray-600">The voices of local leaders, organic farmers, food entrepreneurs, thought leaders, donors, and investors.</p>
    </div>

    <!-- Blog Posts Grid -->
    <div class="grid max-w-2xl grid-cols-1 gap-10 mx-auto mt-16 auto-rows-fr sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <?php
        // Query for the 3 most recent blog posts
        $recent_posts = new WP_Query(array(
            'posts_per_page' => 3, // Display 3 most recent posts
            'orderby' => 'date',
            'order' => 'DESC',
        ));

        // Loop through the posts and display them
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) :
                $recent_posts->the_post();
                // Get the template part for the blog post excerpt
                get_template_part('template-parts/content/archive/archive', 'excerpt');
            endwhile;
            // Reset the post data after the loop
            wp_reset_postdata();
        endif;
        ?>
    </div>

</div>