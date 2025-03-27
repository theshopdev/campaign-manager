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
</head>
<body>
<div x-data="{ userDropdownOpen: false, mobileNavOpen: false }">
	<!-- Page Container -->
	<div
			id="page-container"
			class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-slate-50"
	>
		
		<!-- Page Content -->
		<main id="page-content" class="flex max-w-full flex-auto flex-col">
			<div class="container mx-auto p-4 lg:p-8 xl:max-w-7xl">
				<x-campaign-manager::logo width="200px" />
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