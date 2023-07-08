<?php

/*!
    * Template Name: Home
 */

get_header(); ?>

<div class="bg-white">

	<main class="isolate">
		<!-- Hero section -->
		<?php get_template_part('template-parts/components/hero-section'); ?>

		<!-- Mission section -->
		<?php get_template_part('template-parts/components/mission-section'); ?>

		<!-- Image section -->
		<?php get_template_part('template-parts/components/image-section'); ?>

		<!-- Testimonial section -->
		<?php get_template_part('template-parts/components/testimonial-single-section'); ?>

		<!-- Testimonial section -->
		<?php get_template_part('template-parts/components/testimonial-grid-section'); ?>

		<!-- Team section -->
		<?php get_template_part('template-parts/components/image-tiles-section'); ?>

		<!-- Blog section -->
		<?php get_template_part('template-parts/components/blog-section'); ?>

	</main>

</div>

<?php
get_footer();
