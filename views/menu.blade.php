<a
		href="{{route('campaign-manager.dashboard')}}"
		class="group flex items-center gap-2 rounded-lg px-2.5 py-1.5 text-sm font-medium hover:bg-indigo-50 hover:text-indigo-600 active:border-indigo-100 @if(str_contains(request()->route()->getName(), 'dashboard')) bg-indigo-50 text-indigo-600  @endif"
>
	<span>Nástenka</span>
</a>
<a
		href="{{route('campaign-manager.upsell.index')}}"
		class="group flex items-center gap-2 rounded-lg px-2.5 py-1.5 text-sm font-medium hover:bg-indigo-50 hover:text-indigo-600 active:border-indigo-100 @if(str_contains(request()->route()->getName(), 'upsell')) bg-indigo-50 text-indigo-600  @endif"
>
	<span>Upsell</span>
</a>
<a
		href="{{route('campaign-manager.gift.index')}}"
		class="group flex items-center gap-2 rounded-lg px-2.5 py-1.5 text-sm font-medium hover:bg-indigo-50 hover:text-indigo-600 active:border-indigo-100 @if(str_contains(request()->route()->getName(), 'gift')) bg-indigo-50 text-indigo-600  @endif"
>
	<span>Darčeky</span>
</a>