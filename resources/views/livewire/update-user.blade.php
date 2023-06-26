<!-- Update User Modal -->
<div x-data="{ open: false }" x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="bg-white w-full max-w-md mx-auto rounded shadow-lg p-6" @click.away="open = false">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-lg font-medium">Edit User</h5>
            <button type="button" class="text-gray-500 hover:text-gray-600" @click="open = false">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <form>
            <div class="mb-4">
                <input type="hidden" wire:model="user_id">
                <label for="updateFormControlInput1" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="updateFormControlInput1" placeholder="Enter Name"
                    class="form-input mt-1 block w-full" wire:model="name">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="updateFormControlInput2" class="block text-sm font-medium text-gray-700">Email
                    address</label>
                <input type="email" id="updateFormControlInput2" placeholder="Enter Email"
                    class="form-input mt-1 block w-full" wire:model="email">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </form>
        <div class="mt-6 flex justify-end">
            <button type="button" class="btn btn-secondary mr-2" @click="open = false">Close</button>
            <button type="button" wire:click.prevent="update"
                class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded"
                @click="open = false">Save changes</button>
        </div>
    </div>
</div>
