<!-- Modal -->
@if ($updateMode)
    <div class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40">
        {{-- div below creates the grey background nehind the modal window --}}
        <div class="fixed inset-0 transform">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white w-1/2 mx-auto rounded-lg shadow-lg">
                <div class="modal-header py-4 px-6">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body py-4 px-6">
                    <form>
                        <div class="mb-4">
                            <input type="hidden" wire:model="user_id">
                            <label for="exampleFormControlInput1" class="block text-gray-700">Name</label>
                            <input type="text" class="form-input mt-1 block w-full" wire:model="name"
                                id="exampleFormControlInput1" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput2" class="block text-gray-700">Email address</label>
                            <input type="email" class="form-input mt-1 block w-full" wire:model="email"
                                id="exampleFormControlInput2" placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer py-4 px-6">
                    <button type="button" wire:click.prevent="cancel()">Close</button>

                    <button type="button" wire:click.prevent="update()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endif
