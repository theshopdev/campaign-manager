@extends('campaign-manager::layout')

@section('content')
	
	<x-campaign-manager::card>
		<x-campaign-manager::card-header
				title="Darčeky"
				subtitle="Upraviť položku"
		>
			<x-campaign-manager::button-link title="Späť" link="{{route('campaign-manager.gift.index')}}"/>
		</x-campaign-manager::card-header>
		
		<x-campaign-manager::card-body>
			<form class="form" action="{{route('campaign-manager.gift.update', [$item])}}" method="POST">
				@method('PUT')
				@csrf
				<div x-data="{searchQuery: '',items: @js($products), selected: @js(['uuid' => $item['product_uuid'], 'name' => $item['product_name']])}">
					<div class="mb-4">
						<label for="product_name" class="form-label">Produkt</label>
						<input type="text" x-model="selected.name" disabled name="product_name" id="product_name" class="form-input !bg-gray-100" required>
						<input type="hidden" x-model="selected.uuid" name="product_uuid" id="product_uuid" required>
					</div>
					
					<input type="text" placeholder="Hľadať" x-model="searchQuery" id="product_search" class="form-input">
					<span class="form-info">Vyberte produkt zo zoznamu produktov, ktorý sa bude zobrazovať</span>
					
					<!-- Filtered Items -->
					<ul class="h-[200px] overflow-y-scroll mt-4">
						<template
								x-for="item in items"
								:key="item.uuid">
							<li
									class="cursor-pointer hover:bg-indigo-600 hover:text-white p-1"
									x-show="item.name.toLowerCase().includes(searchQuery.toLowerCase())"
									x-on:click="selected = item"
									x-text="item.name">
							</li>
						</template>
					</ul>
				</div>
				
				<div>
					<label for="is_concept" class="form-label">Koncept</label>
					<select name="is_concept" id="is_concept">
						<option @if($item['is_concept'] === 1) selected @endif value="1">Áno</option>
						<option @if($item['is_concept'] === 0) selected @endif value="0">Nie</option>
					</select>
				</div>
				
				@foreach(config('theshop-campaign-manager.currencies') as $currency)
					<div>
						<label for="minimum_spend_{{$currency}}" class="form-label">Minimálna hranica
							v {{str()->upper($currency)}}</label>
						<input type="number" value="{{$item['minimum_spend'][$currency]}}" min="0" step="0.01" name="minimum_spend[{{$currency}}]"
						       id="minimum_spend_{{$currency}}" class="form-input"
						       required>
						<span class="form-info">Minimálna hranica pre pridanie do košíka</span>
					</div>
				@endforeach
				
				@foreach(config('theshop-campaign-manager.currencies') as $currency)
					<div>
						<label for="maximum_spend_{{$currency}}" class="form-label">Maximálna hranica
							v {{str()->upper($currency)}}</label>
						<input type="number" value="{{$item['maximum_spend'][$currency]}}" min="-1" step="0.01" name="maximum_spend[{{$currency}}]"
						       id="maximum_spend_{{$currency}}" class="form-input" required>
						<span class="form-info">Maximálna hranica pre pridanie do košíka (ak nie je ohraničené, vložte -1)</span>
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