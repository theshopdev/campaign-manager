@extends('campaign-manager::layout')

@section('content')
	
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