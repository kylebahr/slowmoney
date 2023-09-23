<?php

/*!
    * Template Name: Local Groups
 */

// Get the header
get_header(); ?>

<!-- Structural element -->
<section class="px-6 mx-auto max-w-7xl lg:px-8">


    <!-- Hero element -->
    <div class="pt-16 lg:pt-16 lg:flex lg:items-center lg:gap-x-10">
        <div class="max-w-2xl mx-auto lg:mx-0 lg:flex-auto">
            <h1 class="sr-only">Local groups</h1>
            <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-6xl">The Slow Money movement is built around local groups.</h2>
            <p class="mt-6 text-xl leading-8 text-gray-600">Local investors, connected to one another, local farmers, the places where we live, and the land, catalyzing meaningful new flow of nurture capital.</p>
        </div>

        <div class="mt-16 sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow">

            <div x-data="{ open: false, videoUrl: 'https://www.youtube.com/embed/nlqFi88LNo8' }" class="relative flow-root" x-init="setTimeout(() => { $el.style.display = 'block'; }, 0);">
                <span class="sr-only">Watch our video to learn more</span>
                <img src="/wp-content/uploads/2023/06/two-roots-groups@2x.jpg" alt="Two Roots Farm" class="aspect-[7/5] mx-auto w-[34rem] max-w-full object-cover rounded-2xl">
                <div class="absolute inset-0 flex items-center justify-center">
                    <button @click="open = true, videoUrl = videoUrl + '?autoplay=1'" class="focus:outline-none">
                        <svg class="w-20 h-20 text-green-600" fill="currentColor" viewBox="0 0 84 84">
                            <circle opacity="0.9" cx="42" cy="42" r="42" fill="white" />
                            <path d="M55.5039 40.3359L37.1094 28.0729C35.7803 27.1869 34 28.1396 34 29.737V54.263C34 55.8604 35.7803 56.8131 37.1094 55.9271L55.5038 43.6641C56.6913 42.8725 56.6913 41.1275 55.5039 40.3359Z" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" @click.away="open = false, videoUrl = 'https://www.youtube.com/embed/nlqFi88LNo8'" class="fixed inset-0 z-50 flex items-center justify-center" style="display: none;" x-init="if(open) { setTimeout(() => { $el.style.display = 'flex'; }, 0); }">
                    <div class="absolute inset-0 bg-black opacity-75"></div>
                    <button @click="open = false, videoUrl = 'https://www.youtube.com/embed/nlqFi88LNo8'" class="absolute top-0 right-0 m-6 focus:outline-none">
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
            </div>

        </div>
    </div>

</section>

<!-- Standalone Image Section -->
<div class="hidden mt-8 overflow-hidden lg:block">
    <div class="px-6 mx-auto max-w-7xl lg:flex lg:px-8">
        <div class="grid max-w-2xl grid-cols-1 mx-auto gap-x-12 gap-y-16 lg:mx-0 lg:min-w-full lg:max-w-none lg:flex-none lg:gap-y-8">
            <div class="flex flex-wrap items-start justify-end gap-6 sm:gap-8 lg:contents">
                <div class="contents lg:col-span-2 lg:col-end-2 lg:ml-auto lg:flex lg:w-[37rem] lg:items-start lg:justify-end lg:gap-x-8">
                    <div class="flex self-end justify-end flex-none order-first w-64 lg:w-auto">
                        <img src="/wp-content/uploads/2023/06/jared.jpg" alt="" class="aspect-[4/3] w-[24rem] max-w-none flex-none rounded-2xl bg-gray-50 object-cover">
                    </div>
                    <div class="flex justify-end flex-auto w-96 lg:w-auto lg:flex-none">
                        <img src="/wp-content/uploads/2023/06/soil-boulder-group.jpg" alt="" class="aspect-[7/5] w-[37rem] max-w-none flex-none rounded-2xl bg-gray-50 object-cover">
                    </div>
                    <div class="hidden sm:block sm:w-0 sm:flex-auto lg:w-auto lg:flex-none">
                        <img src="/wp-content/uploads/2023/06/Willow-Tara-Brian.jpg" alt="" class="aspect-[4/3] w-[24rem] max-w-none rounded-2xl bg-gray-50 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Structural element -->
