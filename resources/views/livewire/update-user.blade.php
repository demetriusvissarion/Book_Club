<div>
    <button wire:click="openEditModal('update-user', {{ $user->id }})"
        class="text-blue-500 hover:bg-yellow-600">Edit</button>

    @if ($isOpen)
        {{-- @include('livewire._updateForm') --}}
        @include('livewire._createForm')
    @endif
</div>
