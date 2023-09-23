<?php
/*!
 * Template Name: FAQs
 */

// Header
get_header(); ?>

<!-- Structural elements -->
<div class="px-6 pt-20 mx-auto max-w-7xl lg:px-8">
    <div class="grid max-w-2xl grid-cols-1 mx-auto gap-x-14 gap-y-16 lg:max-w-5xl lg:px-8 xl:max-w-none xl:grid-cols-12 xl:px-0">

        <!-- Entry title section -->
        <section class="lg:col-span-4">
            <h1 class="text-base font-semibold leading-7 text-green-600">Frequently asked questions</h1>
            <h2 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-900 xl:text-5xl xl:leading-[3.5rem]">Everything you need to know</h2>
            <p class="mt-4 mb-6 text-base leading-7 text-gray-600">Can’t find the answer you’re looking for? Reach out to our support team.</p>
            <a class="btn-secondary-lg" href="/support/contact">Get in touch <span aria-hidden="true">→</span></a>
        </section>

        <!-- Begin FAQs section -->
        <section class="-mb-4 space-y-12 lg:col-span-8 xl:col-span-7 xl:col-start-6">

            <!-- Check if we have rows in our FAQ -->
            <?php if (have_rows('faqs')) : ?>
                <div class="space-y-12">
                    <!-- Loop through each FAQ row -->
                    <?php while (have_rows('faqs')) :
                        the_row(); ?>

                        <section>
                            <!-- Get the topic for this FAQ section -->
                            <h3 class="text-sm font-semibold leading-7 text-slate-400"><?php echo esc_html(get_sub_field('topic')); ?></h3>

                            <?php if (have_rows('qa')) : ?>
                                <dl class="mt-2 divide-y divide-slate-100">
                                    <!-- Loop through each QA row -->
                                    <?php while (have_rows('qa')) :
                                        the_row(); ?>
                                        <div class="py-4 group" x-data="{ open: false }">
                                            <dt>
                                                <button type="button" class="flex items-start justify-between w-full text-left" :class="{'text-green-600': open, 'text-gray-900': !open}" aria-controls="faq-<?php echo esc_attr(get_row_index()); ?>" :aria-expanded="open" @click="open = !open">
                                                    <!-- Output the question -->
                                                    <span class="text-base font-semibold leading-7"><?php echo esc_html(get_sub_field('question')); ?></span>
                                                    <span class="flex items-center ml-6 h-7">
                                                        <!-- SVG icons for the FAQ toggle -->
                                                        <svg class="w-6 h-6" :class="{ 'hidden': open }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                                        </svg>
                                                        <svg class="w-6 h-6" :class="{ 'hidden': !open }" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            </dt>
                                            <dd class="pt-6 pb-6" id="faq-<?php echo esc_attr(get_row_index()); ?>" x-show="open">
                                                <!-- Output the answer -->
                                                <div class="prose prose-slate max-w-none prose-a:font-semibold prose-a:text-green-600 hover:prose-a:text-green-500">
                                                    <?php echo wp_kses_post(get_sub_field('answer')); ?>
                                                </div>
                                            </dd>
                                        </div>
                                    <?php endwhile; ?>
                                </dl>
                            <?php endif; ?>

                        </section>

                    <?php endwhile; ?>

                </div>
            <?php endif; ?>

        </section>

    </div>
</div>
<!-- End structural elements -->

<?php
// Footer
get_footer();
?>