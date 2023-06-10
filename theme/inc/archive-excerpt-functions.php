<?php

/**
 * Custom Archive Excerpt Functions
 */

// Function to get a random placeholder ID
function get_placeholder_id()
{
    $placeholder_ids = array(
        241,
        242,
        243,
        244,
        253,
        246
    );

    return $placeholder_ids[array_rand($placeholder_ids)];
}

// Function to get the image URL by ID and size
function get_image_url($id, $size = 'thumbnail')
{
    $image_data = wp_get_attachment_image_src($id, $size);

    // If the function doesn't return an array, return an empty string
    return is_array($image_data) ? $image_data[0] : '';
}



/**
 * Function to assign color classes to categories.
 *
 * This function receives a category ID and a default category ID as parameters. It uses these to assign a color class to each category
 * based on the category ID. However, the default category is always assigned a separate color class.
 *
 * This function relies on the Tailwind CSS framework for the color classes. The color classes array can be modified to suit any color
 * scheme that Tailwind supports.
 *
 * If the category color coding is disabled from the WordPress Customizer, the function assigns a gray color to all categories.
 *
 * @param int $category_id The ID of the category for which the color class is being assigned.
 * @param int $default_category_id The ID of the default category, which always has the same color class.
 *
 * @return string The color class for the category, which will be used within a CSS class attribute in the HTML.
 */
function get_category_color_class($category_id, $default_category_id)
{
    // Define an array of color classes, based on Tailwind CSS color classes
    $color_classes = array('green', 'cyan', 'indigo', 'green', 'orange', 'red');

    // If category color coding is enabled from the customizer
    if (get_theme_mod('enable_color_coding', true)) {
        // If the category ID is not the default, assign a color class based on the category ID
        // Otherwise, assign a separate color class for the default category
        return $category_id != $default_category_id
            ? 'bg-' . $color_classes[$category_id % count($color_classes)] . '-100 hover:bg-' . $color_classes[$category_id % count($color_classes)] . '-200'
            : 'bg-purple-100 hover:bg-purple-200';
    } else {
        // If category color coding is disabled, assign a gray color to all categories
        return 'bg-gray-50 hover:bg-gray-100';
    }
}
