<?php
/*!
    * Template Name: About
 */

// Adding WordPress header
get_header();
?>

<!-- Section for the header of the page -->
<section class="px-6 entry-header lg:px-8">
	<div class="relative max-w-4xl pt-20 mx-auto text-center">
		<h1 class="text-base font-semibold leading-7 text-green-700">About us</h1>
		<h2 class="mt-4 text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl">We're a non-profit organization catelyzing grassroots funding for local food systems, organic farming and soil fertility.</h2>
	</div>
</section>

<!-- Image section with a group photo -->
<section class="mt-16 xl:mx-auto xl:max-w-7xl xl:px-8">
	<img src="<?php echo esc_url('http://localhost:10035/wp-content/uploads/2023/06/group-photo.jpg'); ?>" alt="Group Photo" class="aspect-[9/4] w-full object-cover xl:rounded-2xl">
</section>

<!-- Main section -->
<main class="px-6 mx-auto max-w-7xl lg:px-8">

	<!-- Mission section -->
	<section class="mt-28 sm:mt-40">
		<div class="max-w-2xl mx-auto lg:mx-0 lg:max-w-none">
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our mission</h2>
			<div class="flex flex-col mt-6 gap-x-8 gap-y-20 lg:flex-row">
				<div class="lg:w-full lg:max-w-2xl lg:flex-auto">
					<p class="text-xl leading-8 text-gray-600">Building local food systems is one of the most direct, powerful ways to begin addressing critical challenges of our time—climate change, health, community resilience. </p>
					<p class="max-w-xl mt-10 text-base leading-7 text-gray-700">Our mission is to catalyze the flow of capital to local food systems, connecting investors to the places where they live and promoting sense of place, diversity, nonviolence and health. The Slow Money Institute catalyzes the formation of self-organizing local groups, which use a diversity of approaches: public meetings, on-farm events, pitch fests, peer-to-peer loans, investment clubs and, most recently, nonprofit clubs making 0% loans.</p>
				</div>
				<!-- Additional data to display -->
				<div class="lg:flex lg:flex-auto lg:justify-center">
					<dl class="w-64 space-y-8 xl:w-80">
						<!-- First dataset -->
						<div class="flex flex-col-reverse gap-y-4">
							<dt class="text-base leading-7 text-gray-600">Invested</dt>
							<dd class="text-5xl font-semibold tracking-tight text-gray-900">$80 million</dd>
						</div>
						<!-- Second dataset -->
						<div class="flex flex-col-reverse gap-y-4">
							<dt class="text-base leading-7 text-gray-600">Small food enterprises funded</dt>
							<dd class="text-5xl font-semibold tracking-tight text-gray-900">800+</dd>
						</div>
						<!-- Third dataset -->
						<div class="flex flex-col-reverse gap-y-4">
							<dt class="text-base leading-7 text-gray-600">New users annually</dt>
							<dd class="text-5xl font-semibold tracking-tight text-gray-900">46,000</dd>
						</div>
					</dl>
				</div>
			</div>
		</div>
	</section>

	<!-- Image section -->
	<section class="grid grid-cols-1 grid-rows-2 gap-2 mt-16 overflow-hidden md:grid-cols-12 md:grid-rows-1 xl:mx-auto xl:max-w-7xl xl:rounded-2xl">
		<!-- First row -->
		<div class="md:col-span-5">
			<img src="http://localhost:10035/wp-content/uploads/2023/06/ollin-web.jpg" alt="" class="object-cover w-full h-full aspect-[9/8]">
		</div>
		<div class="md:col-span-7">
			<img src="http://localhost:10035/wp-content/uploads/2023/06/sheep.jpg" alt="" class="aspect-[18/8] object-cover w-full h-full aspect-h-8">
		</div>
		<!-- Second row -->
		<div class="md:col-span-3">
			<img src="http://localhost:10035/wp-content/uploads/2023/06/tworootsweb.jpg" alt="" class="object-cover w-full h-full">
		</div>
		<div class="md:col-span-4">
			<img src="http://localhost:10035/wp-content/uploads/2023/06/carol.jpg" alt="" class="object-cover w-full h-full">
		</div>
		<div class="md:col-span-5">
			<img src="http://localhost:10035/wp-content/uploads/2023/06/juniper-farm.jpg" alt="" class="object-cover w-full h-full">
		</div>
	</section>

	<!-- Team section -->
	<div class="mt-28 sm:mt-40">
		<div class="max-w-2xl mx-auto mb-20 lg:mx-0">
			<!-- Title -->
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our team</h2>
			<!-- Description -->
			<p class="mt-6 text-lg leading-8 text-gray-600">Sit facilis neque ab nulla vel. Cum eos in laudantium. Temporibus eos totam in dolorum. Nemo vel facere repellendus ut eos dolores similique.</p>
		</div>
		<!-- Including custom team grid -->
		<?php my_custom_team_grid(); ?>
	</div>


	<!-- History section -->
	<div class="mt-28 sm:mt-40">
		<div class="max-w-2xl mx-auto lg:mx-0">
			<h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our history and vision</h1>
			<p class="mt-6 text-xl leading-8 text-gray-600">Aliquet nec orci mattis amet quisque ullamcorper neque, nibh sem. At arcu, sit dui mi, nibh dui, diam eget aliquam. Quisque id at vitae feugiat egestas ac. Diam nulla orci at in viverra scelerisque eget. Eleifend egestas fringilla sapien.</p>
		</div>
		<div class="grid max-w-2xl grid-cols-1 mx-auto mt-16 gap-x-8 gap-y-16 lg:mx-0 lg:mt-10 lg:max-w-none lg:grid-cols-12">
			<div class="lg:order-last lg:col-span-5">
				<figure class="pl-8 border-l border-green-600">
					<blockquote class="text-xl font-semibold leading-8 tracking-tight text-gray-900">
						<p>“Vel ultricies morbi odio facilisi ultrices accumsan donec lacus purus. Lectus nibh ullamcorper ac dictum justo in euismod. Risus aenean ut elit massa. In amet aliquet eget cras. Sem volutpat enim tristique.”</p>
					</blockquote>
					<figcaption class="flex mt-8 gap-x-4">
						<img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="flex-none w-10 h-10 mt-1 rounded-full bg-gray-50">
						<div class="text-sm leading-6">
							<div class="font-semibold text-gray-900">Brenna Goyette</div>
							<div class="text-gray-600">@brenna</div>
						</div>
					</figcaption>
				</figure>
				<figure class="pl-8 border-l border-green-600 mt-28">
					<blockquote class="text-xl font-semibold leading-8 tracking-tight text-gray-900">
						<p>“Vel ultricies morbi odio facilisi ultrices accumsan donec lacus purus. Lectus nibh ullamcorper ac dictum justo in euismod. Risus aenean ut elit massa. In amet aliquet eget cras. Sem volutpat enim tristique.”</p>
					</blockquote>
					<figcaption class="flex mt-8 gap-x-4">
						<img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="flex-none w-10 h-10 mt-1 rounded-full bg-gray-50">
						<div class="text-sm leading-6">
							<div class="font-semibold text-gray-900">Brenna Goyette</div>
							<div class="text-gray-600">@brenna</div>
						</div>
					</figcaption>
				</figure>
			</div>
			<div class="max-w-xl text-base leading-7 text-gray-700 lg:col-span-7">
				<p>Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius sit neque erat velit. Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id.</p>
				<img class="object-cover w-full h-auto mt-12 rounded-xl" src="http://localhost:10035/wp-content/uploads/2023/06/sm-book-mockup@2x.jpg" alt="Placeholder">
				<p class="mt-8">Et vitae blandit facilisi magna lacus commodo. Vitae sapien duis odio id et. Id blandit molestie auctor fermentum dignissim. Lacus diam tincidunt ac cursus in vel. Mauris varius vulputate et ultrices hac adipiscing egestas. Iaculis convallis ac tempor et ut. Ac lorem vel integer orci.</p>
			</div>
		</div>
	</div>


	<!-- Blog section -->
	<?php get_template_part('template-parts/components/blog-section'); ?>

</main>


<?php
get_footer();