<section class="px-6 mx-auto max-w-7xl lg:px-8">


    <div class="bg-white mt-28 sm:mt-40">
        <div class="max-w-2xl mx-auto lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Since 2010, more than $80 million has flowed to over 1,000 organic farms and local food enterprises.</h2>
            <p class="mt-6 text-base leading-7 text-gray-600">Cheese makers, artisan bakers, heirloom seed companies, compost purveyors, small diversified organic farms, grass-fed beef producers, goat dairies, yogurt companies, farm-to-table restaurants, probiotic pickleteers, community kitchens, regional grain mills, local distributors, inner city cooperatives and more.</p>
        </div>
        <div class="flex flex-col max-w-2xl gap-8 mx-auto mt-16 lg:mx-0 lg:mt-20 lg:max-w-none lg:flex-row lg:items-end">
            <div class="flex flex-col-reverse justify-between p-8 gap-x-16 gap-y-8 rounded-2xl bg-gray-50 sm:w-3/4 sm:max-w-md sm:flex-row-reverse sm:items-end lg:w-72 lg:max-w-none lg:flex-none lg:flex-col lg:items-start">
                <p class="flex-none text-3xl font-bold tracking-tight text-gray-900">5,000</p>
                <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
                    <p class="text-lg font-semibold tracking-tight text-gray-900">Slow Money funders</p>
                    <p class="mt-2 text-base leading-7 text-gray-600">We aren't your traditional funders. We're putting money to work not with an eye toward how much money we might make, but toward preserving local food systems and soil fertility.</p>
                </div>
            </div>
            <div class="flex flex-col-reverse justify-between p-8 bg-neutral-900 gap-x-16 gap-y-8 rounded-2xl sm:flex-row-reverse sm:items-end lg:w-full lg:max-w-sm lg:flex-auto lg:flex-col lg:items-start lg:gap-y-44">
                <p class="flex-none text-3xl font-bold tracking-tight text-white">$80 million</p>
                <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
                    <p class="text-lg font-semibold tracking-tight text-white">Has flowed to small organic farms and local food businesses.</p>
                    <p class="mt-2 text-base leading-7 text-gray-400">Via Slow Money local groups in dozens of communities around the U.S., and a few in Canada, France and Australia. A grassroots movement, driven by mutuality, local decision-making and shared vision.</p>
                </div>
            </div>
            <div class="flex flex-col-reverse justify-between p-8 bg-green-600 gap-x-16 gap-y-8 rounded-2xl sm:w-11/12 sm:max-w-xl sm:flex-row-reverse sm:items-end lg:w-full lg:max-w-none lg:flex-auto lg:flex-col lg:items-start lg:gap-y-28">
                <p class="flex-none text-3xl font-bold tracking-tight text-white">1,000</p>
                <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
                    <p class="text-lg font-semibold tracking-tight text-white">Small food enterprises funded</p>
                    <p class="mt-2 text-base leading-7 text-green-200">No one investment technique or instrument, although most of the funding has been in the form of below market loans. <a class="underline" href="https://beetcoin.org/" target="_blank">And now there are 0% loans</a>.</p>
                </div>
            </div>
        </div>
    </div>



    <!-- Local groups table -->
    <div class="mt-28 sm:mt-40">
        <div class="max-w-2xl mx-auto lg:mx-0">
            <!-- Title -->
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Active local groups</h2>
            <!-- Description -->
            <p class="mt-6 text-base leading-7 prose text-gray-600">Local groups are organized in a variety of ways. Everything from 0% microloans to low-interest loans of $100,000 or more. If you're interested in starting a local group, please <a href="/support/contact/"> contact us</a>.</p>
        </div>
        <div class="mt-8">
            <div class="flow-root mt-8">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                        <?php
                        // Include the template part
                        get_template_part('template-parts/content/misc/local-group-table'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<!-- Blog section -->
<?php get_template_part('template-parts/components/blog-section'); ?>


<?php
get_footer();
