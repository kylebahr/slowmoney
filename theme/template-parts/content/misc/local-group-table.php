<?php

/**
 * Template part for displaying local group table
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

// Step 1: Fetch all local_group posts
$args = array(
	'post_type' => 'page',
	'post__in'  => array(411),  // Replace these with your page IDs
	'posts_per_page' => -1
);

$the_query = new WP_Query($args);

// Step 2: Loop through the posts and gather the state_entries, grouping by state
$grouped_entries = array();
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post();
		if (have_rows('state_entries')) :
			while (have_rows('state_entries')) : the_row();
				$state = get_sub_field('state');
				$name = get_sub_field('name');
				$location = get_sub_field('location');
				$website = get_sub_field('website');
				$type = get_sub_field('type');
				$entry = array('name' => $name, 'location' => $location, 'website' => $website, 'type' => $type);

				// Group entries by state
				$grouped_entries[$state][] = $entry;
			endwhile;
		endif;
	endwhile;
endif;
wp_reset_postdata();
?>

<div x-data="{ open: false }">
	<table class="min-w-full">
		<thead class="bg-white">
			<tr>
				<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">Name</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Location</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Website</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
			</tr>
		</thead>
		<tbody class="bg-white">
			<?php
			// First, let's count all entries including the state headers
			$totalRows = 0;
			foreach ($grouped_entries as $state => $entries) {
				$totalRows += count($entries) + 1;  // +1 for the state header row
			}

			$halfRows = floor($totalRows / 2);
			$counter = 0;
			foreach ($grouped_entries as $state => $entries) :
				$counter += 1; // Increase the counter for the state header
				$hideAttribute = $counter > $halfRows ? 'x-show="open"' : '';
				// State header row
				echo "<tr class='border-t border-gray-200' $hideAttribute>";
				echo '<th colspan="5" scope="colgroup" class="py-2 pl-4 pr-3 text-sm font-semibold text-left text-gray-900 bg-gray-50 sm:pl-3">' . $state . '</th>';
				echo '</tr>';

				// Individual entries for this state
				foreach ($entries as $entry) :
					$counter += 1;
					$hideAttribute = $counter > $halfRows ? 'x-show="open"' : '';

					echo "<tr class='border-t border-gray-300' $hideAttribute>";
					echo '<td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-3">' . $entry['name'] . '</td>';
					echo '<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">' . $entry['location'] . '</td>';
					echo '<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><a href="' . $entry['website'] . '" class="font-medium text-green-600 hover:text-green-900" target="_blank">View website</a></td>';
					echo '<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap"><span class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-700 rounded-md bg-gray-50 ring-1 ring-inset ring-gray-600/20">' . $entry['type'] . '</span></td>';
					echo '</tr>';
				endforeach;
			endforeach;
			?>
		</tbody>
	</table>

	<a href="#" @click.prevent="open = !open" class="flex items-center justify-center w-full px-3 py-2 mt-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">
		<span x-text="open ? 'View less' : 'View all local groups'"></span>
	</a>
</div>