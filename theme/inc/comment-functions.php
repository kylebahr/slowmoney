<?php

/**
 * Custom HTML5 Comment Structure
 *
 * This function provides a custom HTML5 friendly structure for our comments,
 * making use of our theme's CSS classes for better compatibility and styling.
 * It includes an avatar, author name, comment timestamp, comment text,
 * and importantly, a 'Reply' button for each comment to support nested comments.
 *
 */

// Define custom comment callback
function _kb_html5_comment_new($comment, $args, $depth)
{

    // Sets the global comment variable equal to the current comment
    $GLOBALS['comment'] = $comment;

    // Comment list item starts here
    ?>
    <li <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?> id="comment-<?php comment_ID(); ?>">

        <div class="relative">

            <!-- Comment box starts here -->
            <div class="relative flex flex-col p-5 bg-gray-50 rounded-lg shadow ring-1 ring-gray-900/5">

                <!-- Comment author, avatar and time -->
                <div class="flex items-start md:items-center border-b pb-4 mb-4">
                    <!-- Avatar section -->
                    <div class="relative mr-4 w-10 h-10">
                        <div class="w-full h-0 pb-[100%] rounded-full overflow-hidden bg-gray-400 ring-8 ring-gray-50" style="background-image: url('<?php echo get_avatar_url($comment); ?>'); background-size: cover; background-position: center;">
                        </div>
                    </div>
                    <div class="text-sm">
                        <span class="font-medium text-gray-900 block md:inline"><?php comment_author_link(); ?></span>
                        <span class="mx-2 hidden md:inline">&bull;</span>
                        <span class="text-gray-500 block md:inline">
                            <?php
                            $parent = $comment->comment_parent;
                            if ($parent != 0) {
                                $parent_comment = get_comment($parent);
                                printf('Replied to %s %s ago', get_comment_author_link($parent_comment), human_time_diff(get_comment_time('U'), current_time('timestamp')));
                            } else {
                                printf('Commented %s ago', human_time_diff(get_comment_time('U'), current_time('timestamp')));
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <!-- Comment text and reply link -->
                <div class="text-sm text-gray-700">
                    <!-- Comment text -->
                    <div>
                        <?php comment_text(); ?>
                    </div>

                    <!-- Reply link -->
                    <div class="mt-3">
                        <?php
                        comment_reply_link(array_merge($args, array(
                            'add_below' => 'comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '<div class="font-medium text-gray-900">',
                            'after'     => '</div>'
                        )));
                        ?>
                    </div>
                </div>

            </div>

            <!-- Comment box ends here -->

        </div>

    </li>
    <!-- Comment list item ends here -->
    <?php
}
