<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('mx-auto px-6 lg:max-w-7xl lg:px-8', $product); ?>>
	<div class="border-b border-gray-200 lg:grid lg:grid-cols-7 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16 ">

		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action('woocommerce_before_single_product_summary');
		?>

		<div class="max-w-2xl mx-auto summary entry-summary mt-14 sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:max-w-none">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action('woocommerce_single_product_summary');
			?>
		</div>

		<!-- Testimonials -->
		<?php
		if (have_rows('testimonials')) : ?>
			<div class="w-full max-w-2xl mx-auto mt-16 lg:col-span-4 lg:mt-0 lg:max-w-none">
				<h2 class="py-6 text-sm font-medium text-gray-900"><span class="py-6 border-b-2 border-gray-900">Testimonials</span></h2>
				<?php
				while (have_rows('testimonials')) : the_row();
					$image = get_sub_field('testimonial_image');
					$name = get_sub_field('testimonial_name');
					$review = get_sub_field('testimonial_review');
				?>

					<div class="flex space-x-4 text-sm text-gray-500 product-testimonial">
						<div class="flex-none py-10">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-10 h-10 bg-gray-100 rounded-full">
						</div>
						<div class="w-full py-10 border-t border-gray-200">
							<h3 class="font-medium text-gray-900"><?php echo esc_html($name); ?></h3>

							<div class="flex items-center mt-4">
								<?php for ($i = 0; $i < 5; $i++) : ?>
									<svg class="flex-shrink-0 w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd"></path>
									</svg>
								<?php endfor; ?>
							</div>

							<div class="mt-4 prose-sm prose text-gray-500 max-w-none">
								<?php echo wp_kses_post($review); ?>
							</div>

						</div>
					</div>
				<?php
				endwhile;
				?>
			</div>
		<?php
		endif;
		?>

	</div>


	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>

</div>

<?php do_action('woocommerce_after_single_product'); ?>