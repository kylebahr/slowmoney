<?php

/**
 * Template part for displaying the entry header content on category and author archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

?>

<!-- Entry Header Section -->
<section class="px-6 entry-header prose-a:text-green-600 prose-a:font-semibold hover:prose-a:text-green-500 lg:px-8">

    <!-- Container for Header Content -->
    <div class="relative mx-auto max-w-[37.5rem] pt-20 text-center pb-24">

        <!-- Header Title -->
        <h1 class="text-4xl font-extrabold tracking-tight kb-title text-slate-900 sm:text-5xl">
            <?php echo esc_html(get_query_var('header_title')); ?>
        </h1>

        <!-- Header Description - Displayed if available -->
        <?php $header_desc = get_query_var('header_desc'); ?>
        <?php if (!empty($header_desc)) : ?>
            <h2 class="mt-4 text-lg leading-7 text-slate-600">
                <?php echo wp_kses_post($header_desc); ?>
            </h2>
        <?php endif; ?>

        <!-- Newsletter Form - Displayed if enabled -->
        <?php if (get_query_var('display_newsletter_form')) : ?>
            <?php get_template_part('template-parts/content/entry-header/entry-header-newsletter'); ?>
        <?php endif; ?>

    </div>
</section>