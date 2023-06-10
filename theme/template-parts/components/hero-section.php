<!-- Main container with a relative positioning -->
<div class="relative isolate -z-10">

	<!-- SVG for the background decoration -->
	<svg class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-gray-200 [mask-image:radial-gradient(32rem_32rem_at_center,white,transparent)]" aria-hidden="true">
		<defs>
			<!-- Definition of the pattern used in the SVG -->
			<pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
				<path d="M.5 200V.5H200" fill="none" />
			</pattern>
		</defs>
		<!-- Nested SVG for the geometric pattern -->
		<svg x="50%" y="-1" class="overflow-visible fill-gray-50">
			<path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
		</svg>
		<!-- Rectangle to apply the defined pattern -->
		<rect width="100%" height="100%" stroke-width="0" fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
	</svg>

	<!-- Div for the gradient effect -->
	<div class="absolute top-0 right-0 -ml-24 overflow-hidden left-1/2 -z-10 transform-gpu blur-3xl lg:ml-24 xl:ml-48" aria-hidden="true">
		<div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)"></div>
	</div>

	<!-- Content container -->
	<div class="overflow-hidden">
		<!-- Inner container for content alignment and spacing -->
		<div class="px-6 pt-16 pb-32 mx-auto max-w-7xl sm:pt-60 lg:px-8 lg:pt-11">
			<!-- Text and image container -->
			<div class="max-w-2xl mx-auto gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
				<!-- Left-side content: Heading, description and buttons -->
				<div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
					<h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">We’re changing the way people connect.</h1>
					<p class="relative mt-6 text-lg leading-8 text-gray-600 sm:max-w-md lg:max-w-none">Cupidatat minim id magna ipsum sint dolor qui. Sunt sit in quis cupidatat mollit aute velit. Et labore commodo nulla aliqua proident mollit ullamco exercitation tempor. Sint aliqua anim nulla sunt mollit id pariatur in voluptate cillum. Eu voluptate tempor esse minim amet fugiat veniam occaecat aliqua.</p>
					<!-- Action buttons -->
					<div class="flex items-center mt-10 gap-x-6">
						<a href="#" class="btn-xl">Get started</a>
						<a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
					</div>
				</div>

				<!-- Right-side content: Images -->
				<div class="flex justify-end gap-8 mt-14 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
					<!-- Images at different positions for desktop and mobile view -->
					<div class="flex-none pt-32 ml-auto space-y-8 w-44 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-60">
						<div class="relative">
							<img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
							<div class="absolute inset-0 pointer-events-none rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
						</div>
					</div>
					<div class="flex-none mr-auto space-y-8 w-44 sm:mr-0 sm:pt-52 lg:pt-20">
						<div class="relative">
							<img src="https://images.unsplash.com/photo-1485217988980-11786ced9454?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
							<div class="absolute inset-0 pointer-events-none rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
						</div>
						<div class="relative">
							<img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-x=.4&w=396&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
							<div class="absolute inset-0 pointer-events-none rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
						</div>
					</div>
					<div class="flex-none pt-32 space-y-8 w-44 sm:pt-0">
						<div class="relative">
							<img src="https://images.unsplash.com/photo-1670272504528-790c24957dda?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=left&w=400&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
							<div class="absolute inset-0 pointer-events-none rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
						</div>
						<div class="relative">
							<img src="https://images.unsplash.com/photo-1670272505284-8faba1c31f7d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
							<div class="absolute inset-0 pointer-events-none rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>