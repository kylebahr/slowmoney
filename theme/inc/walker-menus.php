<?php

/**
 * The template for displaying my custom Walker Menus
 *
 *
 * @package _kb
 */

// Custom walker for desktop menu
class My_Custom_Walker extends Walker_Nav_Menu
{
	// Function to start a level
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		// Set class based on whether menu parent has description
		$class = $args->walker->menu_parent_has_description ? "w-96" : "w-56";
		$output .= "\n$indent<div x-show=\"open\" @click.away=\"open = false\" style=\"display: none;\" class=\"absolute -left-8 top-full z-10 mt-3 $class rounded-xl bg-white p-4 shadow-md ring-1 ring-gray-900/5\">\n";
	}

	// Function to display elements
	public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
	{
		// Check if the element is not empty
		if (!$element) {
			return;
		}

		// Set element properties
		$element->has_children = !empty($children_elements[$element->ID]);
		$element->has_description = !empty($element->description);

		// If the element has children, check if any child has description
		if ($element->has_children) {
			foreach ($children_elements[$element->ID] as $child) {
				if ($child->description) {
					$element->child_has_description = true;
					break;
				}
			}
		}

		// Set menu_parent_has_description property for walker
		$args[0]->walker->menu_parent_has_description = !empty($element->child_has_description);
		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}

	public function end_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</div>\n";
	}

	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$output .= $indent . '<div x-data="{ open: false }"' . $class_names . '>';

		$output .= $depth == 0 ? '<div class="relative rounded depth-0">' : '<div class="relative p-4 rounded-lg hover:bg-gray-50 depth-1">';

		if ($depth == 0) {
			$output .= '<a ' . ($args->walker->has_children ? '@click.prevent="open = !open"' : '') . ' href="' . $item->url . '" class="flex items-center text-sm font-semibold leading-6 text-gray-900 gap-x-1" aria-expanded="false">' . $item->title;
		} elseif ($depth == 1) {
			$output .= '<a ' . ($args->walker->has_children ? '@click.prevent="open = !open"' : '') . ' href="' . $item->url . '" class="block text-sm font-semibold leading-6 text-gray-900" aria-expanded="false"><span class="absolute inset-0"></span>' . $item->title;
		}

		if ($args->walker->has_children) {
			$output .= '<svg class="flex-none w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>';
		}
		$output .= '</a>';

		// Add description if it's available and the depth is 1
		if (1 == $depth && $item->description) {
			$output .= '<div class="mt-2 text-sm font-normal leading-6 text-gray-600">' . esc_html($item->description) . '</div>';
			$this->has_description = true;
		}

		$output .= '</div>'; // end div for item and description
	}

	public function end_el(&$output, $item, $depth = 0, $args = array())
	{
		$output .= "</div>\n";
	}
}

// Custom walker for mobile menu
class My_Custom_Walker_Mobile extends My_Custom_Walker
{
	// Function to start a level (Modified for mobile)
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<div x-show=\"open\" class=\"\">\n";
	}

	// Function to start an element (Modified for mobile)
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		$indent = str_repeat("\t", $depth);

		$class_names = $depth == 0 ? 'parent' : 'child';  // Add depth-based class names here
		$link_class_names = $depth == 0 ? 'w-full py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50' : 'block py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50';  // Different classes for links

		// Other parts of the function remain same...
		$output .= $indent . '<div x-data="{ open: false }" class="' . $class_names . '">';

		$output .= '<a ' . ($args->walker->has_children ? '@click.prevent="open = !open"' : '') . ' href="' . $item->url . '" class="flex items-center justify-between rounded-lg ' . $link_class_names . '" aria-expanded="false">' . $item->title;
		if ($args->walker->has_children) {
			$output .= '<svg x-bind:class="{ \'rotate-180\': open }" class="flex-none w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>';
		}
		$output .= '</a>';
	}
}
