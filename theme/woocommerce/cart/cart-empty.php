<?php

/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit; ?>

<?php if (wc_get_page_id('shop') > 0) : ?>
    <div class="relative z-10 not-prose">
        <div class="px-4 pt-5 pb-4 mx-auto overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-sm sm:p-6 ring-1 ring-gray-900/5">
            <div>
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                        <?php
                        /**
                         * Filter "Return To Shop" text.
                         *
                         * @since 4.6.0
                         * @param string $default_text Default text.
                         */
                        echo esc_html(apply_filters('woocommerce_return_to_shop_text', __('Your cart is empty', 'woocommerce')));
                        ?>
                    </h3>
                    <div class="mt-2">
                        <!-- You can add additional text here -->
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <a href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>" class="inline-flex justify-center w-full px-3 py-2 text-sm font-semibold text-white bg-green-600 rounded-md shadow-sm hover:bg-green-500">
                    <?php
                    echo esc_html(apply_filters('woocommerce_return_to_shop_text', __('Go back to shop', 'woocommerce')));
                    ?>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>