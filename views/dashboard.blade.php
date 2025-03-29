@extends('campaign-manager::layout')

@section('content')
	<!-- Page Section -->
		<div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:gap-8">
			<!-- Quick Statistics -->
			<a
					href="{{route('campaign-manager.upsell.index')}}"
					class="flex flex-col rounded-lg border border-slate-200 bg-white hover:border-slate-300 active:border-violet-300"
			>
				<div class="flex grow items-center justify-between p-5">
					<dl>
						<dt class="text-2xl font-bold">UPSELL</dt>
						<dd class="text-sm font-medium text-slate-500">
							Dodatočné produkty v košíku
						</dd>
					</dl>
				</div>
				<div
						class="border-t border-slate-100 px-5 py-3 text-xs font-medium text-slate-500"
				>
					<p>Otvoriť</p>
				</div>
			</a>
			<!-- Quick Statistics -->
			<a
					href="{{route('campaign-manager.gift.index')}}"
					class="flex flex-col rounded-lg border border-slate-200 bg-white hover:border-slate-300 active:border-violet-300"
			>
				<div class="flex grow items-center justify-between p-5">
					<dl>
						<dt class="text-2xl font-bold">DARČEKY</dt>
						<dd class="text-sm font-medium text-slate-500">
							Darčeky v košíku od určitej výšky objednávky
						</dd>
					</dl>
				</div>
				<div
						class="border-t border-slate-100 px-5 py-3 text-xs font-medium text-slate-500"
				>
					<p>Otvoriť</p>
				</div>
			</a>
			<!-- END Credit Cards -->
			<a
					href="{{route('campaign-manager.product.download')}}"
					class="flex flex-col rounded-lg border border-slate-200 bg-white hover:border-slate-300 active:border-violet-300"
			>
				<div class="flex grow items-center justify-between p-5">
					<dl>
						<dt class="text-2xl font-bold">PRODUKTY</dt>
						<dd class="text-sm font-medium text-slate-500">
							Aktualizuje zoznam produktov z TheShop
						</dd>
					</dl>
				</div>
				<div
						class="border-t border-slate-100 px-5 py-3 text-xs font-medium text-slate-500"
				>
					<p>Aktualizovať</p>
				</div>
			</a>
		</div>
	<!-- END Page Section -->
@endsection