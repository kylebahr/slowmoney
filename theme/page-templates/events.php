<?php

/*!
    * Template Name: Events
 */

// Header
get_header(); ?>

<!-- Entry Header Section -->
<section class="px-6 entry-header prose-a:text-green-600 prose-a:font-semibold hover:prose-a:text-green-500 lg:px-8">

	<!-- Container for Header Content -->
	<div class="relative max-w-2xl pt-20 pb-16 mx-auto text-center">

		<!-- Header Title -->
		<h1 class="text-base font-semibold leading-7 text-green-700">Our events</h1>

		<h2 class="mt-4 text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">The slow money movement in action</h2>

		<!-- Header Description - Displayed if available -->
		<p class="mt-6 text-lg leading-7 text-slate-600">Renowned thought leaders and financiers, along with local farmers. Our events inspire and connect a family of local Slow Money networks.</p>

		<!-- Newsletter Form - Displayed if enabled -->
		<?php if (get_query_var('display_newsletter_form')) : ?>
			<?php get_template_part('template-parts/content/entry-header/entry-header-newsletter'); ?>
		<?php endif; ?>

	</div>
</section>


<!-- Structural element -->
<section class="px-6 mx-auto max-w-7xl lg:px-8">

	<!-- Video element -->
	<div x-data="{ open: false, videoUrl: 'https://www.youtube.com/embed/_Ebzpj-2fGI' }" class="relative flow-root" x-init="setTimeout(() => { $el.style.display = 'block'; }, 0);">
		<img src="/wp-content/uploads/2023/09/Louisville_group_shot_cleaned-web.jpg" alt="Louisville 2014 National Gathering" width="2432" height="1368" class="rounded-lg shadow-2xl ring-1 ring-gray-900/10">
		<div class="absolute inset-0 flex items-center justify-center">
			<button @click="open = true, videoUrl = videoUrl + '?autoplay=1'" class="focus:outline-none">
				<svg class="w-20 h-20 text-green-600" fill="currentColor" viewBox="0 0 84 84">
					<circle opacity="0.9" cx="42" cy="42" r="42" fill="white" />
					<path d="M55.5039 40.3359L37.1094 28.0729C35.7803 27.1869 34 28.1396 34 29.737V54.263C34 55.8604 35.7803 56.8131 37.1094 55.9271L55.5038 43.6641C56.6913 42.8725 56.6913 41.1275 55.5039 40.3359Z" />
				</svg>
			</button>
		</div>
		<div x-show="open" @click.away="open = false, videoUrl = 'https://www.youtube.com/embed/_Ebzpj-2fGI'" class="fixed inset-0 z-50 flex items-center justify-center" style="display: none;" x-init="if(open) { setTimeout(() => { $el.style.display = 'flex'; }, 0); }">
			<div class="absolute inset-0 bg-black opacity-75"></div>
			<button @click="open = false, videoUrl = 'https://www.youtube.com/embed/_Ebzpj-2fGI'" class="absolute top-0 right-0 m-6 focus:outline-none">
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



	<section class="mt-28 sm:mt-40">
		<figure class="max-w-2xl mx-auto">
			<blockquote class="text-xl font-semibold leading-8 tracking-tight text-center text-gray-900 sm:text-2xl sm:leading-9">
				<p>“What a pleasure to be part of a gathering that wasn’t just talking about the future but bending it! Slow Money is one of the keys to a healthy future.”</p>
			</blockquote>
			<figcaption class="flex items-center justify-center mt-10 gap-x-6">
				<div class="text-sm leading-6 text-center">
					<div class="font-semibold text-gray-900">Bill McKibben</div>
					<div class="mt-0.5 text-gray-600">Founder, 350.org</div>
				</div>
			</figcaption>
		</figure>
	</section>

</section>

