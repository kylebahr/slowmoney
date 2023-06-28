<?php

/**
 * Template part for displaying the banner element above the site header
 *
 * The "window.checkBannerCookie()" function checks if the banner cookie exists to determine whether the banner should be displayed.
 * The "window.setCookie()" function sets the "dismissBanner" cookie with a value of "true" and an expiration of 30 days when the user clicks the dismiss button.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

?>

<div class="flex items-center gap-x-6 bg-green-600 px-6 py-2.5 sm:px-3.5 sm:before:flex-1" x-data="{ open: window.checkBannerCookie() }" x-show="open" style="display: none;" x-init="if(open) { setTimeout(() => { $el.style.display = 'flex'; }, 0); }">
	<!-- Banner message -->
	<p class="text-sm leading-6 text-white">
		<a href="https://beetcoin.org/">
			<strong class="font-semibold">Beetcoin</strong>
			<svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
				<circle cx="1" cy="1" r="1" />
			</svg>
			See how we're funding a new family of 0% loan groups &nbsp;<span aria-hidden="true">&rarr;</span>
		</a>
	</p>
	<!-- Dismiss button -->
	<div class="flex justify-end flex-1">
		<button type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]" @click="open = false; window.setCookie('dismissBanner', 'true', 30);">
			<span class="sr-only">Dismiss</span>
			<svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
				<path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
			</svg>
		</button>
	</div>
</div>