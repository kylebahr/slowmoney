<?php

/**
 * Template part for event videos and modals
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

// Retrieve the Flexible Content field values
$flexibleContent = get_field('flexible_content');

// Check if the Flexible Content field has values
if ($flexibleContent) {
    echo '<ul role="list" class="grid grid-cols-1 mt-16 gap-x-4 gap-y-12 sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-6 xl:gap-y-16 xl:gap-x-12">';

    foreach ($flexibleContent as $layout) {
        // Check if the current layout has 'videos' repeater
        if (isset($layout['videos'])) {
            $videos = $layout['videos'];

            foreach ($videos as $video) {
                $img = $video['thumbnail'];
                $type = $video['type'];
                $name = $video['title'];
                $url = $video['url'];

                echo '
				<li x-data="{ open: false, videoUrl: \'\' }" class="relative" x-init="setTimeout(() => { $el.style.display = \'block\'; }, 0);">
					<div class="relative flow-root">
						<div class="relative">
							<img src="' . $img . '" alt="' . $name . '" class="rounded-lg shadow ring-1 ring-gray-900/10">
							<div class="absolute inset-0 flex items-center justify-center">
								<button @click="open = true, videoUrl = \'' . $url . '?autoplay=1\'" class="focus:outline-none">

								<svg class="w-16 h-16 text-green-600" fill="currentColor" viewBox="0 0 84 84">
								<circle opacity="0.9" cx="42" cy="42" r="42" fill="white" />
								<path d="M55.5039 40.3359L37.1094 28.0729C35.7803 27.1869 34 28.1396 34 29.737V54.263C34 55.8604 35.7803 56.8131 37.1094 55.9271L55.5038 43.6641C56.6913 42.8725 56.6913 41.1275 55.5039 40.3359Z" />
							</svg>


									</button>
                </div>
            </div>
			<div class="flex flex-wrap items-start gap-2 mt-6">
			<p class="flex-shrink mr-2 text-base font-medium text-gray-900 pointer-events-none">' . $name . '</p>
			<div class="flex px-3 py-1 text-xs font-normal text-gray-600 rounded-full pointer-events-none max-w-fit bg-gray-50 ring-1 ring-gray-900/10">' . $type . '</div>
		</div>
    <div x-show="open" @click.away="open = false, videoUrl = \'' . $url . '\'" class="fixed inset-0 z-50 flex items-center justify-center" style="display: none;" x-init="if(open) { setTimeout(() => { $el.style.display = \'flex\'; }, 0); }">
        <div class="absolute inset-0 bg-black opacity-75"></div>
        <button @click="open = false, videoUrl = \'' . $url . '\'" class="absolute top-0 right-0 m-6 focus:outline-none">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
									<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
								</svg>
								</button>
								<div class="relative z-10" style="width: 90%; height: 90%;">
									<div class="w-full h-full">
										<iframe x-bind:src="videoUrl" class="absolute top-0 left-0 w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
								</div>
							</div>
						</li>';
            }
        }
    }

    echo '</ul>';
}
