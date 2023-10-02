<div class="mt-5 p-5 mx-auto w-2/5 shadow border-teal-500 border-t-2">

	<h1 class="text-left font-semibold text-base text-teal-600 mb-5"> User List </h1>

	<div class="w-full mb-3">
		<input wire:model.live.debounce.100ms="search" type="text" name="search" id="search" placeholder="search ..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
	</div>

	<div role="status" class="w-full p-4 space-y-4 border border-gray-200 divide-y divide-gray-200 rounded shadow dark:divide-gray-700 md:p-6 dark:border-gray-700 text-xs">
		@if (!empty($this->users))
			@foreach ($this->users as $user)
				<div wire:key="{{ $user->id }}" class="flex items-center justify-between @if(!$loop->first){{ 'pt-4' }}@endif">
					<div>
						<div class="h-2.5 rounded-full w-100 mb-2.5">{{ $user->name }}</div>
						<div class="w-100 h-2 rounded-full">{{ $user->email }}</div>
					</div>
					<div class="h-2.5 rounded-full w-12 mr-2">
						<button wire:click="viewUser({{ $user }})" class="bg-blue-600 hover:bg-blue-800 dark:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">View</button>
					</div>
				</div>
			@endforeach
		@endif
	</div>

	@if ($selectedUser)
		<x-modal name="user-details" title="View User">
			<x-slot:body>
				Name : {{ $selectedUser->name }}
				<br/>
				Email : {{ $selectedUser->email }}
			</x-slot:body>
		</x-modal>
	@endif

	<div class="w-full p-2 mt-3 overflow-auto whitespace-normal text-center border border-gray-200 rounded shadow">
		{{ $this->users->links() }}
	</div>

</div>
