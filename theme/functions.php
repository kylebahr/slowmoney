<?php

/**
 * _kb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _kb
 */

if (!defined('_KB_VERSION')) {
	/*
     * Set the theme’s version number.
     *
     * This is used primarily for cache busting. If you use `npm run bundle`
     * to create your production build, the value below will be replaced in the
     * generated zip file with a timestamp, converted to base 36.
     */
	define('_KB_VERSION', '0.1.0');
}

if (!defined('_KB_TYPOGRAPHY_CLASSES')) {
	/*
     * Set Tailwind Typography classes for the front end, block editor and
     * classic editor using the constant below.
     *
     * For the front end, these classes are added by the `_kb_content_class`
     * function. You will see that function used everywhere an `entry-content`
     * or `page-content` class has been added to a wrapper element.
     *
     * For the block editor, these classes are converted to a JavaScript array
     * and then used by the `./javascript/block-editor.js` file, which adds
     * them to the appropriate elements in the block editor (and adds them
     * again when they’re removed.)
     *
     * For the classic editor (and anything using TinyMCE, like Advanced Custom
     * Fields), these classes are added to TinyMCE’s body class when it
     * initializes.
     */
	define(
		'_KB_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (!function_exists('_kb_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _kb_setup()
	{
		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on _kb, use a find and replace
         * to change '_kb' to the name of your theme in all the template files.
         */
		load_theme_textdomain('_kb', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support('title-tag');

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', '_kb'),
				'menu-2' => __('Footer Menu', '_kb'),
			)
		);

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', '_kb_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _kb_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', '_kb'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', '_kb'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', '_kb_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function _kb_scripts()
{
	wp_enqueue_style('_kb-style', get_stylesheet_uri(), array(), _KB_VERSION);
	wp_enqueue_script('_kb-script', get_template_directory_uri() . '/js/script.min.js', array(), _KB_VERSION, true);
	wp_enqueue_style('inter-font', 'https://rsms.me/inter/inter.css', array(), null);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', '_kb_scripts');

/**
 * Enqueue the block editor script.
 */
function _kb_enqueue_block_editor_script()
{
	wp_enqueue_script(
		'_kb-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		_KB_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', '_kb_enqueue_block_editor_script');

/**
 * Create a JavaScript array containing the Tailwind Typography classes from
 * _KB_TYPOGRAPHY_CLASSES for use when adding Tailwind Typography support
 * to the block editor.
 */
function _kb_admin_scripts()
{
?>
	<script>
		tailwindTypographyClasses = '<?php echo esc_attr(_KB_TYPOGRAPHY_CLASSES); ?>'.split(' ');
	</script>
<?php
}
add_action('admin_print_scripts', '_kb_admin_scripts');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function _kb_tinymce_add_class($settings)
{
	$settings['body_class'] = _KB_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', '_kb_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Function which fetches the entry header
 */
require get_template_directory() . '/template-parts/content/entry-header/entry-header-data.php';

/**
 * Add my custom Walker Menus
 */
require get_template_directory() . '/inc/walker-menus.php';

/**
 * Add team grid function
 */
require get_template_directory() . '/inc/team-grid.php';


/**
 * Apply classes to the list items generated by wp_nav_menu
 */
function add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * Add logo setting to the customizer
 */

function _kb_customize_register($wp_customize)
{
	$wp_customize->add_setting('logo_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_url', array(
		'label'    => __('Logo', '_kb'),
		'section'  => 'title_tagline',
		'settings' => 'logo_url',
	)));
}
add_action('customize_register', '_kb_customize_register');

/**
 * Allow SVG uploads
 */
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Add get_footer_subscribe(); in order to call footer subscribe elements without displaying normal footer elements.
 */

function get_footer_subscribe()
{
	// Include the newsletter footer
	get_template_part('template-parts/layout/footer-subscribe-content');
}

/**
 * Custom HTML5 Comment Structure
 */

require get_template_directory() . '/inc/comment-functions.php';

/**
 * Calculate estimated reading time of articles
 */

function estimate_reading_time($post_id)
{
	$content = get_post_field('post_content', $post_id);
	$word_count = str_word_count(strip_tags($content));

	$readingtime = ceil($word_count / 200);

	return $readingtime . ' min read';
}

/**
 * Add custom blog post image sizes
 */

function my_custom_image_sizes()
{
	add_image_size('featured@2x', 1536); // 2x Retina display
	add_image_size('featured', 768); // Regular display
}
add_action('after_setup_theme', 'my_custom_image_sizes');

/**
 * Set text editor height for subtitle custom field
 */

function custom_admin_style()
{
	echo '<style>
	.wysiwyg-sm .acf-input .wp-editor-container textarea.wp-editor-area {
		height: 60px !important;
	}
	</style>';
}
add_action('admin_head', 'custom_admin_style');


// Fix for Gravatar alt attributes
function custom_avatar_alt($avatar, $id_or_email, $size, $default, $alt)
{
	$user = false;

	if (is_numeric($id_or_email)) {
		$id = (int) $id_or_email;
		$user = get_user_by('id', $id);
	} elseif (is_object($id_or_email)) {
		if (!empty($id_or_email->user_id)) {
			$id = (int) $id_or_email->user_id;
			$user = get_user_by('id', $id);
		}
	} else {
		$user = get_user_by('email', $id_or_email);
	}

	if ($user && is_object($user)) {
		$alt = $user->display_name;
		$avatar = str_replace('alt=\'\'', 'alt=\'' . esc_attr($alt) . '\'', $avatar);
	}

	return $avatar;
}

add_filter('get_avatar', 'custom_avatar_alt', 10, 5);

/**
 * Register theme customization settings and controls.
 *
 * This function is attached to the 'customize_register' action hook.
 * Inside this function, you can add as many settings and controls as you want to the WordPress Customizer.
 * Each setting is represented by an option the user can adjust, while the control is the actual user interface element for changing that setting.
 *
 * In this case, we're adding a setting for controlling whether category color coding is enabled or not as well as adding a Mailchimp for Wordpress Entry Form ID setting to Site Identity settings
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object. We can use this object to add, remove, or modify Customizer settings and controls.
 */

function mytheme_customize_register($wp_customize)
{
	// Add Footer Logo settings
	$wp_customize->add_setting('footer_logo', array(
		'default'   => '',
		'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
		'label'      => __('Footer Logo', 'mytheme'),
		'section'    => 'title_tagline', // This depends on what section you want to add your settings
		'settings'   => 'footer_logo',
	)));

	// Add a new setting for Mailchimp form ID for the blog section.
	// This will appear in the WordPress Customizer under Site Identity section.
	$wp_customize->add_setting('mc4wp_form_id', array(
		'default' => '266', // The default value that the form ID should be set to. Change as needed.
		'sanitize_callback' => 'absint', // The function used to sanitize the form ID before it's saved to the database.
	));

	// Create a new instance of WP_Customize_Control for the Mailchimp form ID for the blog section.
	// This will control how the setting appears in the WordPress Customizer.
	$mc4wp_form_id_control = new WP_Customize_Control(
		$wp_customize, // The WP_Customize_Manager object.
		'mc4wp_form_id', // The ID for this control. It should match the ID for the setting.
		array(
			'label' => __('Blog Section MC4WP Form ID'), // The label for the control.
			'section' => 'title_tagline', // The section of the WordPress Customizer where the control should appear.
			'type' => 'text', // The type of control.
			'description' => __('Input the ID of your Mailchimp form (MC4WP) to display it in the header of blog archives, below blog posts, and in the footer on all blog pages.') // Description for the control.
		)
	);

	// Repeat above steps to add a setting and control for the Mailchimp form ID for the footer section.
	$wp_customize->add_setting('mc4wp_footer_form_id', array(
		'default' => '264',
		'sanitize_callback' => 'absint',
	));
	$wp_customize->add_control('mc4wp_footer_form_id', array(
		'label' => __('Footer Section MC4WP Form ID'),
		'description' => __('Enter the ID of the MC4WP form that should be displayed in the footer section of the site.'),
		'section' => 'title_tagline',
		'type' => 'text',
	));

	// Add the controls to the WordPress Customizer.
	$wp_customize->add_control($mc4wp_form_id_control);

	// Add a setting and control for category color coding in the blog.
	// This is a checkbox control so users can simply enable or disable color coding.
	$wp_customize->add_setting('enable_color_coding', array(
		'default' => '1',
		'sanitize_callback' => 'mytheme_sanitize_checkbox',
	));
	$wp_customize->add_control('enable_color_coding', array(
		'label' => __('Enable Blog Category Color Coding'),
		'section' => 'title_tagline',
		'type' => 'checkbox',
	));
}

// Add the function to the 'customize_register' action so it runs when the Customizer is initialized.
add_action('customize_register', 'mytheme_customize_register');

// Define the sanitization function for the checkbox setting.
// This function makes sure that the setting value is a boolean (true or false).
function mytheme_sanitize_checkbox($checked)
{
	// If $checked is set and its value is true, return true. Otherwise, return false.
	return ((isset($checked) && true == $checked) ? true : false);
}

// Require WooCommerce functions
require get_template_directory() . '/woocommerce/functions/woo-setup.php';

// Wrap all post images in figure element
function wrap_images_with_figure($html, $id, $caption, $title, $align, $url, $size, $alt)
{
	// If there's a caption, return the HTML as is
	if ($caption) {
		return $html;
	}
	// If there's no caption, wrap the image in a <figure> tag
	else {
		$image_url = wp_get_attachment_url($id);
		$image = '<img src="' . $image_url . '" alt="' . $alt . '" class="align' . $align . ' size-' . $size . ' wp-image-' . $id . '"/>';
		return '<figure class="post-image">' . $image . '</figure>';
	}
}
add_filter('image_send_to_editor', 'wrap_images_with_figure', 10, 8);
