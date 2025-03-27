<div class="flex flex-col items-center justify-between gap-4 border-b border-slate-100 p-5 text-center sm:flex-row sm:text-start">
	<div>
		<h2 class="mb-0.5 font-semibold">{{$title}}</h2>
		<h3 class="text-sm font-medium text-slate-600">
			{{$subtitle}}
		</h3>
	</div>
	<div>
		{{$slot}}
	</div>
</div>