<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

// Include the banner
get_template_part('template-parts/layout/banner-content');

?>

<!-- Start of the site header -->
<header class="bg-white" x-data="{ open: false }">
    <!-- The navigation section -->
    <nav class="relative flex items-center justify-between p-6 mx-auto max-w-7xl gap-x-6 lg:px-8" aria-label="Global">
        <div class="absolute inset-x-0 bottom-0 h-px bg-slate-900/5"></div>
        <!-- Logo section -->
        <div class="flex lg:flex-1">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="-m-1.5 p-1.5">
                <!-- Screen reader only text -->
                <span class="sr-only"><?php bloginfo('name'); ?></span>
                <img class="w-auto h-8" src="<?php echo esc_url(filter_var(get_theme_mod('logo_url'), FILTER_VALIDATE_URL)); ?>" alt="Site Logo">
            </a>
        </div>

        <!-- Main menu -->
        <div class="hidden list-none lg:flex lg:gap-x-12">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'depth' => 2,
                    'walker' => new My_Custom_Walker(),
                    'add_li_class'  => 'text-sm font-semibold leading-6 text-gray-900 relative',
                )
            );
            ?>
        </div>

        <!-- Login and Sign up links -->
        <div class="flex items-center justify-end flex-1 gap-x-6">
            <a href="https://donate.stripe.com/eVa6qJecTfVU85a8ww" target="_blank" class="btn-lg" aria-label="Donate Link">Donate</a>
        </div>

        <!-- Menu button for smaller screens -->
        <div class="flex lg:hidden">
            <button @click="open = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" aria-label="Open main menu">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="open" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full p-6 overflow-y-auto bg-white sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center gap-x-6">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                    <img class="w-auto h-8" src="<?php echo esc_url(filter_var(get_theme_mod('logo_url'), FILTER_VALIDATE_URL)); ?>" alt="Site Logo">
                </a>
                <a href="#" class="px-3 py-2 ml-auto text-sm font-semibold text-white bg-green-600 rounded-md shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600" aria-label="Sign up Link">Sign up</a>
                <!-- Close menu button -->
                <button @click="open = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" aria-label="Close menu">
                    <span class="sr-only">Close menu</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flow-root mt-6">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="py-6 -mx-3 space-y-2">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'depth' => 2,
                                'walker' => new My_Custom_Walker_Mobile(),
                                'add_li_class'  => 'block rounded-lg text-sm font-semibold leading-7 text-gray-900'
                            )
                        );
                        ?>
                    </div>
                    <div class="py-6">
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900" aria-label="Login Link">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>