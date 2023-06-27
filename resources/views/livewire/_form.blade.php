<!-- Create User Modal -->
<div class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40">
    <div class="fixed inset-0 transform">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white w-full max-w-md mx-auto rounded shadow-lg p-6" @click.away="isOpen = false">
            <div class="flex justify-between items-center mb-4">
                {{-- <h5 class="text-lg font-medium">Create New User</h5> --}}
                <h5 class="text-lg font-medium"> </h5>
                <button type="button" class="text-gray-500 hover:text-gray-600" @click="isOpen = false"
                    wire:click="closeModal('create-user')">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <form>
                <div class="mb-4">
                    <label for="createFormControlInput1" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="createFormControlInput1" placeholder="Enter Name"
                        class="form-input mt-1 block w-full" wire:model="name">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="createFormControlInput1"
                        class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="createFormControlInput1" placeholder="Enter Username"
                        class="form-input mt-1 block w-full" wire:model="username">
                    @error('username')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="createFormControlInput2" class="block text-sm font-medium text-gray-700">Email
                        address</label>
                    <input type="email" id="createFormControlInput2" placeholder="Enter Email"
                        class="form-input mt-1 block w-full" wire:model="email">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="createFormControlInput1"
                        class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="text" id="createFormControlInput1" placeholder="Enter Password"
                        class="form-input mt-1 block w-full" wire:model="password">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="createFormControlInput1" class="block text-sm font-medium text-gray-700">Confirm
                        password</label>
                    <input type="text" id="createFormControlInput1" placeholder="Enter Password Again"
                        class="form-input mt-1 block w-full" wire:model="password">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </form>

            <div class="mt-6 flex justify-end">
                <button type="button" wire:click="closeModal('create-user')"
                    class="text-gray-500 hover:text-gray-600 mr-2" @click="isOpen = false">Close</button>

                <button type="button" wire:click.prevent="store"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded"
                    @click="isOpen = false">Save Changes</button>
            </div>
        </div>
    </div>
</div>
