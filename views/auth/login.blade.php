@extends('campaign-manager::auth')

@section('content')
	<div class="flex flex-col justify-center px-6 py-12 lg:px-8">
		<div class="sm:mx-auto sm:w-full sm:max-w-sm">
			<h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Prihlásenie</h2>
			<h3 class="text-center tracking-tight text-gray-500">Na prihlásenie použite prihlasovacie údaje do TheShop</h3>
		</div>
		
		<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
			<form class="space-y-6" action="{{route('campaign-manager.api.login')}}" method="POST">
				@csrf
				<div>
					<label for="email" class="block text-sm/6 font-medium text-gray-900">E-mail</label>
					<div class="mt-2">
						<input type="email" name="email" id="email" autocomplete="email" required
						       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
					</div>
				</div>
				
				<div>
					<label for="password" class="block text-sm/6 font-medium text-gray-900">Heslo</label>
					<div class="mt-2">
						<input type="password" name="password" id="password" autocomplete="current-password" required
						       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
					</div>
				</div>
				
				<div>
					<button type="submit"
					        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">
						Prihlásiť sa
					</button>
				</div>
				
				<div class="text-sm">
					<a href="https://{{config('theshop-campaign-manager.host')}}/forgotten-password" target="_blank"
					   class="font-semibold text-indigo-600 hover:text-indigo-500">Zabudli ste heslo?</a>
				</div>
			</form>
		</div>
	</div>
@endsection