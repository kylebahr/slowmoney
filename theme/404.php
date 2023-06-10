<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _kb
 */

get_header();
?>

<main class="grid min-h-full px-6 mt-20 bg-white place-items-center sm:mt-32 sm:pb-4 lg:px-8">
    <div class="text-center">
        <p class="text-base font-semibold text-green-600">404</p>
        <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Whoops, that page is gone.</h1>
        <p class="mt-6 text-base leading-7 text-gray-600">Sorry we've led you astray, now let's get you back on course.</p>
        <div class="flex items-center justify-center mt-10 gap-x-6">
            <a href="/" class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Go back home</a>
            <a href="/support" class="text-sm font-semibold text-gray-900">Contact support <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</main>


<?php
get_footer();
