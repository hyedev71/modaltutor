<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

		<!-- Tailwind CSS -->
		<script src="https://cdn.tailwindcss.com"></script>

		@livewireStyles

    </head>

    <body class="antialiased">
		<div class="flex">
			<div class="w-2/4 mx-auto pt-10">
				<x-modal name="modal1" title="Modal 1"> 
					<x-slot:body>
						<livewire:register-form />
					</x-slot:body>
				</x-modal>

				<button x-data @click="$dispatch('open-modal',{name:'modal1'})" class="px-3 py-1 bg-teal-500 text-white rounded text-xs">Modal 1</button>

				<x-modal name="modal2" title="Modal 2"> 
					<x-slot:body>
						<span class="p-5">Body 2</span>
					</x-slot:body>
				</x-modal>

				<button x-data @click="$dispatch('open-modal',{name:'modal2'})" class="px-3 py-1 bg-blue-500 text-white rounded text-xs">Modal 2</button>
			</div>
		</div>

		<livewire:user-list />

		@livewireScripts
    </body>
</html>
