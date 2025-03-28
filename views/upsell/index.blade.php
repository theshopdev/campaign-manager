@extends('campaign-manager::layout')

@section('content')
	<div class="rounded-lg bg-blue-300 text-center py-4 lg:px-4 mb-4">
		<div class="p-2 bg-blue-500 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
			<span class="flex rounded-full bg-blue-700 uppercase px-2 py-1 text-xs font-bold mr-3">Informácia</span>
			<span class="font-light mr-2 leading-6 text-left flex-auto">Položky v upselli sa zoraďujú podľa priradeného skóre. Pokiaľ sa položka z upsellu nachádza v košíku, do upsellu sa vloží ďalší v poradí.</span>
		</div>
	</div>
	
	<x-campaign-manager::card>
		<x-campaign-manager::card-header
				title="Upsell"
				subtitle="Všetky položky"
		>
			<x-campaign-manager::button-link title="Vytvoriť položku"
			                                 link="{{route('campaign-manager.upsell.create')}}"/>
		</x-campaign-manager::card-header>
		
		<x-campaign-manager::card-body>
			<x-campaign-manager::table-responsive>
				<thead>
				<x-campaign-manager::table-row>
					<x-campaign-manager::table-column-head>
						Produkt
					</x-campaign-manager::table-column-head>
					<x-campaign-manager::table-column-head>
						Skóre
					</x-campaign-manager::table-column-head>
					<x-campaign-manager::table-column-head>
						Platné od
					</x-campaign-manager::table-column-head>
					<x-campaign-manager::table-column-head>
						Platné do
					</x-campaign-manager::table-column-head>
					<x-campaign-manager::table-column-head>
						Akcie
					</x-campaign-manager::table-column-head>
				</x-campaign-manager::table-row>
				</thead>
				<tbody>
				@foreach($items as $item)
					<x-campaign-manager::table-row>
						<x-campaign-manager::table-column>
							{{$item['product_name']}}
						</x-campaign-manager::table-column>
						<x-campaign-manager::table-column>
							{{$item['score']}}
						</x-campaign-manager::table-column>
						
						<x-campaign-manager::table-column>
							{{$item['valid_from']?->format('d.m.Y') ?? ''}}
						</x-campaign-manager::table-column>
						
						<x-campaign-manager::table-column>
							{{$item['valid_to']?->format('d.m.Y') ?? ''}}
						</x-campaign-manager::table-column>
						
						<x-campaign-manager::table-column>
							<div class="flex">
								<x-campaign-manager::button-edit
										link="{{route('campaign-manager.upsell.edit', [$item])}}"/>
								
								<x-campaign-manager::button-delete
										route="{{route('campaign-manager.upsell.destroy', [$item])}}"/>
							</div>
						</x-campaign-manager::table-column>
					</x-campaign-manager::table-row>
				@endforeach
				</tbody>
			</x-campaign-manager::table-responsive>
		</x-campaign-manager::card-body>
	</x-campaign-manager::card>
@endsection