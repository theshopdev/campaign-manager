<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>TheShop | Campaign Manager</title>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<script
			defer
			src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
	></script>
	
	<style type="text/tailwindcss">
		.form {
			@apply space-y-6;
		}
		.form-input {
			@apply block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 min-h-[36px];
		}
		
		.form-label {
			@apply block text-sm/6 font-medium text-gray-900 mb-2;
		}
		
		.form-submit {
			@apply flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer;
		}
		
		.form-info {
			@apply text-gray-500 text-xs mt-1;
		}
	</style>
</head>
<body>
<div x-data="{ userDropdownOpen: false, mobileNavOpen: false }">
	<!-- Page Container -->
	<div
			id="page-container"
			class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-slate-50"
	>
		<!-- Page Header -->
		<header id="page-header" class="z-1 flex flex-none items-center pt-5">
			<div class="container mx-auto px-4 lg:px-8 xl:max-w-7xl">
				<div
						class="-mx-4 border-y border-slate-200 bg-white px-4 shadow-xs sm:rounded-lg sm:border lg:-mx-6 lg:px-6"
				>
					<div class="flex justify-between py-2.5 lg:py-3.5">
						<!-- Left Section -->
						<div class="flex items-center gap-2 lg:gap-6">
							<!-- Logo -->
							<a
									href="{{route('campaign-manager.dashboard')}}"
									class="group inline-flex items-center gap-1.5 text-lg font-bold tracking-wide text-slate-900 hover:text-slate-600"
							>
								<span>Campaign<span class="font-normal">Manager</span> <x-campaign-manager::logo width="75px" /></span>
							</a>
							<!-- END Logo -->
							
							<!-- Desktop Navigation -->
							<nav class="hidden items-center gap-1.5 lg:flex">
								@include('campaign-manager::menu')
							</nav>
							<!-- END Desktop Navigation -->
						</div>
						<!-- END Left Section -->
						
						<!-- Right Section -->
						<div class="flex items-center gap-2">
							<!-- Alerts -->
							<form action="{{route('campaign-manager.api.logout')}}" method="post">
								@csrf
								<button
										type="submit"
										role="menuitem"
										class="group cursor-pointer flex w-full items-center justify-between gap-2 rounded-lg px-2.5 py-2 text-start text-sm font-medium text-slate-700 hover:bg-indigo-50 hover:text-indigo-800"
								>
									<span class="grow">Odhlásiť sa</span>
								</button>
							</form>
							<!-- END Alerts -->
							
							<!-- Toggle Mobile Navigation -->
							<div class="lg:hidden">
								<button
										x-on:click="mobileNavOpen = !mobileNavOpen"
										type="button"
										class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-slate-800 hover:border-indigo-300 hover:text-indigo-800 active:border-slate-200"
								>
									<svg
											fill="currentColor"
											viewBox="0 0 20 20"
											xmlns="http://www.w3.org/2000/svg"
											class="hi-solid hi-menu inline-block size-5"
									>
										<path
												fill-rule="evenodd"
												d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
												clip-rule="evenodd"
										></path>
									</svg>
								</button>
							</div>
							<!-- END Toggle Mobile Navigation -->
						</div>
						<!-- END Right Section -->
					</div>
					
					<!-- Mobile Navigation -->
					<div x-cloak x-show="mobileNavOpen" class="lg:hidden">
						<nav class="flex flex-col gap-2 border-t border-slate-200 py-4">
							@include('campaign-manager::menu')
						</nav>
					</div>
					<!-- END Mobile Navigation -->
				</div>
			</div>
		</header>
		<!-- END Page Header -->
		
		<!-- Page Content -->
		<main id="page-content" class="flex max-w-full flex-auto flex-col">
			<div class="container mx-auto p-4 lg:p-8 xl:max-w-7xl">
				@if(session('success'))
					<div class="rounded-lg bg-green-600 text-center py-4 lg:px-4 mb-4">
						<div class="p-2 bg-green-700 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
							<span class="flex rounded-full bg-green-800 uppercase px-2 py-1 text-xs font-bold mr-3">Úspech</span>
							<span class="font-semibold mr-2 text-left flex-auto">{{session('success')}}</span>
						</div>
					</div>
				@endif
				
				@if(session('error'))
					<div class="rounded-lg bg-green-600 text-center py-4 lg:px-4 mb-4">
						<div class="p-2 bg-green-700 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
							<span class="flex rounded-full bg-green-800 uppercase px-2 py-1 text-xs font-bold mr-3">Chyba</span>
							<span class="font-semibold mr-2 text-left flex-auto">{{session('error')}}</span>
						</div>
					</div>
				@endif
				
				@yield('content')
			</div>
		</main>
		<!-- END Page Content -->
		
		<!-- Page Footer -->
		<footer id="page-footer" class="flex flex-none items-center py-5">
			<div
					class="container mx-auto flex flex-col px-4 text-center text-sm md:flex-row md:justify-between md:text-start lg:px-8 xl:max-w-7xl"
			>
				<div class="pt-4 pb-1 md:pb-4">
					<x-campaign-manager::logo width="150px" />
				</div>
				<div class="inline-flex items-center justify-center pt-1 pb-4 md:pt-4"><span>Campaign Manager</span></div>
			</div>
		</footer>
		<!-- END Page Footer -->
	</div>
	<!-- END Page Container -->
</div>
</body>
</html>