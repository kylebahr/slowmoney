// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

// Import the default theme from Tailwind CSS to access default fontFamily
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
	presets: [require('./tailwind-typography.config.js')],
	content: ['./theme/**/*.php', './theme/theme.json'],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			fontFamily: {
				sans: ['Inter var', ...defaultTheme.fontFamily.sans],
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		require('@_tw/themejson')(require('../theme/theme.json')),
		require('@tailwindcss/typography'),
		require('@tailwindcss/forms'),
		require('@tailwindcss/aspect-ratio'),
	],
	safelist: [
		{
			pattern: /^bg-.*-(100|200)$/, // This will match any class that starts with 'bg-', ends with '-100' or '-200'
			variants: [
				'responsive',
				'dark',
				'group-hover',
				'focus-within',
				'hover',
				'focus',
			], // Replace with the variants you want to be generated
		},
	],
};