<section class="overflow-hidden bg-white mt-28 sm:mt-40">
	<div class="px-6 mx-auto max-w-7xl lg:flex lg:px-8">
		<div class="grid max-w-2xl grid-cols-1 mx-auto gap-x-12 gap-y-16 lg:mx-0 lg:min-w-full lg:max-w-none lg:flex-none lg:gap-y-8">
			<div class="lg:col-end-1 lg:w-full lg:max-w-lg lg:pb-8">
				<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Convening and inspiring</h2>
				<p class="mt-6 text-xl leading-8 text-gray-600">Bringing together a broad spectrum of stakeholders, from fiduciaries to farmers, is essential to the approach Slow Money takes in creating an environment for nuanced, authentic public dialogues about food, investing, and culture.

				</p>
				<p class="mt-6 text-base leading-7 text-gray-600">These conversations have proven their transformative power. Slow Money events, both local and national, have welcomed tens of thousands of attendees across numerous communities. These gatherings serve as a vital complement to the local Slow Money networks and investment clubs.</p>
			</div>
			<div class="flex flex-wrap items-start justify-end gap-6 sm:gap-8 lg:contents">
				<div class="flex-auto w-0 lg:ml-auto lg:w-auto lg:flex-none lg:self-end">
					<img src="/wp-content/uploads/2023/06/ng1.jpg" alt="" class="aspect-[7/5] w-[37rem] max-w-none rounded-2xl bg-gray-50 object-cover">
				</div>
				<div class="contents lg:col-span-2 lg:col-end-2 lg:ml-auto lg:flex lg:w-[37rem] lg:items-start lg:justify-end lg:gap-x-8">
					<div class="flex self-end justify-end flex-none order-first w-64 lg:w-auto">
						<img src="/wp-content/uploads/2023/09/marco.jpg" alt="" class="aspect-[4/3] w-[24rem] max-w-none flex-none rounded-2xl bg-gray-50 object-cover">
					</div>
					<div class="flex justify-end flex-auto w-96 lg:w-auto lg:flex-none">
						<img src="/wp-content/uploads/2023/06/harvestfestival.jpg" alt="" class="aspect-[7/5] w-[37rem] max-w-none flex-none rounded-2xl bg-gray-50 object-cover">
					</div>
					<div class="hidden sm:block sm:w-0 sm:flex-auto lg:w-auto lg:flex-none">
						<img src="/wp-content/uploads/2023/06/beetcoin-winners.jpg" alt="" class="aspect-[4/3] w-[24rem] max-w-none rounded-2xl bg-gray-50 object-cover">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="px-6 mx-auto max-w-7xl lg:px-8">

	<div class="mt-28 sm:mt-40">
		<h2 class="text-lg font-semibold leading-8 text-center text-gray-900">Our events have garnered significant media coverage</h2>
		<div class="grid items-center max-w-lg grid-cols-4 mx-auto mt-12 gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-12 lg:mx-0 lg:max-w-none lg:grid-cols-5">
			<img class="object-contain w-full col-span-2 max-h-12 lg:col-span-1" src="/wp-content/uploads/2023/06/nyt.png" alt="Transistor" width="158" height="48">
			<img class="object-contain w-full col-span-2 max-h-12 lg:col-span-1" src="/wp-content/uploads/2023/06/dp.png" alt="Reform" width="158" height="48">
			<img class="object-contain w-full col-span-2 max-h-12 lg:col-span-1" src="/wp-content/uploads/2023/06/barrons.png" alt="Tuple" width="158" height="48">
			<img class="object-contain w-full col-span-2 max-h-12 sm:col-start-2 lg:col-span-1" src="/wp-content/uploads/2023/06/wsj.png" alt="SavvyCal" width="158" height="48">
			<img class="object-contain w-full col-span-2 col-start-2 max-h-12 sm:col-start-auto lg:col-span-1" src="/wp-content/uploads/2023/06/sfc.png" alt="Statamic" width="158" height="48">
		</div>
	</div>

</section>


<section class="mt-28 sm:mt-40 xl:mx-auto xl:max-w-7xl xl:px-8">
	<img src="/wp-content/uploads/2023/06/louisville-long-view.jpg" alt="" class="aspect-[5/2] w-full object-cover xl:rounded-2xl">
</section>

<section class="px-6 mx-auto max-w-7xl lg:px-8">

	<section class="mt-28 sm:mt-40">
		<figure class="max-w-2xl mx-auto">
			<blockquote class="text-xl font-semibold leading-8 tracking-tight text-center text-gray-900 sm:text-2xl sm:leading-9">
				<p>“The future will be made by the hands of farmers, visionaries and those who put their prayers in Mother Earth. That’s the story we are unfolding.”</p>
			</blockquote>
			<figcaption class="flex items-center justify-center mt-10 gap-x-6">
				<div class="text-sm leading-6 text-center">
					<div class="font-semibold text-gray-900">Winona LaDuke</div>
					<div class="mt-0.5 text-gray-600">Co-founder, Honor the Earth</div>
				</div>
			</figcaption>
		</figure>
	</section>

	<!-- Videos section -->
	<div class="mx-auto mt-28 sm:mt-40">
		<div class="max-w-2xl mx-auto text-center">
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Highlights from past events</h2>
			<p class="mt-6 text-lg leading-7 text-gray-600">Relive the excitement and energy of previous events.</p>
		</div>

		<?php
		// Include the template part
		get_template_part('template-parts/content/misc/event-video-modal'); ?>


</section>


<?php
get_footer();
