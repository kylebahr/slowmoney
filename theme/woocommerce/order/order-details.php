<?php

/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
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

$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if (!$order) {
    return;
}

$order_items           = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
$show_purchase_note    = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ($show_downloads) {
    wc_get_template(
        'order/order-downloads.php',
        array(
            'downloads'  => $downloads,
            'show_title' => true,
        )
    );
}
?>
<section class="mt-6 woocommerce-order-details md:col-span-6 sm:mt-0">
    <?php do_action('woocommerce_order_details_before_order_table', $order); ?>

    <h2 class="text-lg font-medium text-gray-900 woocommerce-order-details__title"><?php esc_html_e('Order details', 'woocommerce'); ?></h2>

    <table class="min-w-full mt-6 overflow-hidden divide-y divide-gray-300 shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">

        <thead class="bg-gray-50">
            <tr>
                <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                    <?php esc_html_e('Product', 'woocommerce'); ?>
                </th>
                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    <?php esc_html_e('Total', 'woocommerce'); ?>
                </th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            <?php
            do_action('woocommerce_order_details_before_order_table_items', $order);

            foreach ($order_items as $item_id => $item) {
                $product = $item->get_product();

                wc_get_template(
                    'order/order-details-item.php',
                    array(
                        'order'              => $order,
                        'item_id'            => $item_id,
                        'item'               => $item,
                        'show_purchase_note' => $show_purchase_note,
                        'purchase_note'      => $product ? $product->get_purchase_note() : '',
                        'product'            => $product,
                    )
                );
            }

            do_action('woocommerce_order_details_after_order_table_items', $order);
            ?>
        </tbody>

        <tfoot class="bg-white divide-y divide-gray-200">
            <?php
            foreach ($order->get_order_item_totals() as $key => $total) {
                ?>
                <tr>
                    <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                        <?php echo esc_html($total['label']); ?>
                    </th>
                    <td class="px-3 py-3.5 text-left text-sm text-gray-500">
                        <?php echo wp_kses_post($total['value']); ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <?php if ($order->get_customer_note()) : ?>
                <tr>
                    <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                        <?php esc_html_e('Note:', 'woocommerce'); ?>
                    </th>
                    <td class="px-3 py-3.5 text-left text-sm text-gray-500">
                        <?php echo wp_kses_post(nl2br(wptexturize($order->get_customer_note()))); ?>
                    </td>
                </tr>
            <?php endif; ?>
        </tfoot>
    </table>


    <?php do_action('woocommerce_order_details_after_order_table', $order); ?>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action('woocommerce_after_order_details', $order);

if ($show_customer_details) {
    wc_get_template('order/order-details-customer.php', array('order' => $order));
}
