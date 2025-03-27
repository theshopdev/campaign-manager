@extends('campaign-manager::layout')

@section('content')
	
	<x-campaign-manager::card>
		<x-campaign-manager::card-header
				title="Darčeky"
				subtitle="Vytvoriť novú položku"
		>
			<x-campaign-manager::button-link title="Späť" link="{{route('campaign-manager.gift.index')}}"/>
		</x-campaign-manager::card-header>
		
		<x-campaign-manager::card-body>
			<form class="form" action="{{route('campaign-manager.gift.store')}}" method="POST">
				@csrf
				<div>
					<label for="product_uuid" class="form-label">Produkt</label>
					
					<select id="product_uuid" name="product_uuid" class="form-input">
						@foreach($products as $product)
							<option value="{{$product['uuid']}}">{{$product['name']}}</option>
						@endforeach
					</select>
					<span class="form-info">Vyberte produkt zo zoznamu produktov, ktorý sa bude zobrazovať</span>
				</div>
				
				@foreach(config('theshop-campaign-manager.currencies') as $currency)
					<div>
						<label for="minimum_spend_{{$currency}}" class="form-label">Minimálna hranica
							v {{str()->upper($currency)}}</label>
						<input type="number" value="0" min="0" step="0.01" name="minimum_spend[{{$currency}}]"
						       id="minimum_spend_{{$currency}}" class="form-input"
						       required>
						<span class="form-info">Definuje poradie v upselli, čím vyššie skóre, tým skôr bude produkt zobrazený</span>
					</div>
				@endforeach
				
				<div>
					<button type="submit"
					        class="form-submit">
						Uložiť
					</button>
				</div>
			</form>
		</x-campaign-manager::card-body>
	</x-campaign-manager::card>
@endsection