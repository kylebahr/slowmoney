<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order not-prose md:grid md:grid-cols-10 md:gap-12">

	<?php
	if ($order) :

		do_action('woocommerce_before_thankyou', $order->get_id());
	?>

		<?php if ($order->has_status('failed')) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
				<?php if (is_user_logged_in()) : ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<!-- Entry Header Section -->
			<section class="pt-12 entry-header md:col-span-10">

				<h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thanks for ordering!', 'woocommerce'), $order); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
																																											?></h2>
				<p class="max-w-full mt-2 text-base text-gray-500 sm:max-w-xl">We’re currently processing your order. So hang tight and we’ll send you confirmation very soon!</p>

			</section>

			<table class="min-w-full mt-6 overflow-hidden divide-y divide-gray-300 shadow sm:mt-0 md:col-span-10 ring-1 ring-black ring-opacity-5 sm:rounded-lg">
				<thead class="bg-gray-50">
					<tr>
						<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
							<?php esc_html_e('Order number:', 'woocommerce'); ?>
						</th>
						<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
							<?php esc_html_e('Date:', 'woocommerce'); ?>
						</th>
						<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
							<th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
								<?php esc_html_e('Email:', 'woocommerce'); ?>
							</th>
						<?php endif; ?>
						<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
							<?php esc_html_e('Total:', 'woocommerce'); ?>
						</th>
						<?php if ($order->get_payment_method_title()) : ?>
							<th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">
								<?php esc_html_e('Payment method:', 'woocommerce'); ?>
							</th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200">
					<tr>
						<td class="w-full py-4 pl-4 pr-3 text-sm text-gray-500 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
							<?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
						</td>
						<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
							<?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
						</td>
						<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
							<td class="hidden px-3 py-4 text-sm text-gray-500 whitespace-nowrap lg:table-cell">
								<?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?>
							</td>
						<?php endif; ?>
						<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
							<?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
						</td>
						<?php if ($order->get_payment_method_title()) : ?>
							<td class="hidden px-3 py-4 text-sm text-gray-500 whitespace-nowrap sm:table-cell">
								<?php echo wp_kses_post($order->get_payment_method_title()); ?>
							</td>
						<?php endif; ?>
					</tr>
				</tbody>
			</table>


		<?php endif; ?>

		<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
		<?php do_action('woocommerce_thankyou', $order->get_id()); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
																										?></p>

	<?php endif; ?>

</div>