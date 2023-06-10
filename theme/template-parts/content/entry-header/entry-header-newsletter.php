<?php

/**
 * Template part for header newsletter signup
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

?>

<!-- This section presents a subscription form for a newsletter. The form is created using MailChimp for WordPress (MC4WP) plugin. The form ID is pulled from the WordPress Customizer settings under the Site Identity section. The setting for this ID is named 'mc4wp_form_id' and can be adjusted from the Customizer. If no form ID has been provided in the Customizer, the default form ID is set to '266'. -->
<section class="max-w-sm mx-auto mt-3 sm:px-4">
    <h2 class="sr-only">Sign up for our newsletter</h2>
    <?php
    $form_id = get_theme_mod('mc4wp_form_id', '266');
    echo do_shortcode("[mc4wp_form id={$form_id}]"); ?>
</section>