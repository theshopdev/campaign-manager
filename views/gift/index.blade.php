@extends('campaign-manager::layout')

@section('content')
	
	<div class="rounded-lg bg-blue-300 text-center py-4 lg:px-4 mb-4">
		<div class="p-2 bg-blue-500 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
			<span class="flex rounded-full bg-blue-700 uppercase px-2 py-1 text-xs font-bold mr-3">Informácia</span>
			<span class="font-light mr-2 text-left flex-auto">Pre vytvorenie darčeka v TheShop je potrebné vytvoriť duplicitný produkt s rovnakou skladovou kartou ako je štandardný produkt a nulovou cenou.</span>
		</div>
	</div>
	
	<x-campaign-manager::card>
		<x-campaign-manager::card-header
				title="Darčeky"
				subtitle="Všetky položky"
		>
			<x-campaign-manager::button-link title="Vytvoriť položku"
			                                 link="{{route('campaign-manager.gift.create')}}"/>
		</x-campaign-manager::card-header>
		
		<x-campaign-manager::card-body>
			<x-campaign-manager::table-responsive>
				<thead>
				<x-campaign-manager::table-row>
					<x-campaign-manager::table-column-head>
						Produkt
					</x-campaign-manager::table-column-head>
					@foreach(config('theshop-campaign-manager.currencies') as $currency)
						<x-campaign-manager::table-column-head>
							Hranica {{str()->upper($currency)}}
						</x-campaign-manager::table-column-head>
					@endforeach
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
						@foreach(config('theshop-campaign-manager.currencies') as $currency)
							<x-campaign-manager::table-column>
								{{$item['minimum_spend'][$currency]}}
							</x-campaign-manager::table-column>
						@endforeach
						<x-campaign-manager::table-column>
							<div class="flex">
								<x-campaign-manager::button-edit
										link="{{route('campaign-manager.gift.edit', [$item])}}"/>
								
								<x-campaign-manager::button-delete
										route="{{route('campaign-manager.gift.destroy', [$item])}}"/>
							</div>
						</x-campaign-manager::table-column>
					</x-campaign-manager::table-row>
				@endforeach
				</tbody>
			</x-campaign-manager::table-responsive>
		</x-campaign-manager::card-body>
	</x-campaign-manager::card>
@endsection