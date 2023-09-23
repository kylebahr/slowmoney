<?php

/**
 * Custom Team Grid Function
 */

function my_custom_team_grid()
{
    // Define the post ID where your ACF data is stored
    $post_id = 24;

    // Fetch the ACF data from the specific post
    if (function_exists('have_rows') && have_rows('team_members', $post_id)) :
        echo '<ul role="list" class="four-col-grid">';
        while (have_rows('team_members', $post_id)) :
            the_row();

            // Store fields in variables
            $image = get_sub_field('member_image');
            $image_url = $image ? esc_url($image['url']) : "/wp-content/uploads/2023/06/miniavs.png";
            $name = esc_html(get_sub_field('member_name'));
            $role = esc_html(get_sub_field('member_role'));
            $bio = wpautop(get_sub_field('member_bio')); ?>

            <li x-data="{ open: false }">
                <!-- Member image -->
                <img class="aspect-[1/1] w-full rounded-2xl object-cover" src="<?= $image_url; ?>" alt="<?= $name; ?>">

                <!-- Member name and role -->
                <h3 class="mt-6 text-lg font-bold leading-8 tracking-tight text-gray-900"><?= $name; ?></h3>
                <p class="text-base leading-7 text-gray-600"><?= $role; ?></p>

                <div class="mt-2">
                    <!-- Read Bio button -->
                    <div class="group flex items-center space-x-2.5 text-sm font-medium text-gray-600 hover:text-gray-900">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>

                        <!-- Trigger for opening the modal -->
                        <button @click.prevent="open = true">Read bio</button>
                    </div>

                    <!-- Modal -->
                    <div x-show="open" x-transition:enter="ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="fixed inset-0 z-10 flex items-center justify-center" style="display: none;">

                        <div class="absolute inset-0 bg-gray-500 bg-opacity-75"></div>
                        <div @click.away="open = false" class="mx-4 mt-auto mb-auto overflow-hidden transition-all transform bg-white rounded-lg shadow-xl sm:max-w-2xl sm:w-full sm:mx-auto">
                            <div class="px-4 pt-5 pb-4 text-left sm:p-6">
                                <div class="flex flex-col items-center sm:flex-row sm:items-start">
                                    <div class="flex-shrink-0">
                                        <div class="relative w-12 h-12">
                                            <img class="absolute top-0 left-0 object-cover w-full h-full rounded-full" src="<?= $image_url; ?>" alt="<?= $name; ?>">
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg font-extrabold leading-6 tracking-tight text-gray-900" id="modal-title"><?= $name; ?>'s Bio</h3>
                                        <p class="text-sm leading-7 text-gray-600"><?= $role; ?></p>
                                    </div>
                                </div>
                                <div class="mt-4 text-sm leading-6 text-gray-600">
                                    <?= $bio; ?>
                                </div>
                                <div class="mt-4 sm:flex sm:flex-row-reverse">
                                    <button type="button" class="inline-flex justify-center w-full px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:w-auto" @click="open = false">Close</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Social Links -->
                    <?php if (have_rows('member_social_links')) : ?>
                        <ul role="list" class="flex mt-6 gap-x-6">
                            <?php while (have_rows('member_social_links')) :
                                the_row();
                                $social_media_url = esc_url(get_sub_field('social_media_url')); ?>
                                <li>
                                    <a href="<?= $social_media_url; ?>" class="text-gray-400 hover:text-gray-500">
                                        <?php
                                        $social_type = get_sub_field('social_media_type');
                                        switch ($social_type) {
                                            case 'twitter':
                                                echo '<span class="sr-only">Twitter</span>
						<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
							<path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
						</svg>';
                                                break;
                                            case 'linkedin':
                                                echo '<span class="sr-only">LinkedIn</span>
						<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
							<path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
						</svg>';
                                                break;
                                                // Add more cases as necessary
                                        }
                                        ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
            </li>
        <?php endwhile;
        echo '</ul>';
    endif;
}
