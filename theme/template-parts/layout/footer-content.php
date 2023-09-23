<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

?>

<footer class="mt-20 bg-neutral-900 sm:mt-28" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Main Footer</h2>
    <div class="px-6 pt-16 pb-8 mx-auto max-w-7xl sm:pt-24 lg:px-8 lg:pt-32 xl:grid xl:grid-cols-3 xl:gap-8">
        <div class="mb-16 h-7 xl:col-span-1">
            <?php
            // Get the URL of the footer logo from the theme mod settings
            $footer_logo_url = esc_url(get_theme_mod('footer_logo'));

            // Get the URL of the main logo from the theme mod settings
            $main_logo_url = esc_url(get_theme_mod('logo_url'));

            // If the footer logo URL is empty, use the main logo URL
            if (empty($footer_logo_url)) {
                $footer_logo_url = $main_logo_url;
            }

            // If the footer logo URL is not empty, display the logo
            if (!empty($footer_logo_url)) : ?>
                <img class="h-7" src="<?= $footer_logo_url ?>" alt="Company logo">
            <?php else : ?>
                <!-- Fallback if no logo is available. You can add your own HTML or text here. -->
                <p>No logo available.</p>
            <?php endif; ?>
        </div>
        <div class="grid grid-cols-2 gap-8 lg:grid-cols-4 xl:col-span-2">
            <?php
            // Define the menu name
            $menu_name = 'menu-2';

            // If the menu location is set and the menu exists
            if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
                // Get the menu object
                $menu = wp_get_nav_menu_object($locations[$menu_name]);

                // Get the menu items
                $menuitems = wp_get_nav_menu_items($menu->term_id, array('orderby' => 'menu_order', 'order' => 'ASC'));

                $count = 0;
                $parent_id = 0;

                // Loop through the menu items
                foreach ($menuitems as $item) {
                    // Get the link URL and title of the menu item
                    $link = $item->url;
                    $title = $item->title;

                    // If the item does not have a parent
                    if (!$item->menu_item_parent) :
                        // Set the parent ID to the item ID
                        $parent_id = $item->ID;
                        ?>
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white"><?= $title ?></h3>
                            <?php
                            // If the parent item has children
                            if (in_array($parent_id, array_column($menuitems, 'menu_item_parent'))) :
                                ?>
                                <ul role="list" class="mt-6 space-y-4">
                            <?php endif; ?>
                    <?php endif; ?>

                            <?php
                            // If the current item is a child of the parent item
                            if ($parent_id == $item->menu_item_parent) :
                                ?>
                                <li>
                                    <a href="<?= $link ?>" class="text-sm leading-6 text-gray-300 hover:text-white"><?= $title ?></a>
                                </li>
                            <?php endif; ?>

                            <?php
                            // If the next item is not a child of the parent item, or if there are no more items
                            if ((isset($menuitems[$count + 1]) && $menuitems[$count + 1]->menu_item_parent != $parent_id) || (!isset($menuitems[$count + 1]))) :
                                // If the parent item has children
                                if (in_array($parent_id, array_column($menuitems, 'menu_item_parent'))) :
                                    ?>
                                </ul>
                                <?php endif; ?>
                        </div>
                                <?php $submenu = false;
                            endif; ?>

                    <?php $count++;
                }
            } ?>
        </div>
    </div>

    <div class="px-6 pb-8 mx-auto max-w-7xl">

        <!-- This section presents a subscription form for a newsletter. The form is created using MailChimp for WordPress (MC4WP) plugin. The form ID is pulled from the WordPress Customizer settings under the Site Identity section. The setting for this ID is named 'mc4wp_footer_form_id' and can be adjusted from the Customizer. If no form ID has been provided in the Customizer, the default form ID is set to '264'. -->
        <div class="pt-8 mt-8 border-t border-white/10 sm:mt-20 lg:mt-24 lg:flex lg:items-center lg:justify-between">
            <div>
                <h3 class="text-sm font-semibold leading-6 text-white">Stay informed.</h3>
                <p class="mt-2 text-sm leading-6 text-gray-300">The latest news, articles, and resources, sent to your inbox monthly.</p>
            </div>
            <?php
            $footer_form_id = get_theme_mod('mc4wp_footer_form_id', '264'); // Get the form ID from the Customizer setting, or use '266' as the default.
            echo do_shortcode('[mc4wp_form id="' . $footer_form_id . '"]'); // Display the MC4WP form with the specified ID.
            ?>
        </div>


        <!-- The social media and copyright section -->
        <div class="pt-8 mt-8 border-t border-white/10 md:flex md:items-center md:justify-between">
            <div class="flex space-x-6 md:order-2">
                <a href="https://www.facebook.com/SlowMoney" class="text-gray-500 hover:text-gray-400">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/slowmoneyinstitute" class="text-gray-500 hover:text-gray-400">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="https://twitter.com/SlowMoney" class="text-gray-500 hover:text-gray-400">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>
                <a href="https://www.youtube.com/@woodytasch" class="text-gray-500 hover:text-gray-400">
                    <span class="sr-only">YouTube</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-xs leading-5 text-gray-400 md:order-1 md:mt-0">&copy; <?php echo esc_html(get_bloginfo('name')); ?>. All rights reserved.</p>
        </div>

    </div>

</footer>