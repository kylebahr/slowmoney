<?php

// Get current page URL and title
$kbURL = get_permalink();
$kbTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');

// Encode URLs
$encodedURL = urlencode($kbURL);
$encodedTitle = urlencode($kbTitle);

// Construct sharing URL without using any script
$twitterURL = 'https://twitter.com/intent/tweet?text=' . $kbTitle . '&amp;url=' . $kbURL;
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($kbURL);
$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode($kbURL) . '&title=' . urlencode($kbTitle);

// Social SVG icons URLs
$upload_dir = wp_upload_dir();
$twitterSVG = $upload_dir['baseurl'] . '/2023/06/twitter-color.svg';
$facebookSVG = $upload_dir['baseurl'] . '/2023/06/facebook-color.svg';
$linkedinSVG = $upload_dir['baseurl'] . '/2023/06/linkedin-color.svg';

// Combine the newsletter form and social buttons in one container
echo '<div class="flex flex-col items-start justify-between max-w-full mt-16 not-prose md:flex-row sm:mx-auto">';

?>

<!-- This section presents a subscription form for a newsletter. The form is created using MailChimp for WordPress (MC4WP) plugin. The form ID is pulled from the WordPress Customizer settings under the Site Identity section. The setting for this ID is named 'mc4wp_form_id' and can be adjusted from the Customizer. If no form ID has been provided in the Customizer, the default form ID is set to '266'. -->
<h2 class="sr-only">Sign up for our newsletter</h2>
<?php
$form_id = get_theme_mod('mc4wp_form_id', '266');
echo do_shortcode("[mc4wp_form id={$form_id}]");

// print the buttons
$socialButtons = '<div class="flex items-center self-start space-x-4 md:self-end not-prose" x-data>';
$socialButtons .= '<span class="mr-1 text-sm text-gray-900">Share</span>';
$socialButtons .= '<a class="cursor-pointer kb-link kb-twitter" :href="' . $twitterURL . '" target="_blank" @click.prevent="window.open(\'' . $twitterURL . '\', \'sharer\', \'toolbar=0,status=0,width=800,height=500\');"><img class="w-5 fill-slate-500" src="' . $twitterSVG . '" alt="Twitter"></a>';
$socialButtons .= '<a class="cursor-pointer kb-link kb-facebook" :href="' . $facebookURL . '" target="_blank" @click.prevent="window.open(\'' . $facebookURL . '\', \'sharer\', \'toolbar=0,status=0,width=800,height=500\');"><img class="w-5" src="' . $facebookSVG . '" alt="Facebook"></a>';
$socialButtons .= '<a class="cursor-pointer kb-link kb-linkedin" :href="' . $linkedInURL . '" target="_blank" @click.prevent="window.open(\'' . $linkedInURL . '\', \'sharer\', \'toolbar=0,status=0,width=800,height=500\');"><img class="w-5" src="' . $linkedinSVG . '" alt="LinkedIn"></a>';
$socialButtons .= '</div>';

echo $socialButtons; // print the buttons
echo '</div>'; // close the container
