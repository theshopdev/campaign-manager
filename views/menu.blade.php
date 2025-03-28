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
	<svg
			class="hi-mini hi-lock-closed inline-block size-5 flex-none opacity-25 group-hover:opacity-50"
			xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 20 20"
			fill="currentColor"
			aria-hidden="true"
	>
		<path
				fill-rule="evenodd"
				d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
				clip-rule="evenodd"
		/>
	</svg>
	<span>Darčeky</span>
</a>