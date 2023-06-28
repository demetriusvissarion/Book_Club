<button wire:click="openCreateModal()" type="button"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Create New User Button
</button>

<!-- Create new User Pop-Up Window -->
{{-- @php
    dd($createMode);
@endphp --}}
<div wire:model="{{ $createMode }}">
    @if ($createMode)
        <div class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40">
            {{-- div below creates the grey background nehind the modal window --}}
            <div class="fixed inset-0 transform">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-white w-1/2 mx-auto rounded-lg shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-lg font-medium">
                            Create New User Form
                            {{-- {{ isset($this->user->id) ? 'Edit User' : 'Create New User' }} --}}
                        </h5>
                        <button type="button" class="text-gray-500 hover:text-gray-600" wire:click="cancel()">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="py-4 px-6">
                        <form>
                            <div class="mb-4">
                                <label for="createUserFormControlInput1" class="block text-gray-700">Name</label>
                                <input type="text" class="form-input mt-1 block w-full"
                                    id="createUserFormControlInput1" placeholder="Enter Name" wire:model="name">
                                @error('name')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="createUserFormControlInput2" class="block text-gray-700">Email
                                    address</label>
                                <input type="email" class="form-input mt-1 block w-full"
                                    id="createUserFormControlInput2" wire:model="email" placeholder="Enter Email">
                                @error('email')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="py-4 px-6">
                        <button type="button" wire:click.prevent="cancel()">Close</button>
                        <button type="button" wire:click.prevent="store()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
