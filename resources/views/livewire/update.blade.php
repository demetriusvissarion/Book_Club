<!-- Modal -->
@if ($updateMode)
    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
