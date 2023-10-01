<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">

	<div class="flex">
		<h2 class="text-center font-semibold text-2x text-gray-800 mb-5">Create New Account</h2>
	</div>

	@if (session('success'))
		<p class="text-green-500 text-sm mb-2">{{ session('success') }}</p>
	@endif 

	<form wire:submit.prevent="create">
		<label for="name" class="block @error('name'){{'text-red-700'}}@else{{'text-gray-700'}}@enderror text-sm font-bold">Name <span class="text-red-500">*</span></label>
		<input wire:model="name" type="text" name="name" id="name" class="shadow appearance-none border @error('name'){{'border-red-500'}}@enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		@error ('name')
			<span class="text-red-500 text-xs">{{ $message }}</span>
		@enderror

		<label for="email" class="block @error('email'){{'text-red-700'}}@else{{'text-gray-700'}}@enderror text-sm font-bold mt-2">Email <span class="text-red-500">*</span></label>
		<input wire:model="email" type="email" name="email" id="email" class="shadow appearance-none border @error('email'){{'border-red-500'}}@enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		@error ('email')
			<span class="text-red-500 text-xs">{{ $message }}</span>
		@enderror

		<label for="password" class="block @error('password'){{'text-red-700'}}@else{{'text-gray-700'}}@enderror text-sm font-bold mt-2">Password <span class="text-red-500">*</span></label>
		<input wire:model="password" type="password" name="password" id="password" class="shadow appearance-none border @error('password'){{'border-red-500'}}@enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		@error ('password')
			<span class="text-red-500 text-xs">{{ $message }}</span>
		@enderror

		<label for="image" class="block @error('image'){{'text-red-700'}}@else{{'text-gray-700'}}@enderror text-sm font-bold mt-2">Profile Picture</label>
		@if ($image)
			<div class="bg-cyan-300 mt-1 mb-1">
				<img src="{{ $image->temporaryUrl() }}" class="object-scale-down h-48 w-96 rounded-lg">
			</div>
		@endif
		<input wire:model="image" type="file" accept="image/png, image/jpeg" name="image" id="image" class="shadow appearance-none border @error('image'){{'border-red-500'}}@enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		@error ('image')
			<span class="text-red-500 text-xs">{{ $message }}</span>
		@enderror
		<div wire:loading wire:target="image">
			<span class="text-green-500 text-xs">Uploading....</span>
		</div>

		<div class="flex items-center justify-end mt-3">
			<button wire:loading.attr="disabled" wire:loading.class="bg-blue-100 text-gray-100" wire:loading.class.remove="hover:bg-blue-800" type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline relative">
				<span class="">Create +</span>
				<svg wire:loading class="animate-spin h-5 w-5 ml-3" viewBox="0 0 24 24">
					<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
					<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.96 7.96 0 014 12H0c0 6.627 5.373 12 12 12v-4a7.963 7.963 0 01-6-2.709z"></path>
				</svg> 
			</button>
		</div>
	</form>

</div>
