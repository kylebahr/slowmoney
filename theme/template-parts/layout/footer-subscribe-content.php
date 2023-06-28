<?php

/**
 * Template part for footer newsletter signup
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

?>

</main><!-- #content -->

<!-- This section presents a subscription form for a newsletter. The form is created using MailChimp for WordPress (MC4WP) plugin. The form ID is pulled from the WordPress Customizer settings under the Site Identity section. The setting for this ID is named 'mc4wp_form_id' and can be adjusted from the Customizer. If no form ID has been provided in the Customizer, the default form ID is set to '266'. -->
<footer class="py-16 mt-20 bg-neutral-900 subscribe sm:mt-28 sm:py-24 lg:py-32">
	<div class="px-6 mx-auto max-w-7xl lg:flex lg:items-center lg:justify-between lg:px-8">
		<div class="max-w-xl mb-10 text-3xl font-extrabold tracking-tight text-white lg:mb-0 sm:text-4xl lg:col-span-7">
			<h2 class="inline sm:block lg:inline xl:block">Stay informed.</h2>
			<p class="inline sm:block lg:inline xl:block">Sign up for our newsletter.</p>
		</div>
		<?php
		$form_id = get_theme_mod('mc4wp_form_id', '266');
		echo do_shortcode("[mc4wp_form id={$form_id}]"); ?>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>