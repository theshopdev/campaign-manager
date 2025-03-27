<form action="{{$route}}" method="post"
      class="ml-2">
	@method('DELETE')
	@csrf
	<button
			type="submit"
			onclick="return confirm('Ste si istí?')"
			role="menuitem"
			class="inline-flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-200 px-3 py-2 text-sm leading-5 font-semibold text-slate-800"
	>
		Vymazať
	</button>
</form>