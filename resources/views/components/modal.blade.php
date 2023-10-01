@props (['name', 'title'])
<div 
	x-data = "{ show : false, name : '{{ $name }}' }"
	x-show = "show"
	x-on:open-modal.window = "show = ($event.detail.name === name)"
	x-on:close-modal.window = "show = false"
	x-on:keydown.escape.window = "show = false"
	style="display:none;"
	class="fixed z-50 inset-0"
	x-transition.duration
	>

	{{-- GRAY BACKGROUND --}}
	<div x-on:click="show = false" class="fixed inset-0 bg-gray-300 opacity-40"></div> 

	{{-- MODAL CONTENT --}}
	<div class="bg-white rounded m-auto fixed inset-0 max-w-2xl overflow-y-auto" style="max-height:500px;">

		@if (isset($title))
			{{-- MODAL HEADER --}}
			<div class="px-2 py-2 flex items-center justify-between">
				<span class="text-xl font-bold">{{ $title }}</span>
				<button x-on:click="show = false" class="text-3xl text-red-500 font-bold">&times;</button>
			</div>
		@endif

		{{-- MODAL BODY --}}
		<div class="mb-5">
			{{ $body }}
		</div>

	</div>
	{{-- END MODAL CONTENT --}}

</div>
