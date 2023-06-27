<div>
    <!-- Create New User Button -->
    <button wire:click="openModal('create-user')"
        class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">Create New User</button>

    {{-- @php
        dd($isOpen);
    @endphp --}}
    @if ($isOpen)
        @include('livewire._createForm')
    @endif
</div>
