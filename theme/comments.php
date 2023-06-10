<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both
 * the current comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _kb
 */

// If the current post is protected by a password and the visitor has not yet entered the password, return early without loading the comments.
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="mt-12 space-y-10 not-prose">

    <?php
    // If there are comments, display them
    if (have_comments()) :
    ?>
        <div class="mt-10">
            <h2 class="mb-5 text-xl font-extrabold md:mb-10">
                <?php
                // Display comment count
                $_kb_comment_count = get_comments_number();
                // Check if there's one or more than one comment
                if ('1' === $_kb_comment_count) {
                    printf(
                        esc_html__('One comment', '_kb'),
                        get_the_title()
                    );
                } else {
                    printf(
                        esc_html(_nx('%1$s comment', '%1$s comments', $_kb_comment_count, 'comments title', '_kb')),
                        number_format_i18n($_kb_comment_count),
                        get_the_title()
                    );
                }
                ?>
            </h2>

            <ol class="space-y-8 list-inside">
                <?php
                // Display the list of comments
                wp_list_comments(
                    array(
                        'style'      => 'ol',
                        'callback'   => '_kb_html5_comment_new',
                        'short_ping' => true,
                    )
                );
                ?>
            </ol>

            <?php
            // If comments are closed, display a message
            if (!comments_open()) :
            ?>
                <p class="text-red-500"><?php esc_html_e('Comments are closed.', '_kb'); ?></p>
            <?php
            endif;
            ?>

        </div>
    <?php
    endif;
    ?>

    <?php
    // Custom comment form fields and configuration
    $comments_args = array(

        'comment_field' => '<div class="mb-6 comment-form-comment">
		<div class="mt-2">
			<textarea rows="4" id="comment" name="comment" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder="Add your comment..."></textarea>
			</div>
		</div>',
        'submit_button' => '<div class="flex justify-end mt-2">
				<button type="submit" class="inline-flex items-center submit btn-lg">%4$s</button>
			</div>',
        'title_reply'          => 'Leave a comment',
        'title_reply_before'   => '<h3 id="reply-title" class="block text-base font-extrabold leading-6 tracking-tight text-gray-900">',
        'title_reply_after'    => '</h3>',
        'comment_notes_before' => '<p class="text-sm text-gray-600 comment-notes">',
        'comment_notes_after'  => '</p>',
        'fields' => apply_filters('comment_form_default_fields', array(
            'cookies' => '', // disable the automatic cookies consent field
            'author_email' => '<div class="grid grid-cols-1 mb-3 gap-x-6 gap-y-8 sm:grid-cols-6">' .
                '<div class="relative sm:col-span-3 comment-form-author"><label for="author" class="absolute inline-block px-1 text-xs font-medium text-gray-900 bg-white -top-2 left-2">Name</label><input id="author" name="author" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder="Jane Smith" /></div>' .
                '<div class="relative sm:col-span-3 comment-form-email"><label for="email" class="absolute inline-block px-1 text-xs font-medium text-gray-900 bg-white -top-2 left-2">Email</label><input id="email" name="email" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder="email@example.com" /></div>' .
                '</div>',
            'cookies-consent' => '
				<div class="flex gap-x-4 sm:col-span-2" x-data="{ on: false }">
				  <div class="flex items-center h-6">
					<button type="button" class="flex flex-none w-8 p-px transition-colors duration-200 ease-in-out bg-gray-200 rounded-full cursor-pointer ring-1 ring-inset ring-gray-900/5 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600" role="switch" aria-checked="false" x-ref="switch" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ \'bg-green-600\': on, \'bg-gray-200\': !(on) }" aria-labelledby="switch-1-label" :aria-checked="on.toString()" @click="on = !on; $refs.checkbox.checked = on">
					  <span class="sr-only">Agree to policies</span>
					  <span aria-hidden="true" class="w-4 h-4 transition duration-200 ease-in-out transform translate-x-0 bg-white rounded-full shadow-sm ring-1 ring-gray-900/5" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ \'translate-x-3.5\': on, \'translate-x-0\': !(on) }"></span>
					</button>
					<input x-ref="checkbox" type="checkbox" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" value="yes" class="hidden" />
				  </div>
				  <label class="text-sm leading-6 text-gray-600" id="switch-1-label" @click="on = !on; $refs.switch.focus()">
				  Enable for easier future commenting. See our
					<!-- space -->
					<a href="/privacy-policy" class="font-semibold text-green-600">privacy&nbsp;policy</a>.
				  </label>
				</div>',
        )),

    );

    // Display the comment form
    comment_form($comments_args);
    ?>

</div><!-- #comments -->
