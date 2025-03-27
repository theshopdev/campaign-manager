@extends('campaign-manager::layout')

@section('content')
	
	<x-campaign-manager::card>
		<x-campaign-manager::card-header
				title="Upsell"
				subtitle="Upraviť položku"
		>
			<x-campaign-manager::button-link title="Späť" link="{{route('campaign-manager.upsell.index')}}" />
		</x-campaign-manager::card-header>
		
		<x-campaign-manager::card-body>
			<form class="form" action="{{route('campaign-manager.upsell.update', [$item])}}" method="POST">
				@method('PUT')
				@csrf
				<div>
					<label for="product_uuid" class="form-label">Produkt</label>
					
					<select id="product_uuid" name="product_uuid" class="form-input">
						@foreach($products as $product)
							<option @if($item['product_uuid'] === $product['uuid']) selected @endif value="{{$product['uuid']}}">{{$product['name']}}</option>
						@endforeach
					</select>
					<span class="form-info">Vyberte produkt zo zoznamu produktov, ktorý sa bude zobrazovať</span>
				</div>
				
				<div>
					<label for="score" class="form-label">Skóre</label>
					<input type="number" value="{{$item['score']}}" min="1" step="1" name="score" id="score" class="form-input" required>
					<span class="form-info">Definuje poradie v upselli, čím vyššie skóre, tým skôr bude produkt zobrazený</span>
				</div>
				
				<div>
					<label for="valid_from" class="form-label">Platí od (nepovinné)</label>
					<input type="date" value="{{$item['valid_from']?->format('Y-m-d')}}" name="valid_from" id="valid_from" class="form-input">
					<span class="form-info">Ak si želáte zobraziť produkt v upselli len na určitú dobu, vyplňte dátum platnosti</span>
				</div>
				
				<div>
					<label for="valid_to" class="form-label">Platí do (nepovinné)</label>
					<input type="date" value="{{$item['valid_to']?->format('Y-m-d')}}" name="valid_to" id="valid_to" class="form-input">
					<span class="form-info">Ak si želáte zobraziť produkt v upselli len na určitú dobu, vyplňte dátum platnosti</span>
				</div>
				
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