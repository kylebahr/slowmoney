<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

// Include the custom archive excerpt functions file
include_once __DIR__ . '/../../../inc/archive-excerpt-functions.php'; // Adjust the path as needed

?>

<article class="flex flex-col">
    <?php
    // Determine if post has a thumbnail, if not use a placeholder
    $thumbnail_id = has_post_thumbnail() ? get_post_thumbnail_id() : get_placeholder_id();

    // Get image URL
    $image_url = get_image_url($thumbnail_id, 'featured');

    // If there's a valid image URL, display it
    if (!empty($image_url)) :
        ?>
        <a href="<?php echo esc_url(get_permalink()); ?>">
            <div class="relative w-full">
                <img src="<?php echo esc_url($image_url); ?>" class="aspect-[16/9] w-full rounded-xl bg-gray-100 object-cover" alt="<?php echo esc_attr(get_the_title()); ?>">
                <div class="absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
            </div>
        </a>
    <?php endif; ?>

    <div class="flex-grow">
        <div class="flex items-center mt-8 text-xs gap-x-4">
            <?php
            // Get estimated reading time and display it
            $reading_time = estimate_reading_time(get_the_ID());
            ?>
            <p class="text-slate-600"><?php echo get_the_date('F j'); ?> <span class="mx-1">•</span> <span class="font-semibold"><?php echo $reading_time; ?></span></p>

            <?php
            // Get post categories and display them
            $categories = get_the_category();
            if (!empty($categories)) :
                $default_category_id = get_option('default_category');
                foreach ($categories as $category) :
                    $color_class = get_category_color_class($category->term_id, $default_category_id);
                    ?>
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="relative rounded-full px-3 py-1.5 font-medium text-gray-600 <?php echo $color_class; ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                    <?php
                endforeach;
            endif;
            ?>
        </div>

        <div class="relative group">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href="<?php the_permalink(); ?>">
                    <span class="absolute inset-0"></span>
                    <?php the_title(); ?>
                </a>
            </h3>

            <!-- Displaying post excerpt -->
            <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3"><?php echo esc_html(get_the_excerpt()); ?></p>
        </div>

        <!-- Displaying author details -->
        <div class="relative flex items-center mt-8 gap-x-4">
            <?php
            // Check if the post type is 'post'
            if ('post' === get_post_type()) :
                $author_id = get_the_author_meta('ID');
                $author_posts_url = get_author_posts_url($author_id);
                $author_name = get_the_author();
                $author_description = get_the_author_meta('description');

                // If author name and description exists, display author details
                if ($author_name && $author_description) :
                    ?>
                    <a href="<?php echo esc_url($author_posts_url) ?>" class="flex-shrink-0 block not-prose group">
                        <div class="flex items-center">
                            <div class="bg-gray-100 rounded-full">
                                <?php echo get_avatar($author_id, 36, '', '', array('class' => 'inline-block h-10 w-10 rounded-full')); ?>
                            </div>
                            <div class="ml-3 text-sm leading-6">
                                <p class="font-semibold text-gray-900"><?php echo $author_name; ?></p>
                                <p class="text-gray-600"><?php echo esc_html($author_description); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</article>
