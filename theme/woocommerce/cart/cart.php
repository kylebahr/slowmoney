<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<form class="woocommerce-cart-form not-prose" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<?php do_action('woocommerce_before_cart_table'); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr class="text-sm font-semibold leading-6 text-gray-900 bg-gray-50">
				<th class="product-thumbnail"><span class="screen-reader-text"><?php esc_html_e('Thumbnail image', 'woocommerce'); ?></span></th>
				<th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
				<th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
				<th class="text-center product-quantity"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
				<th class="product-subtotal"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action('woocommerce_before_cart_contents'); ?>

			<?php
			foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
				$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
				/**
				 * Filter the product name.
				 *
				 * @since 7.8.0
				 * @param string $product_name Name of the product in the cart.
				 */
				$product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

				if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
					$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
			?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">


						<td class="product-thumbnail">
							<?php
							$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

							if (!$product_permalink) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
							}
							?>
						</td>

						<td class="text-sm font-medium leading-6 text-gray-900 product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
							<?php
							if (!$product_permalink) {
								/**
								 * Filter the product name.
								 *
								 * @since 7.8.0
								 * @param string $product_name Name of the product in the cart.
								 * @param array $cart_item The product in the cart.
								 * @param string $cart_item_key Key for the product in the cart.
								 */
								echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $product_name, $cart_item, $cart_item_key) . '&nbsp;');
							} else {
								/**
								 * Filter the product name.
								 *
								 * @since 7.8.0
								 * @param string $product_url URL the product in the cart.
								 */
								echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $product_name), $cart_item, $cart_item_key));
							}

							do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

							// Meta data.
							echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

							// Backorder notification.
							if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
								echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
							}
							?>
						</td>

						<td class="text-sm font-medium leading-6 text-gray-900 product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
							<?php
							echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
							?>
						</td>

						<td class="text-sm font-medium leading-6 text-center text-gray-900 product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
							<?php
							if ($_product->is_sold_individually()) {
								$min_quantity = 1;
								$max_quantity = 1;
							} else {
								$min_quantity = 0;
								$max_quantity = $_product->get_max_purchase_quantity();
							}

							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $max_quantity,
									'min_value'    => $min_quantity,
									'product_name' => $product_name,
								),
								$_product,
								false
							);

							echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.

							// Remove product functionality moved here
							echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'woocommerce_cart_item_remove_link',
								sprintf(
									'<div class="mt-1"><a href="%s" class="ml-4 text-sm font-medium text-center text-green-600 hover:text-green-500 sm:ml-0" aria-label="%s" data-product_id="%s" data-product_sku="%s">Remove</a></div>',
									esc_url(wc_get_cart_remove_url($cart_item_key)),
									/* translators: %s is the product name */
									esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), $product_name)),
									esc_attr($product_id),
									esc_attr($_product->get_sku())
								),
								$cart_item_key
							);
							?>
						</td>

						<td class="text-sm font-medium leading-6 text-gray-900 product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
							<?php
							echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
							?>
						</td>
					</tr>
			<?php
				}
			}
			?>

			<?php do_action('woocommerce_cart_contents'); ?>

			<tr>
				<td colspan="6" class="actions">

					<?php if (wc_coupons_enabled()) { ?>
						<div class="flex items-center justify-center mb-3 coupon sm:mb-0">
							<label for="coupon_code" class="screen-reader-text"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label> <input type="text" name="coupon_code" class="flex-grow w-52 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 text-sm leading-6" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" /> <button type="submit" class="flex-grow text-sm font-medium ml-2 leading-6 text-green-600 hover:text-green-500<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_html_e('Apply coupon', 'woocommerce'); ?></button>
							<?php do_action('woocommerce_cart_coupon'); ?>
						</div>
					<?php } ?>

					<button type="submit" class="btn-md w-full sm:w-auto<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

					<?php do_action('woocommerce_cart_actions'); ?>

					<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
				</td>
			</tr>

			<?php do_action('woocommerce_after_cart_contents'); ?>
		</tbody>
	</table>
	<?php do_action('woocommerce_after_cart_table'); ?>
</form>

<?php do_action('woocommerce_before_cart_collaterals'); ?>

<div class="mt-10 cart-collaterals">
	<?php
	/**
	 * Cart collaterals hook.
	 *
	 * @hooked woocommerce_cross_sell_display
	 * @hooked woocommerce_cart_totals - 10
	 */
	do_action('woocommerce_cart_collaterals');
	?>
</div>

<?php do_action('woocommerce_after_cart'); ?>