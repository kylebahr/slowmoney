<?php

/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined('ABSPATH') || exit;

$show_shipping = !wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="md:col-span-4 ">

    <?php if ($show_shipping) : ?>
        <section>
            <h2 class="text-lg font-medium text-gray-900 woocommerce-order-details__title">Billing and shipping</h2>

            <div class="px-4 py-6 mt-6 bg-gray-100 sm:rounded-lg sm:px-6">

    <?php endif; ?>

            <h3 class="text-sm font-medium text-gray-900"><?php esc_html_e('Billing address', 'woocommerce'); ?></h3>

            <address class="mt-6 text-sm not-italic text-gray-500">
                <?php echo wp_kses_post($order->get_formatted_billing_address(esc_html__('N/A', 'woocommerce'))); ?>

                <?php if ($order->get_billing_phone()) : ?>
                    <p class="woocommerce-customer-details--phone"><?php echo esc_html($order->get_billing_phone()); ?></p>
                <?php endif; ?>

                <?php if ($order->get_billing_email()) : ?>
                    <p class="woocommerce-customer-details--email"><?php echo esc_html($order->get_billing_email()); ?></p>
                <?php endif; ?>
            </address>

            <?php if ($show_shipping) : ?>
            </div><!-- /.col-1 -->

            <div class="px-4 py-6 mt-6 bg-gray-100 sm:rounded-lg sm:px-6">
                <h3 class="text-sm font-medium text-gray-900"><?php esc_html_e('Shipping address', 'woocommerce'); ?></h3>
                <address class="mt-6 text-sm not-italic text-gray-500">
                    <?php echo wp_kses_post($order->get_formatted_shipping_address(esc_html__('N/A', 'woocommerce'))); ?>

                    <?php if ($order->get_shipping_phone()) : ?>
                        <p class="woocommerce-customer-details--phone"><?php echo esc_html($order->get_shipping_phone()); ?></p>
                    <?php endif; ?>
                </address>
            </div><!-- /.col-2 -->

        </section><!-- /.col2-set -->

            <?php endif; ?>

    <?php do_action('woocommerce_order_details_after_customer_details', $order); ?>

</section>