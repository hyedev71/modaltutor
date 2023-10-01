<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class UserList extends Component
{
	use WithPagination;

	public $search;

	public User $selectedUser;

	public function mount($search = null)
	{
		$this->search = $search;
	}

	public function viewUser(User $user)
	{
		$this->selectedUser = $user;

		$this->dispatch('open-modal',name:'user-details');
	}
	
	#[Computed()]
	public function users()
	{
		return User::latest()
					->where('name', 'like', "%$this->search%")
					->paginate(4);
	}
}
