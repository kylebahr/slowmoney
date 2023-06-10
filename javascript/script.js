/**
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/script.min.js` and enqueued by
 * default in `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

/**
 * Set cookie for banner-content.php
 */

// Get the value of a cookie by name
window.getCookie = function (name) {
	var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
	return match ? match[2] : null;
};

// Set a cookie with a given name, value, and expiration days
window.setCookie = function (name, value, days) {
	var date = new Date();
	date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
	var expires = '; expires=' + date.toGMTString();
	document.cookie = name + '=' + value + expires + '; path=/';
};

// Check the banner cookie value to determine if the banner should be shown
window.checkBannerCookie = function () {
	var showBanner = getCookie('dismissBanner');
	return showBanner != 'true';
};

/**
 * Import AlpineJS
 */
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Start AlpineJS
Alpine.start();

/**
 * Add icon next to image captions
 */

// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function () {
	// Select all image captions
	let figcaptions = document.querySelectorAll('.wp-caption-text');

	// Add an icon to each image caption
	figcaptions.forEach((figcaption) => {
		// Create an SVG element
		let svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
		svg.setAttribute('viewBox', '0 0 20 20');
		svg.setAttribute('fill', '#D1D5DB');
		svg.setAttribute('class', 'w-5 h-5');

		// Create a path element for the icon
		let path = document.createElementNS(
			'http://www.w3.org/2000/svg',
			'path'
		);
		path.setAttribute('fill-rule', 'evenodd');
		path.setAttribute(
			'd',
			'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z'
		);
		path.setAttribute('clip-rule', 'evenodd');

		// Append the path to the SVG element
		svg.appendChild(path);

		// Prepend the SVG element to the image caption
		figcaption.prepend(svg);
	});
});
