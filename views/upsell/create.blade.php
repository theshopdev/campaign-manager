@extends('campaign-manager::layout')

@section('content')
	
	<x-campaign-manager::card>
		<x-campaign-manager::card-header
				title="Upsell"
				subtitle="Vytvoriť novú položku"
		>
			<x-campaign-manager::button-link title="Späť" link="{{route('campaign-manager.upsell.index')}}" />
		</x-campaign-manager::card-header>
		
		<x-campaign-manager::card-body>
			<form class="form" action="{{route('campaign-manager.upsell.store')}}" method="POST">
				@csrf
				<div x-data="{searchQuery: '',items: @js($products), selected: null}">
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
					<label for="score" class="form-label">Skóre</label>
					<input type="number" value="1" min="1" step="1" name="score" id="score" class="form-input" required>
					<span class="form-info">Definuje poradie v upselli, čím vyššie skóre, tým skôr bude produkt zobrazený</span>
				</div>
				
				<div>
					<label for="valid_from" class="form-label">Platí od</label>
					<input type="date" name="valid_from" id="valid_from" class="form-input">
					<span class="form-info">Ak si želáte zobraziť produkt v upselli len na určitú dobu, vyplňte dátum platnosti</span>
				</div>
				
				<div>
					<label for="valid_to" class="form-label">Platí do</label>
					<input type="date" name="valid_to" id="valid_to" class="form-input">
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