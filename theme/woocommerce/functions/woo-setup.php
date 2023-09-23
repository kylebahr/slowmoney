<?php

/**
 * Woocommerce Functions
 */

/* Setup */

// Removing WooCommerce breadcrumbs from main content
add_action('init', 'jk_remove_wc_breadcrumbs');
function jk_remove_wc_breadcrumbs()
{
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0); // Remove the action for showing breadcrumbs
}

// Adding support for WooCommerce and WooCommerce product gallery slider after the theme setup
add_action('after_setup_theme', 'yourtheme_woocommerce_support');
function yourtheme_woocommerce_support()
{
    add_theme_support('woocommerce'); // Enable WooCommerce support in the theme
    add_theme_support('wc-product-gallery-slider'); // Enable WooCommerce product gallery slider support in the theme
}

// Adding a new image size for WooCommerce thumbnails
function kb_add_image_sizes()
{
    add_image_size('woocommerce_thumbnail_2x', 600, 600, true); // Define a new image size with dimensions 600x600 pixels
}
add_action('after_setup_theme', 'kb_add_image_sizes'); // Hook into after theme setup


/* Product */
// Removing WooCommerce product categories from the single product summary
add_action('init', 'jk_remove_wc_product_cats');
function jk_remove_wc_product_cats()
{
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40); // Remove the action for showing product categories
}

// Displaying author name and bio in WooCommerce single product summary
add_action('woocommerce_single_product_summary', 'display_author_name', 6); // Display author name with priority 6
function display_author_name()
{
    global $product; // Global variable for the current product

    $author_name = get_field('author_name', $product->get_id()); // Get author name from Advanced Custom Fields (ACF)

    if (!empty($author_name)) {
        echo '<h2 class="mt-2 text-sm text-gray-500">' . esc_html($author_name) . '</h2>'; // Print author name with some HTML
    }
}

add_action('woocommerce_single_product_summary', 'display_author_bio', 30); // Display author bio with priority 30
function display_author_bio()
{
    global $product; // Global variable for the current product

    $author_bio = get_field('author_bio', $product->get_id()); // Get author bio from ACF
    $author_name = get_field('author_name', $product->get_id()); // Get author name from ACF

    if (!empty($author_bio)) {
        echo '<div class="pt-10 mt-10 prose-sm prose text-gray-500 border-t border-gray-200">';
        echo '<h3 class="mb-4 text-sm font-medium text-gray-900">' . 'About ' .  esc_html($author_name) . '</h3>';
        echo wpautop($author_bio) . '</div>'; // Print author bio with some HTML
    }
}


/* Checkout */
// Removing coupon option on WooCommerce checkout form
add_action('init', 'remove_coupon_option_on_checkout');
function remove_coupon_option_on_checkout()
{
    remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10); // Remove the action for displaying coupon form on checkout
}

/* Shop */
// Removing specific tabs from WooCommerce product tabs
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs)
{
    unset($tabs['description']); // Remove the description tab
    unset($tabs['reviews']); // Remove the reviews tab
    unset($tabs['additional_information']); // Remove the additional information tab

    return $tabs; // Return modified tabs
}



// Open "product-details" div before product title
add_action('woocommerce_shop_loop_item_title', function () {
    echo '<div class="product-details">';
}, 5);

// Close "product-details" div after the short description
add_action('woocommerce_after_shop_loop_item_title', function () {
    echo '</div>'; // this ends the "product-details" div
}, 16);

// Adding a short description after the price
add_action('woocommerce_after_shop_loop_item_title', function () {
    global $product; // Global variable for the current product

    echo '<div class="mt-4 text-sm text-gray-600">' . $product->get_short_description() . '</div>'; // Print product short description
}, 15);

// Open "cta-wrap" div before "Learn More" button
add_action('woocommerce_after_shop_loop_item', function () {
    echo '<div class="flex items-center mt-4 cta-wrap">'; // this starts the "cta-wrap" div
}, 6);

// Remove the "Add to Cart" button from the shop page
add_action('woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1); // increased priority to ensure this runs first

function remove_add_to_cart_buttons()
{
    if (is_product_category() || is_product() || is_shop()) {
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10); // adjusted the priority to match the one used when the action was added
    }
}

// Adding "Learn More" text after "Add to Cart" button inside the "cta-wrap" div
add_action('woocommerce_after_shop_loop_item', function () {
    global $product; // Global variable for the current product

    $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product); // Get product link

    echo '<a href="' . esc_url($link) . '" class="font-semibold text-green-600 hover:text-green-500">Learn more <span aria-hidden="true">→</span></a>'; // Print the "Learn More" button with the product link
}, 7);

// Close "cta-wrap" div after "Learn More" button
add_action('woocommerce_after_shop_loop_item', function () {
    echo '</div>'; // this ends the "cta-wrap" div
}, 8);


// Adding a "Go back" link on WooCommerce single product page
add_action('woocommerce_before_single_product', function () {
    $shop_url = get_permalink(wc_get_page_id('shop')); // Get the URL of the shop page

    echo '<div class="mx-auto max-w-7xl">
        <nav class="flex px-6 pt-8 pb-10 lg:px-8">
            <a class="flex text-sm font-semibold leading-6 text-gray-700 group hover:text-gray-900" href="' . esc_url($shop_url) . '">
                <svg viewBox="0 -9 3 24" class="w-auto h-6 mr-3 overflow-visible text-gray-400 group-hover:text-gray-600">
                    <path d="M3 0L0 3L3 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>Go back
            </a>
        </nav>
    </div>';
}, 0); // 0 specifies the priority, lower numbers run first.
