<?php

/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if (!$notices) {
	return;
}

?>

<?php foreach ($notices as $notice) : ?>
	<?php
	$notice_message = wc_kses_notice($notice['notice']);

	// Remove embedded 'View cart' button from notice
	$start = strpos($notice_message, '<a');
	$end = strpos($notice_message, '</a>', $start);
	$button_string = substr($notice_message, $start, $end - $start + 4);
	$notice_message = str_replace($button_string, '', $notice_message);

	$product_name = strstr($notice_message, '“'); // Get product name starting from “
	$notice_message = str_replace($product_name, '', $notice_message); // Remove product name from notice
	$product_name = strip_tags($product_name); // Remove HTML tags from product name
	?>

	<div class="max-w-4xl p-4 mx-auto mt-5 rounded-md bg-green-50">
		<div class="flex">
			<div class="flex-shrink-0">
				<svg class="w-5 h-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
					<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
				</svg>
			</div>
			<div class="flex-1 ml-3 md:flex md:justify-between">
				<p class="text-sm text-green-700"><span class="font-semibold">Success!</span> <?php echo $notice_message; ?> <strong><?php echo $product_name; ?></strong></p>
				<p class="mt-3 text-sm md:ml-6 md:mt-0">
					<a href="<?php echo wc_get_cart_url(); ?>" class="font-semibold text-green-700 whitespace-nowrap hover:text-green-600">
						View Cart
						<span aria-hidden="true"> &rarr;</span>
					</a>
				</p>
			</div>
		</div>
	</div>
<?php endforeach; ?>